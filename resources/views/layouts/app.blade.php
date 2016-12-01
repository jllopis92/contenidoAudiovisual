<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Dashboard Template (Sidebar icons animated) - Bootsnipp.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
        @media(min-width:768px) {
            body {
                margin-top: 50px;
            }
            /*html, body, #wrapper, #page-wrapper {height: 100%; overflow: hidden;}*/
        }

        #wrapper {
            padding-left: 0;    
        }

        #page-wrapper {
            width: 100%;        
            padding: 0;
            background-color: #fff;
        }

        @media(min-width:768px) {
            #wrapper {
                padding-left: 225px;
            }

            #page-wrapper {
                padding: 22px 10px;
            }
        }

        /* Top Navigation */

        .top-nav {
            padding: 0 15px;
        }

        .top-nav>li {
            display: inline-block;
            float: left;
        }

        .top-nav>li>a {
            padding-top: 20px;
            padding-bottom: 20px;
            line-height: 20px;
            color: #777777 !important;
        }

        .top-nav>.open>.dropdown-menu {
            float: left;
            position: absolute;
            margin-top: 0;
            /*border: 1px solid rgba(0,0,0,.15);*/
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            background-color: #fff;
            -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
            box-shadow: 0 6px 12px rgba(0,0,0,.175);
        }

        .top-nav>.open>.dropdown-menu>li>a {
            white-space: normal;
        }

        /* Side Navigation */

        @media(min-width:768px) {
            .side-nav {
                position: fixed;
                top: 60px;
                left: 225px;
                width: 225px;
                margin-left: -225px;
                border: none;
                border-radius: 0;
                border-top: 1px rgba(0,0,0,.5) solid;
                overflow-y: auto;
                background-color: #E7E7E7 !important;
                border-top-color: #333333 !important;
                /*background-color: #5A6B7D;*/
                bottom: 0;
                overflow-x: hidden;
                padding-bottom: 40px;
            }

            .navbar {
                background-color: #E7E7E7 !important;
            }

            .navbar-toggle {
                 border-color: #333333 !important;
                 display: block;
            }

            .side-nav>li>a {
                width: 225px;
                border-bottom: #E7E7E7 !important;
                color: #777777 !important;
            }

            .side-nav li a:hover,
            .side-nav li a:focus {
                outline: none;
                background-color: #E7E7E7 !important;
                color: #777777 !important;
            }
        }

        .side-nav>li>ul {
            padding: 0;
            border-bottom: 1px rgba(0,0,0,.3) solid;
        }

        .side-nav>li>ul>li>a {
            display: block;
            padding: 10px 15px 10px 38px;
            text-decoration: none;
            /*color: #999;*/
            color: #fff;    
        }

        .side-nav>li>ul>li>a:hover {
            color: #fff;
        }

        .navbar .nav > li > a > .label {
          -webkit-border-radius: 50%;
          -moz-border-radius: 50%;
          border-radius: 50%;
          position: absolute;
          top: 14px;
          right: 6px;
          font-size: 10px;
          font-weight: normal;
          min-width: 15px;
          min-height: 15px;
          line-height: 1.0em;
          text-align: center;
          padding: 2px;
      }

      .navbar .nav > li > a:hover > .label {
          top: 10px;
      }

      .navbar-brand {
        padding: 5px 15px;
    }
</style>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-fixed-top" style="background-color: #e7e7e7; border-color: #333333;" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" style="border-color: #ddd;">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/images/home.png" alt="Escuela de Cine" style="max-width:220px; max-height:55px;">
                </a>
            </div>
            <!-- Top Menu Items -->

             {{-- <ul class="nav navbar-nav" style="min-height: 100%">
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/cine_tv') }}">Cine TV</a></li>
                </ul>
                @if (!Auth::guest())
                    @if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "alumno"))
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/upload') }}">Subir Video</a></li>
                    </ul>
                    @endif
                @endif
 --}}

            <ul class="nav navbar-right top-nav">
                <li>
                    {!! Form::open(['method'=>'GET','url' =>'search', 'role'=>'search', 'class'=>'navbar-form'])  !!}
                   {{--  <div class="input-group" style="max-width: 180px; margin-top: 5px;"> --}}
                        <div class="input-group" style="margin-top: 5px;">
                            <input type="text" class="form-control" placeholder="Buscar" name="search">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </li>
                <li><a href="{{ url('/cine_tv') }}">Cine TV</a></li>
                @if (!Auth::guest())
                    @if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "alumno") || (Auth::user()->tipo == "administrador"))
                        <li><a href="{{ url('/upload') }}">Subir Video</a></li>
                    @endif
                @endif
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li><span class="glyphicons glyphicons-bell"></span></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Panel de Control <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                {{ link_to_route('cpanel.edit', $title = 'Panel de Control', $parameters = (Auth::user()->id)) }}
                            </li>
                            <li><a href="{{ url('/logout') }}">Desconectarse</a></li>
                        </ul>
                    </li>
                    {{-- <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                        </a>
                    </li>            
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin User <b class="fa fa-angle-down"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                            <li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li> --}}
                @endif
            </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse" style="border-bottom-color: #777777;">
            <ul class="nav navbar-nav side-nav">
               {{--  <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-search"></i> MENU 1 <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 1.1</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 1.2</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 1.3</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a>Tipo de Video</a>
                    <a type="checkbox" name="largometraje" value="largometraje"> Largometraje
                    </a>
                </li>
                <li>
                    <a href="sugerencias"><i class="fa fa-fw fa-paper-plane-o"></i> MENU 4</a>
                </li>
                <li style="border-bottom-color: #777777;">
                    <a href="faq"><i class="fa fa-fw fa fa-question-circle"></i> MENU 5</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Welcome Admin!</h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<script type="text/javascript">
    var j = jQuery.noConflict();
    j(function(){
        j('[data-toggle="tooltip"]').tooltip();
        j(".side-nav .collapse").on("hide.bs.collapse", function() {                   
            j(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
        });
        j('.side-nav .collapse').on("show.bs.collapse", function() {                        
            j(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
        });
    })    
    
</script>
</body>
</html>
