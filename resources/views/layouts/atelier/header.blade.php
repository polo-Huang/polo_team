<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  @yield('meta')
  <title>@yield('title')</title>
  <!-- Styles -->
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/common.css') }}" rel="stylesheet">
  <link href="{{ asset('css/atelier/common.css') }}" rel="stylesheet">
  @yield('link')
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
            <li><a href="{{ url('/user/details') }}">{{ Auth::user()->name }}</a></li>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span><i class="fa fa-globe"></i></span> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item withripple" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>注销
                  </a>
                </li>
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
          <li><a href="{{ url('/atelier/index') }}" @if (empty(explode('/', Request::path())[1]) ? 0 : explode('/', Request::path())[1] == 'index') class="active" @endif><span class="icon"><i class="fa fa-group"></i></span> 工作室</a></li>
          <li><a href="{{ url('/atelier/project/list') }}" @if (empty(explode('/', Request::path())[1]) ? 0 : explode('/', Request::path())[1] == 'project') class="active" @endif><span class="icon"><i class="fa fa-code"></i></span> 项目</a></li>
          @if (Auth::user()->is_admin)
          <li><a href="{{ url('/admin/home/list') }}" @if (empty(explode('/', Request::path())[1]) ? 0 : explode('/', Request::path())[1] == 'home') class="active" @endif><span class="icon"><i class="fa fa-home"></i></span> 个人主页</a></li>
          <li><a href="{{ url('/admin/image/list') }}" @if (empty(explode('/', Request::path())[1]) ? 0 : explode('/', Request::path())[1] == 'image') class="active" @endif><span class="icon"><i class="fa fa-image"></i></span> 图片</a></li>
          <li><a href="javascript:void(0)" @if (empty(explode('/', Request::path())[1]) ? 0 : explode('/', Request::path())[1] == 'user') class="active" @endif><span class="icon"><i class="fa fa-photo"></i></span> 用户</a></li>
          @endif
          <li><a href="{{ url('/atelier/game/test/1') }}"><span class="icon"><i class="fa fa-gamepad"></i></span> 测试游戏</a></li>
        </ul>
      </div>
    </div>
    <div class="main">
      @yield('content')
      @include('flash::message')
    </div>
  </div>

</body>

<!-- Scripts -->
<script src="{{ asset('jquery/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
@yield('after_link')
</html>