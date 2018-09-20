@extends('layouts.header')

@section('title')
  首页
@endsection

@section('content')

<div class="home">

  <!--Hero_Section-->
  <section id="hero_section" class="top_cont_outer">
    <div class="hero_wrapper">
      <div class="container">
        <div class="hero_section">
          <div class="row">
            <div class="col-lg-7 col-sm-7">
              <div class="top_left_cont zoomIn wow animated"> 
                <h2>I am <strong>{{ $user->name }}</strong> <br>{{ $user->homepage_title }}</h2>
                <p>{{ $user->introduce }}</p>
                <a href="#service" class="read_more2">查看更多</a> </div>
            </div>
            <div class="col-lg-5 col-sm-5">
              <div class="zoomIn wow animated">
                <image class="img-contain height-400" src="{{ $user->cover_photo != null ? $user->cover_photo : '/image/programmer-cover.png' }}" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--Hero_Section--> 

  <section id="about"><!--Aboutus-->
  <div class="inner_wrapper">
    <div class="container">
      <h2>关于</h2>
      <div class="inner_section">
    <div class="row">
        <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"><image src="image/about-img.jpg" class="image-circle delay-03s animated wow zoomIn" alt=""></div>
          <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
            <div class=" delay-01s animated fadeInDown wow animated">
              <h3>{{ $user->name }}</h3><br/> 
              <p>{{ $user->about }}</p>
            </div>
            <div class="work_bottom"> <span>想了解更多..</span> <a href="#contact" class="contact_btn">联系我们</a> </div>
          </div>
        </div>
      </div>
    </div> 
    </div>
  </section>
  <!--Aboutus--> 


  <!--Service-->
  <section  id="service">
    <div class="container">
      <h2>技能</h2>
      <div class="service_wrapper">
        <div class="row">
          <div class="col-lg-4">
            <div class="service_block">
              <div class="service_icon delay-03s animated wow  zoomIn"> <span><i class="fa fa-android"></i></span> </div>
              <h3 class="animated fadeInUp wow">Android</h3>
              <p class="animated fadeInDown wow">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
            </div>
          </div>
          <div class="col-lg-4 borderLeft">     
            <div class="service_block">
              <div class="service_icon icon2  delay-03s animated wow zoomIn"> <span><i class="fa fa-apple"></i></span> </div>
              <h3 class="animated fadeInUp wow">Apple IOS</h3>
              <p class="animated fadeInDown wow">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
            </div>
          </div>
          <div class="col-lg-4 borderLeft">
            <div class="service_block">
              <div class="service_icon icon3  delay-03s animated wow zoomIn"> <span><i class="fa fa-html5"></i></span> </div>
              <h3 class="animated fadeInUp wow">Design</h3>
              <p class="animated fadeInDown wow">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
            </div>
          </div>
        </div>
       <div class="row borderTop">
          <div class="col-lg-4 mrgTop">
            <div class="service_block">
              <div class="service_icon delay-03s animated wow  zoomIn"> <span><i class="fa fa-dropbox"></i></span> </div>
              <h3 class="animated fadeInUp wow">Concept</h3>
              <p class="animated fadeInDown wow">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
            </div>
          </div>
          <div class="col-lg-4 borderLeft mrgTop">
            <div class="service_block">
              <div class="service_icon icon2  delay-03s animated wow zoomIn"> <span><i class="fa fa-slack"></i></span> </div>
              <h3 class="animated fadeInUp wow">User Research</h3>
              <p class="animated fadeInDown wow">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
            </div>
          </div>
          <div class="col-lg-4 borderLeft mrgTop">
            <div class="service_block">
              <div class="service_icon icon3  delay-03s animated wow zoomIn"> <span><i class="fa fa-users"></i></span> </div>
              <h3 class="animated fadeInUp wow">User Experience</h3>
              <p class="animated fadeInDown wow">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--Service-->




  <!-- Portfolio -->
  <section id="portfolio" class="content"> 
    
    <!-- Container -->
    <div class="container portfolio_title"> 
      
      <!-- Title -->
      <div class="section-title">
        <h2>项目</h2>
      </div>
      <!--/Title --> 
      
    </div>
    <!-- Container -->
    
    <div class="portfolio-top"></div>
    
    <!-- Portfolio Filters -->
    <div class="portfolio"> 
      
      <div id="filters" class="sixteen columns">
        <ul class="clearfix">
          <li><a id="all" href="#" data-filter="*" class="active">
            <h5>All</h5>
            </a></li>
          <li><a class="" href="#" data-filter=".prototype">
            <h5>Prototype</h5>
            </a></li>
          <li><a class="" href="#" data-filter=".design">
            <h5>Design</h5>
            </a></li>
          <li><a class="" href="#" data-filter=".android">
            <h5>Android</h5>
            </a></li>
          <li><a class="" href="#" data-filter=".appleIOS">
            <h5>Apple IOS</h5>
            </a></li>
          <li><a class="" href="#" data-filter=".web">
            <h5>Web App</h5>
            </a></li>
        </ul>
      </div>
      <!--/Portfolio Filters --> 
      
      <!-- Portfolio Wrapper -->
      <div class="isotope fadeInLeft animated wow" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper"> 
        
        <!-- Portfolio Item -->
        <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four   appleIOS isotope-item">
          <div class="portfolio_image"> <image src="image/portfolio_pic1.jpg"  alt="Portfolio 1"> </div>        
          <div class="item_overlay">
            <div class="item_info"> 
              <h4 class="project_name">SMS Mobile App</h4>
            </div>
          </div>
          </div>
        <!--/Portfolio Item --> 
        
        <!-- Portfolio Item-->
        <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(337px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four  design isotope-item">
          <div class="portfolio_image"> <image src="image/portfolio_pic2.jpg" alt="Portfolio 1"> </div>
          <div class="item_overlay">
            <div class="item_info"> 
              <h4 class="project_name">Finance App</h4>
            </div>
          </div>
        </div>
        <!--/Portfolio Item --> 
        
        <!-- Portfolio Item -->
        <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(674px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four  design  isotope-item">
          <div class="portfolio_image"> <image src="image/portfolio_pic3.jpg" alt="Portfolio 1"> </div>
          <div class="item_overlay">
            <div class="item_info"> 
              <h4 class="project_name">GPS Concept</h4>
            </div>
          </div>
        </div>
        <!--/Portfolio Item--> 
        
        <!-- Portfolio Item-->
        <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(1011px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four  android  prototype web isotope-item">
          <div class="portfolio_image"> <image src="image/portfolio_pic4.jpg" alt="Portfolio 1"> </div>
          <div class="item_overlay">
            <div class="item_info"> 
              <h4 class="project_name">Shopping</h4>
            </div>
          </div>
        </div>
        <!-- Portfolio Item --> 
        
        <!-- Portfolio Item -->
        <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 240px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four  design isotope-item">
          <div class="portfolio_image"> <image src="image/portfolio_pic5.jpg" alt="Portfolio 1"> </div>
          <div class="item_overlay">
            <div class="item_info"> 
              <h4 class="project_name">Managment</h4>
            </div>
          </div>
        </div>
        <!--/Portfolio Item --> 
        
        <!-- Portfolio Item -->
        <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(337px, 240px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four  web isotope-item">
          <div class="portfolio_image"> <image src="image/portfolio_pic6.jpg" alt="Portfolio 1"> </div>
          <div class="item_overlay">
            <div class="item_info"> 
              <h4 class="project_name">iPhone</h4>
            </div>
          </div>
        </div>
        <!--/Portfolio Item --> 
        
        <!-- Portfolio Item  -->
        <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(674px, 240px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four  design web isotope-item">
          <div class="portfolio_image"> <image src="image/portfolio_pic7.jpg" alt="Portfolio 1"> </div>       
          <div class="item_overlay">
            <div class="item_info"> 
              <h4 class="project_name">Nexus Phone</h4>
            </div>
          </div>
         </div>
        <!--/Portfolio Item --> 
        
        <!-- Portfolio Item -->
        <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(1011px, 240px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four   android isotope-item">
          <div class="portfolio_image"> <image src="image/portfolio_pic8.jpg" alt="Portfolio 1"> </div>       
          <div class="item_overlay">
            <div class="item_info"> 
          <h4 class="project_name">Android</h4>
            </div>
          </div>
          </a> </div>
        <!--/Portfolio Item --> 
        
      </div>
      <!--/Portfolio Wrapper --> 
      
    </div>
    <!--/Portfolio Filters -->
    
    <div class="portfolio_btm"></div>
    
    
    <div id="project_container">
      <div class="clear"></div>
      <div id="project_data"></div>
    </div>
   
    
  </section>
  <!--/Portfolio --> 

  <section class="page_section" id="company"><!--page_section-->
    <h2>客户</h2>
  <!--page_section-->
  <div class="client_logos"><!--client_logos-->
    <div class="container">
      <ul class="fadeInRight animated wow">
        <li><a href="javascript:void(0)"><image src="image/client_logo1.png" alt=""></a></li>
        <li><a href="javascript:void(0)"><image src="image/client_logo2.png" alt=""></a></li>
        <li><a href="javascript:void(0)"><image src="image/client_logo3.png" alt=""></a></li>
        <li><a href="javascript:void(0)"><image src="image/client_logo5.png" alt=""></a></li>
      </ul>
    </div>
  </div>
  </section>
  <!--client_logos-->
</div>
@include('layouts.footer')
@endsection
