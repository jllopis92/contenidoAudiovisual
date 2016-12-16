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
                        <li class="col-xs-9" style="height: 64px; width: 200px; background-color: #ffffff; border-color: #e7e7e7; padding-left: 10px;">
                           <a class="navbar-brand" href="{{ url('/') }}" style="padding-top: 5px; padding-left: 0px;">
                            <img src="/images/home.png" alt="Escuela de Cine" style="max-width:180px; max-height:55px;">
                            </a>
                        </li>
                        <li class="active col-xs-3" style="left: 20px; margin-top: 7px;" align="right">
                            <button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle">
                                <span class="glyphicon glyphicon-th-list" aria-hidden="true" style="    color: white;"></span>
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
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
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
                <a class="hidden-xs" href="{{ url('/cine_tv') }}" role="button">
                    <span class="glyphicon glyphicon-calendar btn-nav"></span>
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
            <li class="dropdown col-xs-12 col-sm-3" style="padding-top: 8px; padding-left: 0px;  padding-right: 0px;">
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
<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper" class="contentAfterNavbar" style="position: fixed; z-index: 100;">
    {!! Form::open(['method'=>'GET','url' =>'filter', 'role'=>'filter'])  !!}
        <ul class="sidebar-nav nav-pills nav-stacked" id="menu" style="align-items: center;">
            <li style="max-height: 30px;">
                <a class="boldFont" style="color: #333;"> Busqueda por Filtro</a>
            </li>
            <li style="max-height: 25px;">
                <a class="boldFont orangeText"> Tipo de Video</a>
            </li>
            <li style="max-height: 25px;">
                <input type="checkbox" name="largometraje" value="largometraje"> Largometraje
            </li>
            <li style="max-height: 25px;">
                <input type="checkbox" name="mediometraje" value="mediometraje"> Mediometraje
            </li>
            <li style="max-height: 25px;">
                <input type="checkbox" name="cortometraje" value="cortometraje"> Cortometraje
            </li>
            <li style="max-height: 25px;">
                <a class="boldFont orangeText"> Genero</a>
            </li>
            <li style="max-height: 25px;">
                <input type="checkbox" name="experimental" value="experimental"> Experimental
            </li>
            <li style="max-height: 25px;">
                <input type="checkbox" name="ficcion" value="ficcion"> Ficción
            </li>
            <li style="max-height: 25px;">
                <input type="checkbox" name="animacion" value="animacion"> Animación
            </li>
            <li style="max-height: 25px;">
                <input type="checkbox" name="documental" value="documental"> Documental
            </li>

            <li style="max-height: 25px;">
                <a class="boldFont orangeText"> Formato</a>
            </li>
            <li style="max-height: 25px;">
                <input type="checkbox" name="4K" value="4K"> 4K
            </li>
            <li style="max-height: 25px;">
                <input type="checkbox" name="2K" value="2K"> 2K
            </li>
            <li style="max-height: 25px;">
                <input type="checkbox" name="HD" value="HD"> HD
            </li>
            <li style="max-height: 25px;">
                <input type="checkbox" name="MiniDV" value="MiniDV"> MiniDV
            </li>
            <li style="max-height: 25px;">
                <input type="checkbox" name="16mm" value="16mm"> 16mm
            </li>
            <li style="max-height: 25px;">
                <input type="checkbox" name="35mm" value="35mm"> 35mm
            </li>
            </br>
            <button type="submit" class="btn btn-primary orangeButton" style="margin-left: 15px; margin-top: 10px;">
                <i class="fa fa-btn fa-sign-in"></i> Buscar
            </button>
            
        </ul>
        {!! Form::close() !!}
    </div><!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper" class="contentAfterNavbar">
        @yield('content')
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/sidebar_menu.js"></script>
    @yield('page-js-files')
    @yield('page-js-script')

    
</body>
</html>