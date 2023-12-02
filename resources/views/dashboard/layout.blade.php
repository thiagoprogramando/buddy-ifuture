<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Buddy - @yield('title')</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('template/css/sb-admin-2.css') }}" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body id="page-top">
        <div id="wrapper">

            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fab fa-black-tie"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Buddy - {{ explode(' ', Auth::user()->name)[0] }}</div>
                </a>

                <hr class="sidebar-divider my-0">

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('dashboard') }}"> <i class="fas fa-fw fa-chart-line"></i> <span>Dashboard</span></a>
                </li>

                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Recepção/Atendimento
                </div>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-concierge-bell"></i>
                        <span>Recepção</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="#">Clientes</a>
                            <a class="collapse-item" href="#">Filas</a>
                            <a class="collapse-item" href="#">Agendamentos</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-phone-volume"></i>
                        <span>Atendimento</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="#">WhatsApp</a>
                            <a class="collapse-item" href="#">Ligação</a>
                            <a class="collapse-item" href="#">Alertas</a>
                            <a class="collapse-item" href="#">Comunicados</a>
                        </div>
                    </div>
                </li>

                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Financeiro
                </div>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFinanceiro" aria-expanded="true" aria-controls="collapseFinanceiro">
                        <i class="fas fa-fw fa-wallet"></i>
                        <span>Carteiras</span>
                    </a>
                    <div id="collapseFinanceiro" class="collapse" aria-labelledby="headingFinanceiro" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Cobranças:</h6>
                            <a class="collapse-item" href="#">Cobranças</a>
                            <a class="collapse-item" href="#">Log de Atividades</a>
                            <div class="collapse-divider"></div>

                            <h6 class="collapse-header">Contas:</h6>
                            <a class="collapse-item" href="#">Contas</a>
                            <a class="collapse-item" href="#">Log de Atividades</a>
                            <div class="collapse-divider"></div>

                            <h6 class="collapse-header">Recebivéis:</h6>
                            <a class="collapse-item" href="#">Recebivéis</a>
                            <a class="collapse-item" href="#">Log de Atividades</a>
                            <div class="collapse-divider"></div>
                        </div>
                    </div>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVendas" aria-expanded="true" aria-controls="collapseVendas">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                        <span>Vendas</span>
                    </a>
                    <div id="collapseVendas" class="collapse" aria-labelledby="headingVendas" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Opções:</h6>
                            <a class="collapse-item" href="#">PDV</a>
                            <a class="collapse-item" href="#">Venda Contrato</a>
                            <a class="collapse-item" href="#">Estoque</a>
                            <a class="collapse-item" href="#">Consultas</a>
                            <a class="collapse-item" href="#">Log de Atividades</a>
                            <div class="collapse-divider"></div>
                        </div>
                    </div>
                </li>

                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Administração
                </div>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Configurações</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Sistema:</h6>

                            <a class="collapse-item" href="{{ route('formularios') }}">Formulários</a>
                            <a class="collapse-item" href="#">Usuários</a>

                            <h6 class="collapse-header">Módulos:</h6>
                            <a class="collapse-item" href="#">Vendas</a>
                            <a class="collapse-item" href="#">Recepção</a>
                        </div>
                    </div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseIntegracoes" aria-expanded="true" aria-controls="collapseIntegracoes">
                        <i class="fas fa-fw fa-network-wired"></i>
                        <span>Integrações</span>
                    </a>
                    <div id="collapseIntegracoes" class="collapse" aria-labelledby="headingIntegracoes" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Integrações Bancárias:</h6>
                            <a class="collapse-item" href="#">Banco do Brasil</a>
                            <a class="collapse-item" href="#">Immobank</a>
                            <a class="collapse-item" href="#">Assas</a>
                            <a class="collapse-item" href="#">PagSeguro</a>
                            <a class="collapse-item" href="#">Mercado Pago</a>

                            <h6 class="collapse-header">Integrações Documentos:</h6>
                            <a class="collapse-item" href="#">ClickSing</a>
                            <a class="collapse-item" href="#">DropBox</a>

                            <h6 class="collapse-header">Integrações Extras:</h6>
                            <a class="collapse-item" href="#">Sheets</a>
                            <a class="collapse-item" href="#">API Própria</a>
                        </div>
                    </div>
                </li>

                <hr class="sidebar-divider d-none d-md-block">

                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>

            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">

                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"> <i class="fa fa-bars"></i> </button>

                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Pesquisar por...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small" placeholder="Pesquisar por...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <span class="badge badge-danger badge-counter">3+</span>
                                </a>

                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Notificações
                                    </h6>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 12, 2019</div>
                                            <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-success">
                                                <i class="fas fa-donate text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 7, 2019</div>
                                            $290.29 has been deposited into your account!
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-warning">
                                                <i class="fas fa-exclamation-triangle text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 2, 2019</div>
                                            Spending Alert: We've noticed unusually high spending for your account.
                                        </div>
                                    </a>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Não há nada mais!</a>
                                </div>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ explode(' ', Auth::user()->name)[0] }}</span>
                                    <img class="img-profile rounded-circle" src="{{ asset('template/img/undraw_profile.svg') }}">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Perfil
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Configurações
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Log de Atividades
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('sair') }}">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Sair
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>

                    <div class="container-fluid">
                        @yield('conteudo')
                    </div>
                </div>
                
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Hefesto Tecnologia <?php echo date("Y"); ?></span>
                        </div>
                    </div>
                </footer> 
            </div>

        </div>
        
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        @if(session('success') || isset($success))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: `{{ session('success') }} @isset($success) {{ $success }} @endisset`,
                })
            </script>
        @endif

        @if(session('error') || isset($error))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Atenção',
                    text: `{{session('error')}} @isset($success) {{ $error }} @endisset`,
                })
            </script>
        @endif

        <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

    </body>
</html>