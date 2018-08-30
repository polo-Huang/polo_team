<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <title>@yield('title')</title>

  <!-- Styles -->
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/common.css') }}" rel="stylesheet">
</head>
<body>
  <header>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand logo" href="javascript:void(0)">
            <img src="{{ '/image/polo-logo.png' }}">
          </a>
          <a href="javascript:void(0)" id="btn-toggle-sidebar" class="btn-toggle-sidebar"><span><i class="fa fa-arrow-left"></i><i class="fa fa-arrow-right"></i></span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control mb-0" placeholder="输入...">
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="javascript:void(0)">登录</a></li>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span><i class="fa fa-globe"></i></span> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="javascript:void(0)">简体中文</a></li>
                <li><a href="javascript:void(0)">繁體中文</a></li>
                <li><a href="javascript:void(0)">English</a></li>
                <li role="separator" class="divider"></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </header>
  <div class="pos-abs w-100">
    <div class="sidebar">
      <div>
        <ul class="sidebar-ul">
          <li><a href="{{ url('/admin/index') }}" @if (empty(explode('/', Request::path())[1]) ? 0 : explode('/', Request::path())[1] == 'index') class="active" @endif><span class="icon"><i class="fa fa-gears"></i></span> 站点设置</a></li>
          <li><a href="{{ url('/admin/home/list') }}" @if (empty(explode('/', Request::path())[1]) ? 0 : explode('/', Request::path())[1] == 'home') class="active" @endif><span class="icon"><i class="fa fa-home"></i></span> 个人主页</a></li>
          <li><a href="{{ url('/admin/image/list') }}" @if (empty(explode('/', Request::path())[1]) ? 0 : explode('/', Request::path())[1] == 'image') class="active" @endif><span class="icon"><i class="fa fa-image"></i></span> 图片</a></li>
          <li><a href="javascript:void(0)" @if (empty(explode('/', Request::path())[1]) ? 0 : explode('/', Request::path())[1] == 'order') class="active" @endif><span class="icon"><i class="fa fa-shopping-cart"></i></span> 订单</a></li>
          <li><a href="javascript:void(0)" @if (empty(explode('/', Request::path())[1]) ? 0 : explode('/', Request::path())[1] == 'user') class="active" @endif><span class="icon"><i class="fa fa-photo"></i></span> 用户</a></li>
        </ul>
      </div>
    </div>
    <div class="main">@yield('content')</div>
  </div>

</body>

<!-- Scripts -->
<script src="{{ asset('jquery/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
</html>