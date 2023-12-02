@extends('dashboard.layout')
@section('title', 'Formulário')
@section('conteudo')

    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800 ">Formulário: {{ $form->title }}</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-question-circle fa-sm text-white-50"></i> Ajuda</a>
    </div>

    <hr class="sidebar-divider">

    <div class="row mt-3">
        <div class="col-xl-12 col-md-12 mb-3 card border-left-primary shadow-sm h-100 py-2">
            <div class="card-body">

                <div class="p-2 btn-group" role="group">
                    <button type="button" id="dados" class="btn btn-outline-success active" onclick="mostrarCard('cardDados', this)">Dados</button>
                    <button type="button" id="campos" class="btn btn-outline-danger" onclick="mostrarCard('cardCampos', this)">Campos</button>
                    <button type="button" id="layout" class="btn btn-outline-dark" onclick="mostrarCard('cardLayout', this)">Layout</button>
                </div>

                <hr class="sidebar-divider">

                <div id="cardDados" class="p-2 mt-3">
                    <h3 class="font-weight-light">Preenchimento de dados básicos.</h3>

                    <form action="{{ route('create_formulario') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $form->id }}">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Título" value="{{ $form->title }}">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="description" rows="3" placeholder="Descrição">{{ $form->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="format" required>
                                <option value="A4" selected>Formato</option>
                                <option value="A4">A4 Retrato</option>
                                <option value="A4">A4 Paisagem</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <input type="number" name="spacing" class="form-control" placeholder="Espaçamento" value="{{ $form->spacing }}">
                            </div>
                            <div class="col-sm-4">
                                <input type="number" name="size" class="form-control" placeholder="Fonte" value="{{ $form->size }}">
                            </div>
                            <div class="col-sm-4">
                                <input type="number" name="margin" class="form-control" placeholder="Margem" value="{{ $form->margin }}">
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <a class="btn btn-danger" href="{{ route('formularios') }}">Cancelar</a>
                            <button class="btn btn-success" type="submit">Salvar</button>
                        </div>
                    </form>
                </div>

                <div id="cardCampos" class="p-2 mt-3 d-none">
                    <h3 class="font-weight-light">Campos do formulário.</h3>

                    <div class="p-2">
                        <button data-toggle="modal" data-target="#formInput" class="btn btn-outline-danger">Criar Campo</button>
                    </div>
    
                    <div class="p-2">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th>Descrição</th>
                                        <th>Variável</th>
                                        <th>Tipo</th>
                                        <th>Tamanho</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="cardLayout" class="p-2 mt-3 d-none">
                    <h3 class="font-weight-light">Estrutura para o documento.</h3>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="formInput" tabindex="-1" role="dialog" aria-labelledby="formInput"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('create_formulario') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="formInput">Criar Campo</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span class="badge badge-warning mb-3">Preencha com os dados básicos do Campo.</span>
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Título" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="description" rows="3" placeholder="Descrição" required></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-6">
                                <select class="form-control" name="type" required>
                                    <option value="string" selected>Tipo</option>
                                    <option value="text">Texto</option>
                                    <option value="textarea">Longo Texto</option>
                                    <option value="number">Número</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <select class="form-control" name="size" required>
                                    <option value="string" selected>Tamanho</option>
                                    <option value="100">Até 100 Caracteres</option>
                                    <option value="255">Até 255 Caracteres</option>
                                    <option value="null">Livre</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-success" type="submit">Criar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function mostrarCard(cardId, botao) {
            
            document.getElementById('cardDados').classList.add('d-none');
            document.getElementById('cardCampos').classList.add('d-none');
            document.getElementById('cardLayout').classList.add('d-none');

            var botoes = document.querySelectorAll('.btn-group button');
            botoes.forEach(function(b) {
                b.classList.remove('active');
            });

            document.getElementById(cardId).classList.remove('d-none');

            botao.classList.add('active');
        }
    </script>
@endsection
