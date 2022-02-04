<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{MiConstantes::TITULO}}</title>

    <!-- Scripts -->
 
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>


    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    
</head>


<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">
        <div class="wrapper">

            <!-- Navbar -->
            
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-comments"></i>
                            <span class="badge badge-danger navbar-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="{{ asset('dist/img/user1-128x128.jpg')}}" alt="User Avatar"
                                        class="img-size-50 mr-3 img-circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Brad Diesel
                                            <span class="float-right text-sm text-danger"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">Call me whenever you can...</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="{{ asset('dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                                        class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            John Pierce
                                            <span class="float-right text-sm text-muted"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">I got your message bro</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="{{ asset('dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                                        class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Nora Silvester
                                            <span class="float-right text-sm text-warning"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">The subject goes here</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                        </div>
                    </li>
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4 ">
                <!-- Brand Logo -->
                <a href="{{ url('/') }}" class="brand-link">
                    <img src="{{ asset('dist/img/almagrilogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" >
                    <span class="brand-text font-weight-light">SYS-Botica</span>
                </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                        <a href="#" class="search-results-gallery-icon flex flex-column items-center justify-center color-inherit w-100 pa2 br2 br--top no-underline hover-bg-blue4 hover-white">
                            <i class="fas fa-user-alt" style="font-size: 48px;"></i>
                        </a>                    
                    </div>
                    
                        <div class="info">
                            <a href="#" class="d-block">
                                @guest
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                @else
                                {{ Auth::user()->name }}
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    <spand style="color:#959e97">Cerrar Sesión</spand>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                                @endguest
                            </a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="/" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Inicio</p>
                                </a>
                            </li>



                            <li class="nav-item">
                                <a href="/ventas"
                                    class="{{ Request::path() === 'ventas' ? 'nav-link active' : 'nav-link' }}">
                                    
                                    <i class="nav-icon fas fa-credit-card"></i>
                                    <p>
                                        Ventas
                                       
                                        <span class="right badge badge-danger"></span>
                                    </p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="/compras"
                                    class="{{ Request::path() === 'compras' ? 'nav-link active' : 'nav-link' }}">
                                    
                                    <i class="nav-icon fas fa-shopping-bag"></i>
                                    <p>
                                    Compras
                                       
                                        <span class="right badge badge-danger"></span>
                                    </p>
                                </a>
                            </li>



                            <li class="nav-item">
                                <a href="/despachos"
                                    class="{{ Request::path() === 'despachos' ? 'nav-link active' : 'nav-link' }}">
                                    
                                    <i class="nav-icon fas fa-truck-moving"></i>
                                    <p>
                                    Guia de Remision
                                       
                                        <span class="right badge badge-danger"></span>
                                    </p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="/productos"
                                    class="{{ Request::path() === 'productos' ? 'nav-link active' : 'nav-link' }}">
                                    
                                    <i class="nav-icon fas fas fa-box-open"></i>
                                    <p>
                                        Productos
                                       
                                        <span class="right badge badge-danger"></span>
                                    </p>
                                </a>
                            </li>                            




                            <li class="nav-item">
                                <a href="/clientes"
                                    class="{{ Request::path() === 'clientes' ? 'nav-link active' : 'nav-link' }}">
                                    
                                    <i class="nav-icon fas fa-id-badge"></i>
                                    <p>
                                        Clientes
                                       
                                        <span class="right badge badge-danger"></span>
                                    </p>
                                </a>
                            </li>



                            <li class="nav-item">
                                <a href="/cajachica"
                                    class="{{ Request::path() === 'cajachica' ? 'nav-link active' : 'nav-link' }}">
                                    
                                    <i class="nav-icon fas fa-cash-register"></i>
                                    <p>
                                    Caja Chica
                                       
                                        <span class="right badge badge-danger"></span>
                                    </p>
                                </a>
                            </li>                            

                            <li class="nav-item">
                                <a href="/admin/importar"
                                    class="{{ Request::path() === 'importar' ? 'nav-link active' : 'nav-link' }}">
                                    
                                    <i class="nav-icon fas fa-plus-circle"></i>
                                    <p>
                                        Importar
                                        <?php //use App\Acta;
//$count = Acta::all()->count();?>
                                        <span class="right badge badge-danger">{{ $count ?? '0' }}</span>
                                    </p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="/admin/consultas"
                                    class="{{ Request::path() === 'consultas' ? 'nav-link active' : 'nav-link' }}">
                                    
                                    <i class="nav-icon fas fa-plus-circle"></i>
                                    <p>
                                        Consultas
                                        <?php //use App\Acta;
//$count = Acta::all()->count();?>
                                        <span class="right badge badge-danger">{{ $count ?? '0' }}</span>
                                    </p>
                                </a>
                            </li>

 
                            <li class="nav-item">
                                <a href="/admin/pedidos"
                                    class="{{ Request::path() === 'pedidos' ? 'nav-link active' : 'nav-link' }}">
                                    
                                    <i class="nav-icon fas fa-plus-circle"></i>
                                    <p>
                                        Pedidos
                                        <?php //use App\Acta;
//$count = Acta::all()->count();?>
                                        <span class="right badge badge-danger">{{ $count ?? '0' }}</span>
                                    </p>
                                </a>
                            </li>


                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">

                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <!-- NO QUITAR -->
                <strong>Desarrollado por AdeconPeru
                        <div class="float-right d-none d-sm-    -block">
                        <b>Version</b> 1.0
                    </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
    </div>
    @yield('scripts')
<!-- jQuery -->
 
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
 

</body>
</html>