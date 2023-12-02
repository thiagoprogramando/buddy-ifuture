<?php

namespace App\Http\Controllers;

use App\Models\form;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller {
    
    public function list() {
        $forms = form::where('cpf_or_cnpj_creator', Auth::user()->cpf_or_cnpj_creator)->get();

        return view('dashboard.administration.system.form.list', ['forms' => $forms]);
    }

    public function create(Request $request, $id = null) {
        if($id) {
            $form = form::find($id);

            return view('dashboard.administration.system.form.create', ['form' => $form]);
        }

        if($request->id) {
            $form = form::find($request->id);
            $form->title                = $request->title;
            $form->description          = $request->description;
            $form->format               = $request->format;
            $form->spacing              = $request->spacing;
            $form->size                 = $request->size;
            $form->margin               = $request->margin;
            $form->save();

            return view('dashboard.administration.system.form.create')->with(['success' => 'Formulário atualizado!', 'form' => $form]);;
        }

        $form = new form();
        $form->cpf_or_cnpj_creator  = Auth::user()->cpf_or_cnpj;
        $form->title                = $request->title;
        $form->description          = $request->description;
        $form->format               = $request->format;
        $form->spacing              = $request->spacing;
        $form->size                 = $request->size;
        $form->margin               = $request->margin;
        $form->save();

        return view('dashboard.administration.system.form.create')->with(['success' => 'Formulário criado! Complemente com os demais itens.', 'form' => $form]);
    }

    public function delete(Request $request) {

        $form = form::find($request->id);
        if($form) {
            $form->delete();
            return redirect()->back()->with(['success' => 'Formulário excluído com sucesso!']);
        }

        return redirect()->back()->with(['error' => 'Não encontramos o formulário! Tente novamente mais tarde.']);
    }

}
