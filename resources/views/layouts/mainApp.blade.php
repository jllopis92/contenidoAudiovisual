<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CINECL UV</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sidebar.css" rel="stylesheet">
    @yield('page-style-files')
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0px;">
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
        {{-- <div class="row col-xs-12 col-md-7">
            <ul class="nav navbar-nav navbar-left col-sm-12" style="display: inline;white-space:nowrap;">

            </ul>
        </div> --}}
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
           {{--  <span class="glyphicons glyphicons-tv"></span>
                <a href="{{ url('/cine_tv') }}">Cine TV</a> --}}
            </li>

            {{-- @if (!Auth::guest())
            @if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "alumno"))
            <li class="col-xs-3" style="display: inline; padding-left: 0px; padding-right: 0px;">
                <a href="{{ url('/upload') }}">Subir Video</a>
            </li>
            @endif
            @endif --}}
            
            <!-- Authentication Links -->
            @if (Auth::guest())
            <li class="col-xs-12 col-sm-2" style="margin-top: 10px;"><a href="{{ url('/login') }}">Login</a></li>
            <li class="col-xs-12 col-sm-3" style="margin-top: 10px;"><a href="{{ url('/register') }}">Register</a></li>
            @else
            {{--  Notifications --}}
            <li class="dropdown col-xs-12 col-sm-2" style="padding-top: 8px;">
                <a href="#" class="visible-xs dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <span class="glyphicon glyphicon-bell btn-nav"></span>
                    Notificaciones
                </a>
                <a href="#" class="hidden-xs dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <span class="glyphicon glyphicon-bell btn-nav"></span>
                </a>

                {{-- Si tiene notificaciones --}}
                {{-- @if (Auth::user()->tipo == "profesor")
                <a href="#" class="visible-xs dropdown-toggle" style="color: #C1202C" data-toggle="dropdown" role="button" aria-expanded="false">
                    <span class="glyphicon glyphicon-bell btn-nav"></span>
                    Notificaciones
                </a>
                
                <a href="#" class="hidden-xs dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <span class="glyphicon glyphicon-bell btn-nav" style="color: #C1202C"></span>
                </a>
                @endif --}}

                <ul class="dropdown-menu" role="menu">
                    <li>
                        {{ link_to_route('cpanel.edit', $title = 'Panel de Control', $parameters = (Auth::user()->id)) }}
                    </li>
                    <li><a href="{{ url('/logout') }}">Cerrar Sesión</a></li>
                    <li class="hidden-xs">
                        <a>{{ Auth::user()->email }}</a>
                    </li>
                </ul>
                {{-- <p>
                    <button type="button" class="btn btn-default btn-nav">
                      <span class="glyphicon glyphicon-bell"></span>
                    </button>
                </p> --}}
            </li>
           {{--  Control Panel --}}
            <li class="dropdown col-xs-12 col-sm-3" style="padding-top: 8px;">
            <span class="glyphicons glyphicons-user"></span>

            <a href="#" class="dropdown-toggle visible-xs" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user btn-nav"></span> {{ Auth::user()->email }} <span class="caret"></span>
            </a>
            <a href="#" class="dropdown-toggle hidden-xs" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user btn-nav"></span><span class="caret"></span>
            </a>
                {{-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="padding-left: 0px; padding-right: 0px;">
                    {{ Auth::user()->email }} <span class="caret"></span>
                </a> --}}

                <ul class="dropdown-menu" role="menu">
                    <li>
                        {{ link_to_route('cpanel.edit', $title = 'Panel de Control', $parameters = (Auth::user()->id)) }}
                    </li>
                    <li><a href="{{ url('/logout') }}">Logout</a></li>
                    <li>
                        <a>{{ Auth::user()->email }}</a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
</nav>
<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
    {!! Form::open(['method'=>'GET','url' =>'filter', 'role'=>'filter'])  !!}
        <ul class="sidebar-nav nav-pills nav-stacked" id="menu" style="align-items: center;">
            <li style="max-height: 30px; color: #333 !important;">
                <h4> Busqueda por Filtro</h4>
            </li>
            <li style="max-height: 25px;">
                <a style="margin-left: 20px; color: #333 !important;"> Tipo de Video</a>
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
                <a style="margin-left: 20px; color: #333 !important;"> Formato</a>
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
            <button type="submit" class="btn btn-primary" style="margin-left: 20px; margin-top: 10px;">
                <i class="fa fa-btn fa-sign-in"></i> Buscar
            </button>
            
        </ul>
        {!! Form::close() !!}
    </div><!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        @yield('content')

            {{-- <div class="container-fluid xyz">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Simple Sidebar With Bootstrap 3 by <a href="http://seegatesite.com/create-simple-cool-sidebar-menu-with-bootstrap-3/" >Seegatesite.com</a></h1>
                        <p>This sidebar is adopted from start bootstrap simple sidebar startboostrap.com, which I modified slightly to be more cool. For tutorials and how to create it , you can read from my site here <a href="http://seegatesite.com/create-simple-cool-sidebar-menu-with-bootstrap-3/">create cool simple sidebar menu with boostrap 3</a></p>
                    </div>
                </div>
            </div> --}}
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