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

    @yield('page-style-files')
    
    <style>
        body {
            font-family: 'Roboto', sans-serif !important;
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
                @if (!Auth::guest())
                @if ((Auth::user()->tipo == "profesor") || (Auth::user()->tipo == "alumno"))
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/upload') }}">Subir Video</a></li>
                </ul>
                @endif
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <div class="col-sm-3 col-md-3" style="width: 300px;">
                        {!! Form::open(['method'=>'GET','url' =>'search', 'role'=>'search', 'class'=>'navbar-form'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Buscar" name="search">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    
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

<div id="wrapper">
<div id="page-wrapper" style="padding-top: 50px; border-left-width: 0px;">
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
        </body>
        </html>
