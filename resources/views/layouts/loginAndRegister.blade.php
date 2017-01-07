<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CINECL UV</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat" /> 
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    @yield('page-style-files')
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top boldFont" style="margin-bottom: 0px; position: fixed; z-index: 100; width:100%; background-color: #F0643C;">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="row col-xs-12 col-sm-4">
            <div class="row col-xs-12">
                <div class="navbar-header fixed-brand">
                    <ul class="nav navbar-nav" style="margin-top: 0px;">
                        <li class="col-xs-9" style="height: 64px; width: 200px; background-color: #ffffff; border-color: #e7e7e7; padding-left: 10px;">
                           <a class="navbar-brand" href="{{ url('/') }}" style="padding-top: 5px; padding-left: 0px;">
                            <img src="/images/home.png" alt="Escuela de Cine" style="max-width:180px; max-height:55px;">
                            </a>
                        </li>
                    </ul>
                </div>       
            </div>
        </div>
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
                <li class="col-xs-12 col-sm-4 col-md-5 hidden-xs" style="padding-right: 0px; padding-left: 0px;">
                    {!! Form::open(['method'=>'GET','url' =>'search', 'role'=>'search', 'class'=>'navbar-form navbar-search', 'style'=>'padding: 9px 15px 5px; color: #F0643C;'])  !!}
                    <div class="input-group">
                        <input type="text" style="border-right-width: 0px;" class="form-control" name="search">
                        <div class="input-group-btn">
                            <button class="btn btn-default orangeText" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </li>
                <li class="col-xs-12 col-sm-2" style="padding-top: 8px;">
                    <a class="visible-xs" href="{{ url('/cine_tv') }}" role="button">
                        <span class="glyphicon glyphicon-calendar btn-nav"></span>
                        Programación
                    </a>
                    <a class="hidden-xs" href="{{ url('/cine_tv') }}" role="button" style="padding-top:10px;">
                        <img class="btn-nav orange_back" src="/img/tv_icon.png" alt="Cine TV" style="width:30px; height:30px;">
                    </a>
                </li>
                
                <!-- Authentication Links -->
                <li class="col-xs-12 col-sm-2" style="margin-top: 10px;"><a href="{{ url('/login') }}">Ingreso</a></li>
                <li class="col-xs-12 col-sm-3" style="margin-top: 10px;"><a href="{{ url('/register') }}">Registro</a></li>
                
            </ul>
        </div>
</nav>
<div id="wrapper">
    <!-- Sidebar -->
    
    <!-- Page Content -->
    <div id="page-content-wrapper" style="margin-top: 65px;">
        @yield('content')
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    @yield('page-js-files')
    @yield('page-js-script')

    
</body>
</html>