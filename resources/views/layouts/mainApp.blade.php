<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="home_icon" href="/images/home.png">

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
                        <li class="col-xs-7 col-sm-9" style="height: 64px; background-color: #ffffff; border-color: #e7e7e7; padding-left: 10px;">
                           <a class="navbar-brand" href="{{ url('/') }}" style="width: 161px; padding-top: 5px; padding-left: 0px;">
                            <img src="/images/home.png" alt="Escuela de Cine" style="max-width:180px; max-height:55px;">
                            </a>
                        </li>
                        <li class="active col-sm-3 offset-xs-4 col-sm-3" style="left: 20px; margin-top: 7px;" align="right">
                            <button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle">
                                <span class="glyphicon glyphicon-th-list" aria-hidden="true" style="    color: white;"></span>
                            </button>
                        </li>
                    </ul>
                </div>       
            </div>
        </div><!-- bs-example-navbar-collapse-1 -->
    {{-- <div class="col-xs-12 visible-xs">
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
    </div> --}}
    <div class="col-sm-7 hidden-xs" style="float: right; background-color: #F0643C;">
        <!-- Right Side Of Navbar -->

        <ul class="nav navbar-nav navbar-right" style="width: 100%;">
            <li class="col-xs-12 col-sm-5 hidden-xs" style="padding-right: 0px; padding-left: 0px;">
                {!! Form::open(['method'=>'GET','url' =>'search', 'role'=>'search', 'class'=>'navbar-form navbar-search', 'style'=>'padding: 9px 15px 5px; color: #F0643C;'])  !!}
                <div class="input-group">
                    <input type="text" style="border-right-width: 0px;" class="form-control" name="search"  placeholder="Nombre, Formato, Genero, Tipo">
                    <div class="input-group-btn">
                        <button class="btn btn-default orangeText" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
                {!! Form::close() !!}
            </li>
            <li class="col-xs-12 col-sm-2" style="padding-top: 8px; padding-left: 0px; padding-right: 0px;">
                <a class="visible-xs" href="{{ action("CineTvController@index") }}" target="_blank" role="button">
                    Programación
                </a>
                <a class="hidden-xs" href="{{ url('/cine_tv') }}" target="_blank" role="button" style="padding-top:10px;">
                <img class="btn-nav orange_back" src="/img/tv_icon.png" alt="Cine TV" style="width:30px; height:30px;">
                </a>
            </li>
            
            <!-- Authentication Links -->
            @if (Auth::guest())
            <li class="col-xs-12 col-sm-2" style="margin-top: 10px; padding-left: 0px; padding-right: 0px;"><a href="{{ url('/login') }}">Ingreso</a></li>
            <li class="col-xs-12 col-sm-3" style="margin-top: 10px; padding-left: 0px; padding-right: 0px;"><a href="{{ url('/register') }}">Registro</a></li>
            @else
            {{--  Notifications --}}
            <li class="dropdown col-xs-12 col-sm-2 orange_back" style="padding-top: 8px; padding-left: 0px; padding-right: 0px;">
                @php
                    $thisUser = 0 
                @endphp
                @foreach($notifications as $notification)
                    @if(($notification->send_to == Auth::user()->id) && ($notification->watch == 0))
                        @php
                            $thisUser++; 
                        @endphp
                    @endif
                @endforeach

                @if($thisUser == 0)
                    <a href="#" class="visible-xs dropdown-toggle orange_back" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="glyphicon glyphicon-bell btn-nav orange_back"></span>
                        Notificaciones
                    </a>
                    <a href="#" class="hidden-xs dropdown-toggle orange_back" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="glyphicon glyphicon-bell btn-nav orange_back"></span>
                    </a>
                    <ul class="dropdown-menu orangeBackground" role="menu">
                        <li data-alert_id="1" class="alert_li dark_orange_back" style="background-color: #F0643C">
                            <a class="alert_message whiteText dark_orange_back" style="color: white;"> Sin notificaciones </a> 
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
                                     <a href="{{ action("CpanelController@approveMovieToNotif", array($notification->id)) }}" class="alert_message dark_orange_back" style="color: white;"> El usuario {{ $notification->user_name }} ha subido un nuevo video</a>
                                    @endif
                                    
                                    @if ($notification->reason == "modify")
                                        <a href="{{ action("CpanelController@editfromnotif", array($notification->id)) }}" class="alert_message dark_orange_back" style="color: white;"> El usuario {{ $notification->user_name }}  ha modificado el video {{ $notification->movie_name }}</a>
                                    @endif

                                    @if($notification->reason == "reprove")

                                     <a href="{!! link_to_route('upload.edit', $title = 'Editar', $parameters = $notification->movie_id)!!}" class="alert_message dark_orange_back" style="color: white;"> El usuario {{ $notification->user_name }} ha subido un nuevo video</a>
                                    @endif

                                    @if($notification->reason == "aprove")
                                     <a href="{!! link_to_route('upload.edit', $title = 'Editar', $parameters = $notification->movie_id)!!}" class="alert_message dark_orange_back" style="color: white;"> El usuario {{ $notification->user_name }} ha subido un nuevo video</a>
                                    @endif

                                    @if($notification->reason == "observation")
                                     <a href="{!! link_to_route('upload.edit', $title = 'Editar', $parameters = $notification->movie_id)!!}" class="alert_message dark_orange_back" style="color: white;"> El usuario {{ $notification->user_name }} ha subido un nuevo video</a>
                                    @endif

                                    @if($notification->reason == "wait")
                                     <a href="{!! link_to_route('upload.edit', $title = 'Editar', $parameters = $notification->movie_id)!!}" class="alert_message dark_orange_back" style="color: white;"> El usuario {{ $notification->user_name }} ha subido un nuevo video</a>
                                    @endif

                                    @if ($notification->reason == "alumno")
                                        <a href="{!! url('selectrange')!!}" class="alert_message dark_orange_back" style="color: white;"> El usuario {{ $notification->user_name }}  ha solicitado cambiar su rango a Alumno</a>
                                    @endif
                                    
                                    @if ($notification->reason == "profesor")
                                        <a href="{!! url('selectrange')!!}" class="alert_message dark_orange_back" style="color: white;"> El usuario {{ $notification->user_name }}  ha solicitado cambiar su rango a Profesor</a>
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
            <li class="dropdown col-xs-12 col-sm-3 orange_back" style="padding-top: 8px; padding-left: 0px;  padding-right: 0px;">
                <span class="glyphicons glyphicons-user"></span>

                <a href="#" class="dropdown-toggle visible-xs orange_back" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user btn-nav"></span> {{ Auth::user()->email }} <span class="caret"></span>
                </a>
                <a href="#" class="dropdown-toggle hidden-xs orange_back" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user btn-nav"></span><span class="caret"></span>
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
<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper" class="contentAfterNavbar" style="position: fixed; z-index: 100;">
    
        <ul class="sidebar-nav nav-pills nav-stacked" id="menu" style="align-items: center; margin-top: 0px;">
            <div class="visible-xs" style="background-color: #F0643C;">
                <li>
                    {!! Form::open(['method'=>'GET','url' =>'search', 'role'=>'search', 'class'=>'navbar-form navbar-search', 'style'=>'padding: 9px 15px 5px; color: #F0643C;'])  !!}
                    <div class="input-group">
                        <input type="text" style="width: 110%; border-right-width: 0px;" class="form-control" name="search"  placeholder="Nombre, Formato, Genero, Tipo">
                        <div class="input-group-btn">
                            <button class="btn btn-default orangeText" style="margin-bottom: 10px;" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </li>
                <li>
                    <a href="{{ url('/cpanel') }}" class="alert_message dark_orange_back" style="color: white;">Panel de Control</a>
                </li>
                <li>
                    <a href="{{ url('/logout') }}" class="alert_message dark_orange_back" style="color: white;">Cerrar Sesión</a>
                    <div class="clearfix"></div>
                </li>
            </div>
            {!! Form::open(['method'=>'GET','url' =>'filter', 'role'=>'filter'])  !!}
            <li style="max-height: 30px;">
                <a class="boldFont" style="color: #333;"> Busqueda por Filtro</a>
            </li>
            <li style="max-height: 25px;">
                <a class="boldFont orangeText"> Tipo de Video</a>
            </li>
            @foreach($types as $type)
                <li style="max-height: 25px;">
                    <input type="checkbox" name="{{$type->name}}" value="{{$type->id}}"> {{$type->name}}
                </li>
            @endforeach
            <li style="max-height: 25px;">
                <a class="boldFont orangeText"> Genero</a>
            </li>
            @foreach($genres as $genre)
                <li style="max-height: 25px;">
                    <input type="checkbox" name="{{$genre->name}}" value="{{$genre->id}}"> {{$genre->name}}
                </li>
            @endforeach
            <li style="max-height: 25px;">
                <a class="boldFont orangeText"> Formato</a>
            </li>
            @foreach($formats as $format)
                <li style="max-height: 25px;">
                    <input type="checkbox" name="{{$format->name}}" value="{{$format->id}}"> {{$format->name}}
                </li>
            @endforeach
            </br>
            <button type="submit" class="btn btn-primary orangeButton" style="margin-left: 15px; margin-top: 10px;">
                <i class="fa fa-btn fa-sign-in"></i> Buscar
            </button>
            {!! Form::close() !!}
        </ul>
        
    </div><!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper" class="contentAfterNavbar">
        @yield('content')
{{--         <div class="col-xs-12" style="padding-right: 0px; padding-left: 0px; padding-bottom: 0px;">
 --}}        
        <div class="col-xs-12" style="padding-right: 0px; padding-left: 0px; padding-bottom: 0px;">
            <footer>
                <div class="footer-bottom">
                    <div class="container" style="max-width: 100%;">
                        <div class="col-md-4">
                            {{-- <p> Copyright © Footer E-commerce Plugin 2014. All right reserved. </p> --}}
                            <p> Pagina web desarrollada por la Escuela de Ingeniería Civil en Informática de la Universidad de Valparaíso</p>
                        </div>
                        <div class="col-md-4">
                           {{--  <a href="#"> al medio </a> --}}
                        </div>
                        <div class="col-md-4">
                            {{-- <p>al final </p> --}}
                        </div>
                        {{-- <p class="pull-left"> Copyright © Footer E-commerce Plugin 2014. All right reserved. </p> --}}
                        {{-- <p class="pull-right"> Informacion mia </p> --}}
                            {{-- 
                            <div class="pull-right">
                                <ul class="nav nav-pills payments">
                                    <li><i class="fa fa-cc-visa"></i></li>
                                    <li><i class="fa fa-cc-mastercard"></i></li>
                                    <li><i class="fa fa-cc-amex"></i></li>
                                    <li><i class="fa fa-cc-paypal"></i></li>
                                </ul> 
                            </div> --}}
                    </div>
                </div>
                <!--/.footer-bottom--> 
            </footer>
        </div>
        
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