<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
  <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>
  Web Admin
  </title>
  <link rel="apple-touch-icon" href="/app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="/modernadmin/app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="/css/style-p.css">
  <link rel="stylesheet" type="text/css" href="/modernadmin/app-assets/css/vendors.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="/modernadmin/app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="/modernadmin/app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
  <link rel="stylesheet" type="text/css" href="/modernadmin/app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="/modernadmin/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css">
  <link rel="stylesheet" type="text/css" href="/modernadmin/app-assets/vendors/css/charts/morris.css">
  <link rel="stylesheet" type="text/css" href="/modernadmin/app-assets/fonts/simple-line-icons/style.css">
  <link rel="stylesheet" type="text/css" href="/modernadmin/app-assets/css/core/colors/palette-gradient.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="/modernadmin/assets/css/style.css">
  <!-- END Custom CSS-->

  <script type="text/javascript" src="/assets/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/toastr/toastr.css">
  <script type="text/javascript" src="/assets/toastr/toastr.js"></script>

  <!-- CDN Alpine.js -->
  <script src="/js/alpine.min.js" defer></script>


  @stack('archivos')
  
  @livewireStyles
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

  @livewireScripts
  
  
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item mr-auto">
            <a class="navbar-brand" href="{{ route('/admin') }}">
              <img class="brand-logo" alt="modern admin logo" src="/modernadmin/app-assets/images/logo/logo.png">
              <h3 class="brand-text">Web Admin</h3>
            </a>
          </li>
          <!-- <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li> -->
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">Bienvenido,
                  <span class="user-name text-bold-700">{{ auth()->user()->name }}</span>
                </span>
                <span class="avatar avatar-online">
                  <img src="/modernadmin/app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#"><i class="ft-user"></i> Perfil</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style="background: #ffe4e4; color:red;" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <i class="ft-power"></i> Cerrar sesión
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

        <li class=" nav-item">
          <a href="{{ route('/admin') }}"><i class="la la-home"></i>
            <span class="menu-title" data-i18n="nav.support_documentation.main">Inicio</span>
          </a>
        </li>
        <li class=" nav-item">
          <a href="{{ route('blog') }}"><i class="la la-newspaper-o"></i>
            <span class="menu-title" data-i18n="nav.support_documentation.main">Blog</span>
          </a>
        </li>
        <li class=" nav-item">
          <a href="{{ route('galeria') }}"><i class="la la-image"></i>
            <span class="menu-title" data-i18n="nav.support_documentation.main">Galeria</span>
          </a>
        </li>
        <li class=" nav-item">
          <a href="{{ route('promociones') }}"><i class="la la-gittip"></i>
            <span class="menu-title" data-i18n="nav.support_documentation.main">Promociones</span>
          </a>
        </li>

      </ul>
    </div>
  </div>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">

        @yield('contenido')

      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2020 <a class="text-bold-800 grey darken-2" href="#"
        target="_blank">ARMANDOTUWEB.COM </a> </span>
      <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Emprendimiento digítal hecho con <i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="/modernadmin/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="/modernadmin/app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
  <script src="/modernadmin/app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
  <script src="/modernadmin/app-assets/vendors/js/charts/morris.min.js" type="text/javascript"></script>
  <script src="/modernadmin/app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js"
  type="text/javascript"></script>
  <script src="/modernadmin/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js"
  type="text/javascript"></script>
  <script src="/modernadmin/app-assets/data/jvector/visitor-data.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="/modernadmin/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="/modernadmin/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="/modernadmin/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="/modernadmin/app-assets/js/scripts/pages/dashboard-sales.js" type="text/javascript"></script>
  <script src="/js/jquery.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>