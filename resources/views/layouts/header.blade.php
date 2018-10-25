<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    @yield('meta')
    <title>@yield('title')</title>
    <link rel="icon" href="favicon.png" type="image/png">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css"> 
    <link href="{{ asset('css/header.css') }}" rel="stylesheet" type="text/css"> 
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"> 
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    @yield('link')
  </head>

  <body>
    <!--Header_section-->
    <header id="header_wrapper">
      <div class="container header">
        <div class="header_box">
          <div class="logo"><a href="#"><img src="{{ '/image/polo-logo.png' }}" alt="logo"></a></div>
        <nav class="navbar navbar-inverse" role="navigation">
          <div class="navbar-header">
            <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            </div>
          <div id="main-nav" class="collapse navbar-collapse navStyle">
          <ul class="nav navbar-nav" id="mainNav">
            <li class="active"><a href="#hero_section" class="scroll-link">首页</a></li>
            <li><a href="#about" class="scroll-link">关于我们</a></li>
            <li><a href="#service" class="scroll-link">服务</a></li>
            <li><a href="#portfolio" class="scroll-link">项目</a></li>
            <li><a href="#company" class="scroll-link">公司</a></li>
            <li><a href="#team" class="scroll-link">团队</a></li>
            <li><a href="#contact" class="scroll-link">联系我们</a></li>
            @if (Auth::check())
            <li><a href="{{ url('/atelier/index') }}" class="scroll-link">工作室</a></li>
            @else
            <li><a href="{{ url('/login') }}" class="scroll-link">登录工作室</a></li>
            @endif
          </ul>
          </div>
       </nav>
        </div>
      </div>
    </header>
    <!--Header_section-->
    @yield('content')

    <script type="text/javascript" src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-scrolltofixed.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.nav.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.isotope.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/wow.js') }}"></script> 
    <script src="{{ asset('contact/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('contact/contact_me.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    @yield('after_link')
  </body>
</html>