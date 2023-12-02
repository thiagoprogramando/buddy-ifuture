@extends('dashboard.layout')
@section('title', 'Formulários')
@section('conteudo')

    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Formulários</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-question-circle fa-sm text-white-50"></i> Ajuda</a>
    </div>

    <hr class="sidebar-divider">

    <div class="row mt-3">
        <div class="col-xl-12 col-md-12 mb-3 card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                
                <div class="p-2">
                    <button data-toggle="modal" data-target="#formModal" class="btn btn-outline-success">Criar Formulário</button>
                    <button class="btn btn-outline-dark">Filtros</button>
                </div>

                <div class="p-2">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Descrição</th>
                                    <th>Tipo</th>
                                    <th>Responsável</th>
                                    <th>Criação</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($forms as $form)
                                    <tr>
                                        <td>{{$form->title}}</td>
                                        <td>{{$form->description}}</td>
                                        <td>{{$form->format}}</td>
                                        <td>{{$form->cpf_or_cnpj_creator}}</td>
                                        <td>{{$form->created_at}}</td>
                                        <td class="text-center">
                                            <form action="{{ route('delete_formulario') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $form->id }}">
                                                <a href="{{ route('formulario', ['id' => $form->id]) }}" class="btn btn-outline-primary"><i class="fas fa-info"></i></a>
                                                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('create_formulario') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModal">Criar Formulário</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span class="badge badge-warning mb-3">Preencha com os dados básicos do Formuário.</span>
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Título" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="description" rows="3" placeholder="Descrição" required></textarea>
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
                                <input type="number" name="spacing" class="form-control" placeholder="Espaçamento" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" name="size" class="form-control" placeholder="Fonte" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="number" name="margin" class="form-control" placeholder="Margem" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-success" type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection