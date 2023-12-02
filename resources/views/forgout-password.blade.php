@extends('layout')
@section('conteudo')
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">

                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Esqueceu sua senha?</h1>
                                    <p class="mb-4">Basta preencher os dados abaixo e enviaremos um código para redefinir sua senha!</p>
                                </div>
                                @if(session('forgout') || isset($forgout))
                                    <form action="{{ route('recupera') }}" method="POST" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="code" class="form-control form-control-user" placeholder="Código">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="password" class="form-control form-control-user" placeholder="Nova Senha:">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="confirmpassword" class="form-control form-control-user" placeholder="Confirmar Senha:">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block"> Atualizar Senha </button>
                                    </form>
                                @else
                                    <form action="{{ route('recupera') }}" method="POST" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" placeholder="Qual o seu Email?">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block"> Recuperar Acesso </button>
                                    </form>
                                @endif
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('cadastro') }}">Crie Sua Conta!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">Já tem uma conta? Acessar!</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
