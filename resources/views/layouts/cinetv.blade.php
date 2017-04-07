<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="home_icon" href="/images/home.png">
    <link href='/images/cineicon.png' rel='shortcut icon' type='image/png'>

    <title>CINECL UV</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/sidebar.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
    @yield('page-style-files')
</head>
<body>

        @yield('content')
    

    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/sidebar_menu.js"></script>
    @yield('page-js-files')
    @yield('page-js-script')

    
</body>
</html>