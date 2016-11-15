<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CINECLUV</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
    
    {!!Html::style('css/sb-admin-2.css')!!}
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    <style>
        body {
            font-family: 'Roboto', sans-serif !important;
        }
        .fa-btn {
            margin-right: 6px;
        }
        .form-control {
          width: 50%;
      }
  </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0; position: fixed; z-index: 100; width:100%">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <img src="/images/home.png" alt="Escuela de Cine" style="width:120px;height:50px;">
                {{-- <a class="navbar-brand">
                    Laravel
                </a> --}}
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/cine_tv') }}">Cine TV</a></li>
                </ul>
                {{-- @if (Auth::user()->tipo != "profesor")
                    <script type="text/javascript">
                        window.location = "/";//here double curly bracket
                    </script>
                    @endif --}}
                    @if (!Auth::guest())
                    @if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "alumno"))
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/upload') }}">Subir Video</a></li>
                    </ul>
                    @endif

                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->email }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    {{ link_to_route('cpanel.edit', $title = 'Panel de Control', $parameters = (Auth::user()->id)) }}
                                </li>
                                <li><a href="{{ url('/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @if (!Auth::guest())
        <div id="wrapper">
            @if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "administrador"))
            <div class="navbar-default sidebar" style="padding-top: 50px;" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            {{ link_to_route('cpanel.edit', $title = 'Editar Perfil', $parameters = (Auth::user()->id)) }}
                        </li>
                        <li>
                            <a href="{{ url('/cpanel') }}"> Administrar Usuarios</a>
                        </li>

                        <li>
                            <a href="#"> Administrar Videos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
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
                            <a href="{!! url('createplaylist')!!}"> Videos en Evaluación</a>
                        </li>
                    </ul>
                </div>
            </div>
            @elseif (Auth::user()->tipo == "adminParrilla")
            <div class="navbar-default sidebar" style="padding-top: 50px;" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            {{ link_to_route('cpanel.edit', $title = 'Editar Perfil', $parameters = (Auth::user()->id))}}
                        </li>
                    </ul>
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{!! url('createplaylist')!!}"> Crear Listas de reproducción</a>
                        </li>
                    </ul>
                </div>
            </div>
            @elseif (Auth::user()->tipo == "externo")
            <div class="navbar-default sidebar" style="padding-top: 50px;" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            {{ link_to_route('cpanel.edit', $title = 'Editar Perfil', $parameters = (Auth::user()->id))}}
                        </li>
                    </ul>
                </div>
            </div>
            @else
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            {{ link_to_route('cpanel.edit', $title = 'Editar Perfil', $parameters = (Auth::user()->id))}}
                        </li>
                    </ul>
                </div>
            </div>

            @endif
            <div id="page-wrapper" style="padding-top: 50px;">
                @yield('content')
            </div>
        </div>  
        @endif       
        

        <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        {!!Html::script('js/metisMenu.min.js')!!}
        {!!Html::script('js/sb-admin-2.js')!!}

        {!! Html::script('js/script.js') !!}

        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    </body>
    </html>