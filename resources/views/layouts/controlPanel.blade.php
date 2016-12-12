<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CINECL UV</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/sidebar.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
    @yield('page-style-files')
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0px; position: fixed; z-index: 100; width:100%">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="row col-xs-12 col-sm-4">
            <div class="row col-xs-12">
                <div class="navbar-header fixed-brand">
                    <ul class="nav navbar-nav" style="padding-left: 20px; margin-top: 7px;"">
                        <li class="active" style="left: 20px;">
                            <button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle">
                                <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                            </button>
                        </li>
                        <li>
                           <a class="navbar-brand" href="{{ url('/') }}" style="padding-top: 5px;">
                            <img src="/images/home.png" alt="Escuela de Cine" style="max-width:140px; max-height:55px;">
                            </a>
                        </li>
                    </ul>
                </div>       
            </div>
        </div><!-- bs-example-navbar-collapse-1 -->
        <div class="col-xs-12 visible-xs">
            <div class="col-xs-9">
            {!! Form::open(['method'=>'GET','url' =>'search', 'role'=>'search'])  !!}
                <div class="input-group" style="margin-top: 9px;">
                    <input type="text" class="form-control" placeholder="Buscar" name="search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-xs-3">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </div>
        <div class="collapse navbar-collapse col-xs-12 col-sm-8" id="app-navbar-collapse" style="float: right;">
            <!-- Right Side Of Navbar -->

            <ul class="nav navbar-nav navbar-right">
                <li class="col-xs-12 col-sm-5 hidden-xs" style="padding-right: 0px; padding-left: 0px;">
                    {!! Form::open(['method'=>'GET','url' =>'search', 'role'=>'search', 'class'=>'navbar-form navbar-search', 'style'=>'padding: 9px 15px 5px;'])  !!}
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar" name="search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </li>
                <li class="col-xs-12 col-sm-2" style="padding-top: 8px;">
                    <a class="visible-xs" href="{{ url('/cine_tv') }}" role="button">
                        <span class="glyphicon glyphicon-calendar btn-nav"></span>
                        Programación
                    </a>
                    <a class="hidden-xs" href="{{ url('/cine_tv') }}" role="button">
                        <span class="glyphicon glyphicon-calendar btn-nav"></span>
                    </a>
                </li>
                
                <!-- Authentication Links -->
                @if (Auth::guest())
                <li class="col-xs-12 col-sm-2" style="margin-top: 10px;"><a href="{{ url('/login') }}">Ingreso</a></li>
                <li class="col-xs-12 col-sm-3" style="margin-top: 10px;"><a href="{{ url('/register') }}">Registro</a></li>
                @else
                {{--  Notifications --}}
                <li class="dropdown col-xs-12 col-sm-2" style="padding-top: 8px;">
                    @php
                        $thisUser = 0 
                    @endphp
                    @foreach($notifications as $notification)
                        @if($notification->send_to == Auth::user()->id)
                            @php
                                $thisUser++; 
                            @endphp
                        @endif
                    @endforeach

                    @if($thisUser == 0)
                        <a href="#" class="visible-xs dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-bell btn-nav"></span>
                            Notificaciones
                        </a>
                        <a href="#" class="hidden-xs dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-bell btn-nav"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li data-alert_id="1" class="alert_li">
                                <a class="alert_message"> Sin notificaciones </a> 
                                <br />
                                <div class="clearfix"></div>
                            </li>
                        </ul>
                    @else
                        {{-- Si tiene notificaciones --}}
                        <a href="#" class="visible-xs dropdown-toggle" style="color: #C1202C" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-bell btn-nav"></span>
                            Notificaciones
                        </a>
                        
                        <a href="#" class="hidden-xs dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-bell btn-nav" style="color: #C1202C"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @foreach($notifications as $notification)
                                @if($notification->send_to == Auth::user()->id)
                                    <li data-alert_id="1" class="alert_li">
                                        @if($notification->reason == "create")
                                        <a href="{!! url('approvemovie')!!}" class="alert_message"> El usuario {{ $notification->user_id }} ha creado un nuevo video</a>
                                        @endif
                                        @if ($notification->reason == "modify")
                                            <a href="{!! url('approvemovie')!!}" class="alert_message"> EL usuario {{ $notification->user_id }} ha modificado el video {{ $notification->movie_id }}</a>
                                        @endif
                                        <br />
                                        <div class="clearfix"></div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </li>
               {{--  Control Panel --}}
                <li class="dropdown col-xs-12 col-sm-3" style="padding-top: 8px;">
                <span class="glyphicons glyphicons-user"></span>

                <a href="#" class="dropdown-toggle visible-xs" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user btn-nav"></span> {{ Auth::user()->email }} <span class="caret"></span>
                </a>
                <a href="#" class="dropdown-toggle hidden-xs" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user btn-nav"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li data-alert_id="1" class="alert_li">
                        <a class="alert_message">{{ link_to_route('cpanel.index', $title = 'Panel de Control') }}</a>
                    </li>
                    <li data-alert_id="2" class="alert_li">
                        <a href="{{ url('/logout') }}" class="alert_message">Cerrar Sesión</a>
                        <div class="clearfix"></div>
                    </li>
                    <li data-alert_id="3" class="alert_li">
                        <a class="alert_message">{{ Auth::user()->email }}</a>
                        <div class="clearfix"></div>
                    </li>
                </ul>
                </li>
                @endif
            </ul>
        </div>
    </nav>

@if (!Auth::guest())
<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper" style="margin-top: 65px; position: fixed; z-index: 100;">
    @if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu1"> 
                <h5 class="submenu-title">Mi Usuario</h5>
            </div>
            <div class="submenu-body collapse" id="submenu1">
                <div class="list-group">
                    <li class="list-group-item"><i class='glyphicon glyphicon-edit'></i> {{ link_to_route('cpanel.edit', $title = 'Editar Perfil', $parameters = (Auth::user()->id)) }}</li>
                    <li>
                        <a href="{{ url('selectuser') }}" class="list-group-item"><i class='glyphicon glyphicon-pencil'></i>  Cambiar Contraseña </a>
                    </li>
                </div>
            </div>
        </div>
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu2"> 
                <h5 class="submenu-title">Administrar Usuarios</h5> 
            </div>
            <div class="submenu-body collapse" id="submenu2">
                <div class="list-group">
                <li>
                    <a href="{{ url('selectuser') }}" class="list-group-item"><i class='glyphicon glyphicon-user'></i>  Editar Usuarios</a>
                </li>
                <li>
                    <a href="{!! url('selectpassword')!!}" class="list-group-item"><i class='glyphicon glyphicon-pencil'></i>  Cambiar Contraseña</a>
                </li>
                <li>
                    <a href="{!! url('selectrange')!!}" class="list-group-item"><i class='glyphicon glyphicon-edit'></i>  Modificar Privilegios</a>
                </li>
                </div>
            </div>
        </div>
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu3"> 
                <h5 class="submenu-title">Administrar Videos</h5> 
            </div>
            <div class="submenu-body collapse" id="submenu3">
                <div class="list-group">
                <li>
                    <a href="{{ url('/upload') }}" class="list-group-item"><i class='glyphicon glyphicon-cloud-upload'></i>  Subir Video</a>
                </li>
                <li>
                     <a href="{!! url('editmovie')!!}" class="list-group-item"><i class='glyphicon glyphicon-pencil'></i>  Editar Videos</a>
                </li>
                <li>
                    <a href="{!! url('approvemovie')!!}" class="list-group-item"><i class='glyphicon glyphicon-ok'></i>  Aprobar Videos</a>
                </li>
                </div>
            </div>
        </div>
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu4"> 
                <h5 class="submenu-title">Administrar Anuncios</h5> 
            </div>
            <div class="submenu-body collapse" id="submenu4">
                <div class="list-group">
                    <li>
                        <a href="{!! url('showadver')!!}" class="list-group-item"><i class='glyphicon glyphicon-list'></i>  Ver Anuncios</a>
                    </li>
                    <li>
                        <a href="{!! url('createadver')!!}" class="list-group-item"><i class='glyphicon glyphicon-plus'></i>  Crear Anuncios</a>
                    </li>
                </div>
            </div>
        </div>
        @if (Auth::user()->tipo == "administrador")
            <div class="submenu">
                <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu5"> 
                    <h5 class="submenu-title">Administrar Parrilla</h5> 
                </div>
                <div class="submenu-body collapse" id="submenu5">
                    <div class="list-group">
                        <li>
                            <a href="{!! url('createprogram')!!}" class="list-group-item"><i class='glyphicon glyphicon-time'></i>  Programar Parrilla</a>
                        </li>
                    </div>
                </div>
            </div>
        @endif
    @elseif (Auth::user()->tipo == "alumno")
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu1"> 
                <h5 class="submenu-title">Mi Usuario</h5>
            </div>
            <div class="submenu-body collapse" id="submenu1">
                <div class="list-group">
                    <li class="list-group-item"><i class='glyphicon glyphicon-edit'></i> {{ link_to_route('cpanel.edit', $title = 'Editar Perfil', $parameters = (Auth::user()->id)) }}</li>
                    <li>
                        <a href="{{ url('selectuser') }}" class="list-group-item"><i class='glyphicon glyphicon-pencil'></i>  Cambiar Contraseña </a>
                    </li>
                </div>
            </div>
        </div>
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu2"> 
                <h5 class="submenu-title">Administrar Videos</h5> 
            </div>
            <div class="submenu-body collapse" id="submenu2">
                <div class="list-group">
                <li>
                    <a href="{{ url('/upload') }}" class="list-group-item"><i class='glyphicon glyphicon-cloud-upload'></i>  Subir Video</a>
                </li>
                <li>
                     <a href="{!! url('editmovie')!!}" class="list-group-item"><i class='glyphicon glyphicon-pencil'></i>  Editar Videos</a>
                </li>
                </div>
            </div>
        </div>
    @elseif (Auth::user()->tipo == "adminParrilla")
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu1"> 
                <h5 class="submenu-title">Mi Usuario</h5>
            </div>
            <div class="submenu-body collapse" id="submenu1">
                <div class="list-group">
                    <li class="list-group-item"><i class='glyphicon glyphicon-edit'></i> {{ link_to_route('cpanel.edit', $title = 'Editar Perfil', $parameters = (Auth::user()->id)) }}</li>
                    <li>
                        <a href="{{ url('selectuser') }}" class="list-group-item"><i class='glyphicon glyphicon-pencil'></i>  Cambiar Contraseña </a>
                    </li>
                </div>
            </div>
        </div>
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu2"> 
                <h5 class="submenu-title">Administrar Parrilla</h5> 
            </div>
            <div class="submenu-body collapse" id="submenu2">
                <div class="list-group">
                    <li>
                        <a href="{!! url('createprogram')!!}" class="list-group-item"><i class='glyphicon glyphicon-time'></i>  Programar Parrilla</a>
                    </li>
                </div>
            </div>
        </div>
    @elseif (Auth::user()->tipo == "externo")
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu1"> 
                <h5 class="submenu-title">Mi Usuario</h5>
            </div>
            <div class="submenu-body collapse" id="submenu1">
                <div class="list-group">
                    <li class="list-group-item"><i class='glyphicon glyphicon-edit'></i> {{ link_to_route('cpanel.edit', $title = 'Editar Perfil', $parameters = (Auth::user()->id)) }}</li>
                    <li>
                        <a href="{{ url('selectuser') }}" class="list-group-item"><i class='glyphicon glyphicon-pencil'></i>  Cambiar Contraseña </a>
                    </li>
                </div>
            </div>
        </div>
    @endif
        
    </div><!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper" style="margin-top: 65px;">
        @yield('content')

        </div>
        <!-- /#page-content-wrapper -->
    </div>
@endif
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/sidebar_menu.js"></script>
    @yield('page-js-files')
    @yield('page-js-script')

    
</body>
</html>



{{-- @if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
            <div class="navbar-default sidebar" style="padding-top: 50px;" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"> Mi Usuario<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level" data-toggle="collapse">
                                <li>
                                    {{ link_to_route('cpanel.edit', $title = 'Editar Perfil', $parameters = (Auth::user()->id)) }}
                                </li>
                                <li>
                                    <a href="{{ url('selectuser') }}"><i class='glyphicon glyphicon-film'></i>Cambiar Contraseña</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"> Administrar Usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('selectuser') }}"><i class='glyphicon glyphicon-film'></i>Editar Usuarios</a>
                                </li>
                                <li>
                                    <a href="{!! url('selectpassword')!!}"><i class='glyphicon glyphicon-pencil'></i>Cambiar Contraseña</a>
                                </li>
                                <li>
                                    <a href="{!! url('selectrange')!!}"><i class='glyphicon glyphicon-ok'></i>Modificar Tipo de Usuario</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"> Administrar Videos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                 <li>
                                    <a href="{{ url('/upload') }}"><i class='glyphicon glyphicon-film'></i>Subir Video</a>
                                </li>
                                <li>
                                    <a href="{!! url('editmovie')!!}"><i class='glyphicon glyphicon-pencil'></i>Editar Videos</a>
                                </li>
                                <li>
                                    <a href="{!! url('approvemovie')!!}"><i class='glyphicon glyphicon-ok'></i>Aprobar Videos</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Administrar Anuncios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!! url('showadver')!!}"><i class='fa fa-list-ol fa-fw' ></i>Ver Anuncios</a>
                                </li>
                                <li>
                                    <a href="{!! url('createadver')!!}"><i class='fa fa-plus fa-fw'></i>Crear Anuncios</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Administrar Parrilla<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!! url('createprogram')!!}"><i class='fa fa-plus fa-fw'></i>Programar Parrilla</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            @elseif (Auth::user()->tipo == "alumno")
                <div class="navbar-default sidebar" style="padding-top: 50px;" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                {{ link_to_route('cpanel.edit', $title = 'Editar Perfil', $parameters = (Auth::user()->id))}}
                            </li>
                        </ul>
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="{!! url('createplaylist')!!}">Mis Videos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif --}}