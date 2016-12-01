<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cine Uv</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sidebar.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-default no-margin">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="row col-xs-12 col-md-6">
            <div class="row col-xs-12">
                <div class="col-xs-8">
                <div class="navbar-header fixed-brand">
                    <ul class="nav navbar-nav" style="padding-left: 20px;">
                        <li class="active" style="left: 20px;">
                            <button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle"> 
                                <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
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
                <div class="col-xs-4" style="padding-right: 0px; padding-left: 0px; display: inline;">
                        {!! Form::open(['method'=>'GET','url' =>'search', 'role'=>'search', 'class'=>'navbar-form'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Buscar" name="search">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
            </div>
        {{-- <div class="row col-xs-12 col-md-7">
            <ul class="nav navbar-nav navbar-left col-sm-12" style="display: inline;white-space:nowrap;">

            </ul>
        </div> --}}
    </div><!-- bs-example-navbar-collapse-1 -->

</div>
<div class="row col-sm-12 col-md-6">
    <!-- Right Side Of Navbar -->

    <ul class="nav navbar-nav navbar-right col-sm-12" >

        <li class="col-xs-3" style="display: inline;"> 
            <a href="{{ url('/cine_tv') }}">Cine TV</a>
        </li>
        @if (!Auth::guest())
        @if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "alumno"))
        <li class="col-xs-3" style="display: inline; padding-left: 0px; padding-right: 0px;">
            <a href="{{ url('/upload') }}">Subir Video</a>
        </li>
        @endif
        @endif
        <li class="col-xs-1" style="padding-left: 0px;">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-bell"></i></button>
            </div>
        </li>

        <!-- Authentication Links -->
        @if (Auth::guest())
        <li class="col-xs-2"><a href="{{ url('/login') }}">Login</a></li>
        <li class="col-xs-3"><a href="{{ url('/register') }}">Register</a></li>
        @else
        <li class="dropdown col-xs-5">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="padding-left: 0px; padding-right: 0px;">
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
</nav>
<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav nav-pills nav-stacked" id="menu">

            <li class="active">
                <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> Dashboard</a>
                <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                    <li><a href="#">link1</a></li>
                    <li><a href="#">link2</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span> Shortcut</a>
                <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                    <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>link1</a></li>
                    <li><a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-flag fa-stack-1x "></i></span>link2</a></li>

                </ul>
            </li>
            <li>
                <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-cloud-download fa-stack-1x "></i></span>Overview</a>
            </li>
            <li>
                <a href="#"> <span class="fa-stack fa-lg pull-left"><i class="fa fa-cart-plus fa-stack-1x "></i></span>Events</a>
            </li>
            <li>
                <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-youtube-play fa-stack-1x "></i></span>About</a>
            </li>
            <li>
                <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-wrench fa-stack-1x "></i></span>Services</a>
            </li>
            <li>
                <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-server fa-stack-1x "></i></span>Contact</a>
            </li>
        </ul>
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
</body>
</html>