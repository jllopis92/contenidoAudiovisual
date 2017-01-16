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
    <nav class="col-xs-12 navbar navbar-default navbar-static-top boldFont" style="margin-bottom: 0px; position: fixed; z-index: 100; width:100%; background-color: #F0643C;">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="row col-xs-12 col-sm-5">
            <div class="row col-xs-12" style="padding-left: 0px;">
                <div class="navbar-header fixed-brand">
                    <ul class="nav navbar-nav" style="margin-top: 0px;">
                        <li class="col-xs-9" style="height: 64px; background-color: #ffffff; border-color: #e7e7e7; padding-left: 10px;">
                           <a class="navbar-brand" href="{{ url('/') }}" style=" width: 161px; padding-top: 5px; padding-left: 0px;">
                            <img src="/images/home.png" alt="Escuela de Cine" style="max-width:180px; max-height:55px;">
                            </a>
                        </li>
                        <li class="active col-xs-3" style="left: 20px; margin-top: 7px;" align="right">
                            <button class="navbar-toggle collapse in" style="background-color: #F0643C !important;" data-toggle="collapse" id="menu-toggle">
                                <span class="glyphicon glyphicon-th-list"  aria-hidden="true" style="background-color: #F0643C !important; color: white;"></span>
                            </button>
                        </li>
                    </ul>
                </div>       
            </div>
        </div><!-- bs-example-navbar-collapse-1 -->
    <div class="col-xs-12 visible-xs">
        <div class="col-xs-9">
        {!! Form::open(['method'=>'GET','url' =>'search', 'role'=>'search'])  !!}
            <div class="input-group" style="margin-top: 9px;">
                <input type="text" class="form-control" style="border-right-width: 0px;" name="search">
                <div class="input-group-btn">
                    <button class="btn btn-default orangeText" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-xs-3">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar whiteBackground"></span>
                <span class="icon-bar whiteBackground"></span>
                <span class="icon-bar whiteBackground"></span>
            </button>
        </div>
    </div>
    <div class="collapse navbar-collapse col-xs-12 col-sm-7" id="app-navbar-collapse" style="float: right; background-color: #F0643C;">
        <!-- Right Side Of Navbar -->

        <ul class="nav navbar-nav navbar-right">
            <li class="col-xs-12 col-sm-5 hidden-xs" style="padding-right: 0px; padding-left: 0px; ">
                {!! Form::open(['method'=>'GET','url' =>'search', 'role'=>'search', 'class'=>'navbar-form navbar-search', 'style'=>'padding: 9px 15px 5px; color: #F0643C;'])  !!}
                <div class="input-group">
                    <input type="text" style="border-right-width: 0px;" class="form-control" name="search">
                    <div class="input-group-btn">
                        <button class="btn btn-default orangeText" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
                {!! Form::close() !!}
            </li>
            <li class="col-xs-12 col-sm-2" style="padding-top: 8px; padding-left: 0px; padding-right: 0px;">
                <a class="visible-xs" href="{{ url('/cine_tv') }}" role="button">
                    <span class="glyphicon glyphicon-calendar btn-nav"></span>
                    Programación
                </a>
                <a class="hidden-xs" href="{{ url('/cine_tv') }}" role="button" style="padding-top:10px;">
                    <img class="btn-nav orange_back" src="/img/tv_icon.png" alt="Cine TV" style="width:30px; height:30px;">
                </a>
            </li>
            
            <!-- Authentication Links -->
            @if (Auth::guest())
            <li class="col-xs-12 col-sm-2" style="margin-top: 10px; padding-left: 0px; padding-right: 0px;"><a href="{{ url('/login') }}">Ingreso</a></li>
            <li class="col-xs-12 col-sm-3" style="margin-top: 10px; padding-left: 0px; padding-right: 0px;"><a href="{{ url('/register') }}">Registro</a></li>
            @else
            {{--  Notifications --}}
            <li class="dropdown col-xs-12 col-sm-2" style="padding-top: 8px; padding-left: 0px; padding-right: 0px;">
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
                    <a href="#" class="visible-xs dropdown-toggle orange_back" style="background-color: #F0643C !important;" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="glyphicon glyphicon-bell btn-nav orange_back" style="background-color: #F0643C !important;"></span>
                        Notificaciones
                    </a>
                    <a href="#" class="hidden-xs dropdown-toggle orange_back" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="glyphicon glyphicon-bell btn-nav orange_back"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li data-alert_id="1" class="alert_li" style="background-color: #F0643C">
                            <a class="alert_message" style="color: white;"> Sin notificaciones </a> 
                            <br />
                            <div class="clearfix"></div>
                        </li>
                    </ul>
                @else
                    {{-- Si tiene notificaciones --}}
                    <a href="#" class="visible-xs dropdown-toggle orange_back" style="color: #C1202C" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="glyphicon glyphicon-bell btn-nav orange_back"></span>
                        Notificaciones
                    </a>
                    
                    <a href="#" class="hidden-xs dropdown-toggle orange_back" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="glyphicon glyphicon-bell btn-nav orange_back" style="color: #C1202C"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        @foreach($notifications as $notification)
                            @if($notification->send_to == Auth::user()->id)
                                <li data-alert_id="1" class="alert_li dark_orange_back" style="background-color: #F0643C">
                                    @if($notification->reason == "create")
                                     <a href="{{ action("CpanelController@approveMovieToNotif", array($notification->id)) }}" class="alert_message dark_orange_back" style="color: white;"> El usuario {{ $notification->user_id }} ha subido un nuevo video</a>
                                    @endif
                                    
                                    @if ($notification->reason == "modify")

                                        <a href="{{ action("CpanelController@editfromnotif", array($notification->id)) }}" class="alert_message dark_orange_back" style="color: white;"> El usuario {{ $notification->user_id }}  ha modificado el video {{ $notification->movie_id }}</a>
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
            <li class="dropdown col-xs-12 col-sm-3" style="background-color: #F0643C !important;padding-top: 8px; padding-left: 0px;  padding-right: 0px;">
                <span class="glyphicons glyphicons-user" style="background-color: #F0643C !important;"></span>

                <a href="#" class="dropdown-toggle visible-xs" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user btn-nav"></span> {{ Auth::user()->email }} <span class="caret"></span>
                </a>
                <a href="#" class="dropdown-toggle hidden-xs" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user btn-nav"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li data-alert_id="1" class="alert_li dark_orange_back" style="background-color: #F0643C">
                        <a href="{{ url('/cpanel') }}" class="alert_message dark_orange_back" style="color: white;">Panel de Control</a>
                    </li>
                    <li data-alert_id="2" class="alert_li dark_orange_back" style="background-color: #F0643C">
                        <a href="{{ url('/logout') }}" class="alert_message dark_orange_back" style="color: white;">Cerrar Sesión</a>
                        <div class="clearfix"></div>
                    </li>
                    <li data-alert_id="3" class="alert_li dark_orange_back" style="background-color: #F0643C">
                        <a class="alert_message dark_orange_back" style="color: white;">{{ Auth::user()->email }}</a>
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
    <div id="sidebar-wrapper" class="contentAfterNavbar" style="position: fixed; z-index: 100;">
    @if (Auth::user()->tipo == "profesor")
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu1"> 
                <h5 class="submenu-title orangeAndBoldText">Mi Usuario</h5>
            </div>
            <div class="submenu-body collapse" id="submenu1">
                <div class="list-group">
                    <li class="list-group-item"><i class='glyphicon glyphicon-edit'></i> {{ link_to_route('cpanel.edit', $title = 'Editar Perfil', $parameters = (Auth::user()->id), $attributes = ['class'=>'blackText'] ) }}</li>
                    <li class="list-group-item"><i class='glyphicon glyphicon-pencil'></i>
                        {!! link_to_route('user.edit', $title = 'Cambiar Contraseña', $parameters =  (Auth::user()->id), $attributes = ['class'=>'blackText'])!!}
                    </li>
                </div>
            </div>
        </div>
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu2"> 
                <h5 class="submenu-title orangeAndBoldText">Administrar Videos</h5> 
            </div>
            <div class="submenu-body collapse" id="submenu2">
                <div class="list-group">
                    <li class="list-group-item" style="padding: 0px">
                        <a href="{{ url('/upload') }}" class="list-group-item"><i class='glyphicon glyphicon-cloud-upload'></i>  Subir Video</a>
                    </li>
                    <li class="list-group-item" style="padding: 0px">
                         <a href="{!! url('editmovie')!!}" class="list-group-item"><i class='glyphicon glyphicon-pencil'></i>  Editar Videos</a>
                    </li>
                    <li class="list-group-item" style="padding: 0px">
                        <a href="{!! url('approvemovie')!!}" class="list-group-item"><i class='glyphicon glyphicon-ok'></i>  Aprobar Videos</a>
                    </li>
                </div>
            </div>
        </div>
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu3"> 
                <h5 class="submenu-title orangeAndBoldText">Administrar Anuncios</h5> 
            </div>
            <div class="submenu-body collapse" id="submenu3">
                <div class="list-group">
                    <li class="list-group-item" style="padding: 0px">
                        <a href="{!! url('showadver')!!}" class="list-group-item"><i class='glyphicon glyphicon-list'></i>  Ver Anuncios</a>
                    </li>
                    <li class="list-group-item" style="padding: 0px">
                        <a href="{!! url('createadver')!!}" class="list-group-item"><i class='glyphicon glyphicon-plus'></i>  Crear Anuncios</a>
                    </li>
                </div>
            </div>
        </div>
    @elseif (Auth::user()->tipo == "administrador")
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu1"> 
                <h5 class="submenu-title orangeAndBoldText">Mi Usuario</h5>
            </div>
            <div class="submenu-body collapse" id="submenu1">
                <div class="list-group">
                    <li class="list-group-item"><i class='glyphicon glyphicon-edit'></i> {{ link_to_route('cpanel.edit', $title = 'Editar Perfil', $parameters = (Auth::user()->id), $attributes = ['class'=>'blackText'] ) }}</li>
                    <li class="list-group-item"><i class='glyphicon glyphicon-pencil'></i>
                        {!! link_to_route('user.edit', $title = 'Cambiar Contraseña', $parameters =  (Auth::user()->id), $attributes = ['class'=>'blackText'])!!}
                    </li>
                </div>
            </div>
        </div>
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu2"> 
                <h5 class="submenu-title orangeAndBoldText">Administrar Usuarios</h5> 
            </div>
            <div class="submenu-body collapse" id="submenu2">
                <div class="list-group">
                <li class="list-group-item" style="padding: 0px">
                    <a href="{{ url('selectuser') }}" class="list-group-item"><i class='glyphicon glyphicon-user'></i>  Editar Usuarios</a>
                </li>
                <li class="list-group-item" style="padding: 0px">
                    <a href="{!! url('selectpassword')!!}" class="list-group-item"><i class='glyphicon glyphicon-pencil'></i>  Cambiar Contraseña</a>
                </li>
                <li class="list-group-item" style="padding: 0px">
                    <a href="{!! url('selectrange')!!}" class="list-group-item"><i class='glyphicon glyphicon-edit'></i>  Modificar Privilegios</a>
                </li>
                </div>
            </div>
        </div>
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu3"> 
                <h5 class="submenu-title orangeAndBoldText">Administrar Videos</h5> 
            </div>
            <div class="submenu-body collapse" id="submenu3">
                <div class="list-group">
                <li class="list-group-item" style="padding: 0px">
                    <a href="{{ url('/upload') }}" class="list-group-item"><i class='glyphicon glyphicon-cloud-upload'></i>  Subir Video</a>
                </li>
                <li class="list-group-item" style="padding: 0px">
                     <a href="{!! url('editmovie')!!}" class="list-group-item"><i class='glyphicon glyphicon-pencil'></i>  Editar Videos</a>
                </li>
                <li class="list-group-item" style="padding: 0px">
                    <a href="{!! url('approvemovie')!!}" class="list-group-item"><i class='glyphicon glyphicon-ok'></i>  Aprobar Videos</a>
                </li>
                </div>
            </div>
        </div>
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu4"> 
                <h5 class="submenu-title orangeAndBoldText">Administrar Anuncios</h5> 
            </div>
            <div class="submenu-body collapse" id="submenu4">
                <div class="list-group">
                    <li class="list-group-item" style="padding: 0px">
                        <a href="{!! url('showadver')!!}" class="list-group-item"><i class='glyphicon glyphicon-list'></i>  Ver Anuncios</a>
                    </li>
                    <li class="list-group-item" style="padding: 0px">
                        <a href="{!! url('createadver')!!}" class="list-group-item"><i class='glyphicon glyphicon-plus'></i>  Crear Anuncios</a>
                    </li>
                </div>
            </div>
        </div>
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu5"> 
                <h5 class="submenu-title orangeAndBoldText">Administrar Asignaturas</h5> 
            </div>
            <div class="submenu-body collapse" id="submenu5">
                <div class="list-group">
                    <li class="list-group-item" style="padding: 0px">
                        <a href="{!! url('showsubject')!!}" class="list-group-item"><i class='glyphicon glyphicon-list'></i>  Ver Asignaturas</a>
                    </li>
                    <li class="list-group-item" style="padding: 0px">
                        <a href="{!! url('createsubject')!!}" class="list-group-item"><i class='glyphicon glyphicon-plus'></i>  Crear Asignaturas</a>
                    </li>
                </div>
            </div>
        </div>
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu6"> 
                <h5 class="submenu-title orangeAndBoldText">Administrar Genero</h5> 
            </div>
            <div class="submenu-body collapse" id="submenu6">
                <div class="list-group">
                    <li class="list-group-item" style="padding: 0px">
                        <a href="{!! url('showgenre')!!}" class="list-group-item"><i class='glyphicon glyphicon-list'></i>  Ver Generos</a>
                    </li>
                    <li class="list-group-item" style="padding: 0px">
                        <a href="{!! url('creategenre')!!}" class="list-group-item"><i class='glyphicon glyphicon-plus'></i>  Crear Genero</a>
                    </li>
                </div>
            </div>
        </div>
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu7"> 
                <h5 class="submenu-title orangeAndBoldText">Administrar Formatos</h5> 
            </div>
            <div class="submenu-body collapse" id="submenu7">
                <div class="list-group">
                    <li class="list-group-item" style="padding: 0px">
                        <a href="{!! url('showformat')!!}" class="list-group-item"><i class='glyphicon glyphicon-list'></i>  Ver Formatos</a>
                    </li>
                    <li class="list-group-item" style="padding: 0px">
                        <a href="{!! url('createformat')!!}" class="list-group-item"><i class='glyphicon glyphicon-plus'></i>  Crear Formato</a>
                    </li>
                </div>
            </div>
        </div>
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu8"> 
                <h5 class="submenu-title orangeAndBoldText">Administrar Tipos de Videos</h5> 
            </div>
            <div class="submenu-body collapse" id="submenu8">
                <div class="list-group">
                    <li class="list-group-item" style="padding: 0px">
                        <a href="{!! url('showtype')!!}" class="list-group-item"><i class='glyphicon glyphicon-list'></i>  Ver Tipos</a>
                    </li>
                    <li class="list-group-item" style="padding: 0px">
                        <a href="{!! url('createtype')!!}" class="list-group-item"><i class='glyphicon glyphicon-plus'></i>  Crear Tipo</a>
                    </li>
                </div>
            </div>
        </div>
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu9"> 
                <h5 class="submenu-title orangeAndBoldText">Administrar Parrilla</h5> 
            </div>
            <div class="submenu-body collapse" id="submenu9">
                <div class="list-group">
                    <li class="list-group-item" style="padding: 0px">
                        <a href="{!! url('createprogram')!!}" class="list-group-item"><i class='glyphicon glyphicon-time'></i>  Programar Parrilla</a>
                    </li>
                </div>
            </div>
        </div>
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu10"> 
                <h5 class="submenu-title orangeAndBoldText">Ver Estatisticas</h5> 
            </div>
            <div class="submenu-body collapse" id="submenu10">
                <div class="list-group">
                    <li class="list-group-item" style="padding: 0px">
                        <a href="{!! url('createprogram')!!}" class="list-group-item"><i class='glyphicon glyphicon-user'></i>  Por Usuario</a>
                    </li>
                    <li class="list-group-item" style="padding: 0px">
                        <a href="{!! url('createprogram')!!}" class="list-group-item"><i class='glyphicon glyphicon-film'></i>  Por Video</a>
                    </li>
                </div>
            </div>
        </div>
    @elseif (Auth::user()->tipo == "alumno")
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu1"> 
                <h5 class="submenu-title orangeAndBoldText">Mi Usuario</h5>
            </div>
            <div class="submenu-body collapse" id="submenu1">
                <div class="list-group">
                    <li class="list-group-item"><i class='glyphicon glyphicon-edit'></i> {{ link_to_route('cpanel.edit', $title = 'Editar Perfil', $parameters = (Auth::user()->id), $attributes = ['class'=>'blackText'] ) }}</li>
                    <li class="list-group-item"><i class='glyphicon glyphicon-pencil'></i>
                        {!! link_to_route('user.edit', $title = 'Cambiar Contraseña', $parameters =  (Auth::user()->id), $attributes = ['class'=>'blackText'])!!}
                    </li>
                </div>
            </div>
        </div>
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu2"> 
                <h5 class="submenu-title orangeAndBoldText">Administrar Videos</h5> 
            </div>
            <div class="submenu-body collapse" id="submenu2">
                <div class="list-group">
                <li class="list-group-item" style="padding: 0px">
                    <a href="{{ url('/upload') }}" class="list-group-item"><i class='glyphicon glyphicon-cloud-upload'></i>  Subir Video</a>
                </li>
                <li class="list-group-item" style="padding: 0px">
                    <a href="{!! url('editmovie')!!}" class="list-group-item"><i class='glyphicon glyphicon-pencil'></i>  Editar Videos</a>
                </li>
                </div>
            </div>
        </div>
    @elseif (Auth::user()->tipo == "adminParrilla")
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu1"> 
                <h5 class="submenu-title orangeAndBoldText">Mi Usuario</h5>
            </div>
            <div class="submenu-body collapse" id="submenu1">

                <div class="list-group">
                    <li class="list-group-item"><i class='glyphicon glyphicon-edit'></i> {{ link_to_route('cpanel.edit', $title = 'Editar Perfil', $parameters = (Auth::user()->id), $attributes = ['class'=>'blackText'] ) }}</li>
                    <li class="list-group-item"><i class='glyphicon glyphicon-pencil'></i>
                        {!! link_to_route('user.edit', $title = 'Cambiar Contraseña', $parameters =  (Auth::user()->id), $attributes = ['class'=>'blackText'])!!}
                    </li>
                </div>
            </div>
        </div>
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu2"> 
                <h5 class="submenu-title orangeAndBoldText">Administrar Parrilla</h5> 
            </div>
            <div class="submenu-body collapse" id="submenu2">
                <div class="list-group">
                    <li class="list-group-item" style="padding: 0px">
                        <a href="{!! url('createprogram')!!}" class="list-group-item"><i class='glyphicon glyphicon-time'></i>  Programar Parrilla</a>
                    </li>
                </div>
            </div>
        </div>
    @elseif (Auth::user()->tipo == "externo")
        <div class="submenu">
            <div class="submenu-heading" data-parent="#nav-menu" data-toggle="collapse" data-target="#submenu1"> 
                <h5 class="submenu-title orangeAndBoldText">Mi Usuario</h5>
            </div>
            <div class="submenu-body collapse" id="submenu1">
                <div class="list-group">
                    <li class="list-group-item"><i class='glyphicon glyphicon-edit'></i> {{ link_to_route('cpanel.edit', $title = 'Editar Perfil', $parameters = (Auth::user()->id), $attributes = ['class'=>'blackText'] ) }}</li>
                    <li class="list-group-item"><i class='glyphicon glyphicon-pencil'></i>
                        {!! link_to_route('user.edit', $title = 'Cambiar Contraseña', $parameters =  (Auth::user()->id), $attributes = ['class'=>'blackText'])!!}
                    </li>
                </div>
            </div>
        </div>
    @endif
        
    </div><!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper" class="contentAfterNavbar" style="padding-left: 20px;">
        @yield('content')
    </div>
        <!-- /#page-content-wrapper -->
    </div>
@else
    <script type="text/javascript">
        window.location = "/";//here double curly bracket
    </script>

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