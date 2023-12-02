@extends('layout')
@section('conteudo')
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Bem-vindo (a)!</h1>
                                </div>
                                <form action="{{ asset('loginAcess') }}" method="POST" class="user">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" placeholder="Email ou Usuário">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" placeholder="Senha ou Chave">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Salvar credenciais</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block"> Acessar </button>
                                    <hr>
                                    <a href="{{ route('cadastro') }}" class="btn btn-google btn-user btn-block">
                                        Cadastrar Meu Negócio
                                    </a>
                                    <a href="" class="btn btn-facebook btn-user btn-block">
                                        Falar Com Consultor
                                    </a>
                                </form>

                                <hr>

                                <div class="text-center">
                                    <a class="small" href="{{ route('recupera') }}">Esqueceu sua senha?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="#">Quero saber mais!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection