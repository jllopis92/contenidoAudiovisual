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

    {!!Html::style('css/sb-admin-2.css')!!}
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}

    @yield('page-style-files')
    
    <style>
        body {
            font-family: 'Lato';
        }

        #nav{list-style:none;margin: 0px;
        padding: 0px;}
        #nav li {
            float: left;
            margin-right: 20px;
            font-size: 14px;
            font-weight:bold;
        }
        #nav li a{color:#333333;text-decoration:none}
        #nav li a:hover{color:#006699;text-decoration:none}
        #notification_li{position:relative}

        #notificationContainer {
            background-color: #fff;
            border: 1px solid rgba(100, 100, 100, .4);
            -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, .25);
            overflow: visible;
            position: absolute;
            top: 30px;
            margin-left: -170px;
            width: 400px;
            z-index: -1;
            display: none;
        }
        #notificationContainer:before {
            content: '';
            display: block;
            position: absolute;
            width: 0;
            height: 0;
            color: transparent;
            border: 10px solid black;
            border-color: transparent transparent white;
            margin-top: -20px;
            margin-left: 188px;
        }
        #notificationTitle {
            z-index: 1000;
            font-weight: bold;
            padding: 8px;
            font-size: 13px;
            background-color: #ffffff;
            width: 384px;
            border-bottom: 1px solid #dddddd;
        }
        #notificationsBody {
            padding: 33px 0px 0px 0px !important;
            min-height:300px;
        }
        #notificationFooter {
            background-color: #e9eaed;
            text-align: center;
            font-weight: bold;
            padding: 8px;
            font-size: 12px;
            border-top: 1px solid #dddddd;
        }
        #notification_count {
            padding: 3px 7px 3px 7px;
            background: #cc0000;
            color: #ffffff;
            font-weight: bold;
            margin-left: 77px;
            border-radius: 9px;
            position: absolute;
            margin-top: -11px;
            font-size: 11px;
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
                <a class="navbar-brand">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
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

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        {!! Form::open(['method'=>'GET','url' =>'search', 'role'=>'search'])  !!}
                        <input  type="text" name="search" value="Buscar" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Buscar...';}" style="margin: 10px;"/>
                        {{-- <input type="submit" value="" > --}}
                        {!! Form::close() !!}
                    </li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                    @else

                    <li id="notification_li">
                        <span id="notification_count" style="margin-top: 0px; ">3</span>
                        <a href="#" id="notificationLink">Notificaciones</a>


                        <div id="notificationContainer" style="margin-top: 15px;">
                            <div id="notificationTitle">Notificaciones</div>
                            <div id="notificationsBody" class="notifications">
                            <ul>
                                <li>
                                  <a href="#">
                                    <div class="imageblock"><img src="https://si0.twimg.com/sticky/default_profile_images/default_profile_2_bigger.png" class="notifimage"  />
                                    </div> 
                                    <div class="messageblock">
                                      <div class="message"><strong>Danny DK12</strong> got a sweet fade!</div>

                                      <div class="messageinfo"><i class="icon-flag"></i>Yesterday</div>
                                    </div>
                                  </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="imageblock"><img src="https://si0.twimg.com/profile_images/1091562021/me-small_bigger.png" class="notifimage"  /></div> 
                                        <div class="messageblock">
                                        <div class="message"><strong>Roidberg</strong> left you a comment: "<em>Hey buddy! Nice toenails!"</em></div>
                                        <div class="messageinfo"><i class="icon-comment"></i>2 hours ago</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            </div>
                            <div id="notificationFooter"><a href="#">See All</a></div>
                        </div>


                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->email }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/cpanel') }}"><i class="fa fa-btn fa-sign-out"></i>Panel de Control</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    
    <div id="wrapper">
        <div class="navbar-default sidebar" style="padding-top: 50px;" id="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a> Busqueda por Filtro</a>
                    </li>
                    
                    {{-- <li>
                    {!! Form::open(['method'=>'GET','url' =>'search', 'role'=>'search']) !!}
                        {!! Form::radio('name', 'value') !!}
                         {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
                    {!!Form::close()!!}
                </li> --}}
            </ul>
            {!! Form::open(['method'=>'GET','url' =>'filter', 'role'=>'filter'])  !!}
            <ul class="nav" id="side-menu">
                <a>Tipo de Video</a>
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox" style="margin-left: -70px;">
                        <label>
                            <input type="checkbox" name="largometraje" value="largometraje"> Largometraje
                        </label>
                    </div>
                    <div class="checkbox" style="margin-left: -70px;">
                        <label>
                            <input type="checkbox" name="mediometraje" value="mediometraje"> Mediometraje
                        </label>
                    </div>
                    <div class="checkbox" style="margin-left: -70px;">
                        <label>
                            <input type="checkbox" name="cortometraje" value="cortometraje"> Cortometraje
                        </label>
                    </div>
                    <div class="checkbox" style="margin-left: -70px;">
                        <label>
                            <input type="checkbox" name="experimental" value="experimental"> Experimental
                        </label>
                    </div>
                    <div class="checkbox" style="margin-left: -70px;">
                        <label>
                            <input type="checkbox" name="ficcion" value="ficcion"> Ficción
                        </label>
                    </div>
                    <div class="checkbox" style="margin-left: -70px;">
                        <label>
                            <input type="checkbox" name="animacion" value="animacion"> Animación
                        </label>
                    </div>
                    <div class="checkbox" style="margin-left: -70px;">
                        <label>
                            <input type="checkbox" name="documental" value="documental"> Documental
                        </label>
                        
                    </div>
                </div>
            </ul>
            <ul>
                <a>Formato</a>
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox" style="margin-left: -70px;">
                        <label>
                            <input type="checkbox" name="4K" value="4K"> 4K
                        </label>
                    </div>
                    <div class="checkbox" style="margin-left: -70px;">
                        <label>
                            <input type="checkbox" name="2K" value="2K"> 2K
                        </label>
                    </div>
                    <div class="checkbox" style="margin-left: -70px;">
                        <label>
                            <input type="checkbox" name="HD" value="HD"> HD
                        </label>
                    </div>   
                        <div class="checkbox" style="margin-left: -70px;">
                            <label>
                                <input type="checkbox" name="MiniDV" value="MiniDV"> MiniDV
                            </label>
                        </div>
                        <div class="checkbox" style="margin-left: -70px;">
                            <label>
                                <input type="checkbox" name="16mm" value="16mm"> 16mm
                            </label>
                        </div>
                        <div class="checkbox" style="margin-left: -70px;">
                            <label>
                                <input type="checkbox" name="35mm" value="35mm"> 35mm
                            </label>
                        </div>
                    </div>
                </div>
            </ul>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-sign-in"></i> Buscar
            </button>
            {!! Form::close() !!}
{{-- 
                {!! Form::open(['method'=>'GET','url' =>'search', 'role'=>'search']) !!}
                <div class="form-group">
                    {!! Form::radio('name', 'value') !!}
                </div>
                        
                         {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
                         {!!Form::close()!!} --}}
                     </div>
                 </div>

                 <div id="page-wrapper" style="padding-top: 50px;">
                    <script type="text/javascript">
                        var isHidden = false;
                        function hiddenNavBar(){
                            if(isHidden == false){
                                document.getElementById("navbar-default sidebar").style.display="none";
                                document.getElementById("page-wrapper").style.marginLeft = 0 + "px";
                                isHidden = true;
                            }else{
                                document.getElementById("navbar-default sidebar").style.display="inline";
                                document.getElementById("page-wrapper").style.marginLeft = 250 + "px";
                                isHidden = false;
                            }
                        }
                    </script>
                <a onClick="hiddenNavBar()" style="margin-left: -30px;"> <-
                </a>
                    @yield('content')
                </div>

            </div>

            <!-- JavaScripts -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

            {!!Html::script('js/metisMenu.min.js')!!}
            {!!Html::script('js/sb-admin-2.js')!!}

            @yield('page-js-files')
            @yield('page-js-script')

            <script type="text/javascript" >
                $(document).ready(function(){
                    $("#notificationLink").click(function(){
                        $("#notificationContainer").fadeToggle(300);
                        $("#notification_count").fadeOut("slow");
                        return false;
                    });

                    //Document Click
                    $(document).click(function(){
                        $("#notificationContainer").hide();
                    });
                    //Popup Click
                    $("#notificationContainer").click(function(){
                        return false
                    });

                });
            </script>

            {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
        </body>
        </html>
