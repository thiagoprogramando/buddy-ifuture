<?php

namespace App\Http\Controllers;

use App\Mail\Forgout;
use App\Models\Code;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller {
    
    public function login(Request $request) {

        if($request->filled(['email', 'password'])) {
            $credentials = $request->only(['email', 'password']);
            $credentials['password'] = $credentials['password'];

            if (Auth::attempt($credentials)) {
                return redirect()->intended('dashboard');
            } else {
                return redirect()->back()->with('error', 'Credenciais inválidas!');
            }
        }

        return view('index');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function register(Request $request, $cupom = null) {
        
        if (!$request->missing(['email', 'password', 'cpf_or_cnpj', 'name'])) {
            
            $rules = [
                'name'          => 'required|string',
                'cpf_or_cnpj'   => 'required|numeric|unique:users',
                'email'         => 'required|email|unique:users',
                'password'      => 'required',
                'confirm-password' => 'required|same:password',
            ];
    
            $messages = [
                'name.required'             => 'O campo nome é obrigatório!',
                'name.string'               => 'O campo nome deve ser verídico!',
                'cpf_or_cnpj.required'      => 'O campo CNPJ é obrigatório!',
                'cpf_or_cnpj.numeric'       => 'O campo CNPJ deve conter apenas números!',
                'cpf_or_cnpj.unique'        => 'CNPJ já cadastrado!',
                'email.required'            => 'O campo email é obrigatório!',
                'email.email'               => 'O campo email deve ser um endereço de e-mail válido!',
                'email.unique'              => 'Email já cadastrado!',
                'password.required'         => 'O campo senha é obrigatório!',
                'confirm-password.required' => 'O campo de confirmação de senha é obrigatório!',
                'confirm-password.same'     => 'As senhas não coincidem!',
            ];    

            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                $errors = $validator->errors();
                $errorMessage = $errors->first();
    
                return redirect()->back()
                    ->with('error', $errorMessage);
            }

            if (!$this->validaCnpj($request->cpf_or_cnpj)) {
                return redirect()->back()->with('error', 'CNPJ inválido! Informe um documento válido.');
            }
    
            $attributes = [
                'name'                  => $request->name,
                'cpf_or_cnpj'           => $request->cpf_or_cnpj,
                'cpf_or_cnpj_creator'   => $request->cpf_or_cnpj,
                'email'                 => $request->email,
                'password'              => bcrypt($request->password),
                'permissions'           => 'all',
                'code'                  => $request->code,
            ];

            $user = User::create($attributes);

            Auth::login($user);

            return redirect()->route('dashboard');
        }

        return view('register', ['cupom' => $cupom]);
    }

    public function forgoutPassword(Request $request) {

        if($request->filled(['email'])) {

            $user = User::where('email', $request->input('email'))->first();
            if(!$user) {
                return redirect()->back()->with('error', 'Não encontramos seus dados! Verifique seu Email.');
            }

            $code = '';
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            do {
                $code = Str::upper(Str::random(6, $characters));
            } while (Code::where('code', $code)->exists());

            $newCode = new Code();
            $newCode->id_user = $user->id;
            $newCode->code = $code;
            $newCode->type = 1;
            $newCode->save();

            $sent = Mail::to($user->email, $user->name)->send(new Forgout([
                'fromName'  => 'Buddy',
                'fromEmail' => 'suporte@buddy.io',
                'subject'   => 'Recuperação de Senha',
                'message'   => $code,
                'toName'    => $user->name

            ]));

            if($sent) {
                return view('forgout-password', ['forgout' => 'forgout']);
            }

            return redirect()->back()->with('error', 'Problemas ao enviar código, tente novamente mais tarde!');
        }

        if($request->filled(['code', 'password', 'confirmpassword'])) {

            $code = Code::where('code', $request->code)->first();
            if(!$code) {
                return redirect()->back()->with(['error' => 'Código não existe!', 'forgout' => 'forgout']);
            }

            if($request->password != $request->confirmpassword) {
                return redirect()->back()->with(['error' => 'Senhas não coincidem!', 'forgout' => 'forgout']);
            }

            $user = User::where('id', $code->id_user)->first();
            if(!$user) {
                return redirect()->back()->with(['error' => 'Problemas na atualização de dados! Tente novamente mais tarde.', 'forgout' => 'forgout']);
            }

            $user->password = bcrypt($request->password);
            $user->save();

            Auth::login($user);

            return redirect()->route('dashboard'); 
        }

        return view('forgout-password');
    }

    private function validaCnpj($cnpj) {
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);
    
        if (strlen($cnpj) != 14) {
            return false;
        }
    
        if (preg_match('/(\d)\1{13}/', $cnpj)) {
            return false;
        }
    
        $soma = 0;
        for ($i = 0; $i < 12; $i++) {
            $soma += (int) $cnpj[$i] * (($i < 4) ? (5 - $i) : (13 - $i));
        }
        $resto = $soma % 11;
        $digito1 = ($resto < 2) ? 0 : 11 - $resto;
    
        $soma = 0;
        for ($i = 0; $i < 13; $i++) {
            $soma += (int) $cnpj[$i] * (($i < 5) ? (6 - $i) : (14 - $i));
        }
        $resto = $soma % 11;
        $digito2 = ($resto < 2) ? 0 : 11 - $resto;
    
        if ($cnpj[12] == $digito1 && $cnpj[13] == $digito2) {
            return true;
        }
    
        return false;
    }
    
}
