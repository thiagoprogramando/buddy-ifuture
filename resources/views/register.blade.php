@extends('layout')
@section('conteudo')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Crie sua conta!</h1>
                        </div>
                        <form action="{{ route('cadastro') }}" method="POST" class="user">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="name" class="form-control form-control-user" placeholder="Qual o nome do seu negócio?">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="cpf_or_cnpj" class="form-control form-control-user" placeholder="E qual o CNPJ?">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user" placeholder="Qual o seu Email?">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user" placeholder="Escolha uma senha:">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="confirm-password" class="form-control form-control-user" placeholder="Repita a senha:">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="code" class="form-control form-control-user" placeholder="Você tem algum CUPOM?" value="{{ $cupom }}">
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block"> Cadastrar Meu Negócio </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('recupera') }}">Esqueceu sua senha?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Já possui conta? Acessar!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
