<!DOCTYPE html>
<html lang="vi">
   <head>
      <meta charset="utf-8" />
      <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
      <meta name="theme-color" content="#234556">
      <meta http-equiv="Content-Language" content="vi" />
      <meta content="VN" name="geo.region" />
      <meta name="DC.language" scheme="utf-8" content="vi" />
      <meta name="language" content="Việt Nam">
      

      <link rel="shortcut icon" href="{{asset('frontend')}}/img/logo-icon.png" type="image/x-icon" />
      <meta name="revisit-after" content="1 days" />
      <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
      <title>HHTrung - Hoạt Hình Trung Quốc</title>
      <meta name="description" content="Phim hay 2021 - Xem phim hay nhất, xem phim online miễn phí, phim hot , phim nhanh" />
      <link rel="canonical" href="">
      <link rel="next" href="" />
      <meta property="og:locale" content="vi_VN" />
      <meta property="og:title" content="Phim hay 2020 - Xem phim hay nhất" />
      <meta property="og:description" content="Phim hay 2020 - Xem phim hay nhất, phim hay trung quốc, hàn quốc, việt nam, mỹ, hong kong , chiếu rạp" />
      <meta property="og:url" content="" />
      <meta property="og:site_name" content="Phim hay 2021- Xem phim hay nhất" />
      <meta property="og:image" content="" />
      <meta property="og:image:width" content="300" />
      <meta property="og:image:height" content="55" />
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
     
      <link rel='dns-prefetch' href='//s.w.org' />
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
      <link rel='stylesheet' id='bootstrap-css' href="{{asset('frontend')}}/css/bootstrap.min.css" media='all' />
      <link rel='stylesheet' id='style-css' href="{{asset('frontend')}}/css/style.css" media='all' />
      <link rel='stylesheet' id='wp-block-library-css' href="{{asset('frontend')}}/css/style.min.css" media='all' />
      <script type='text/javascript' src="{{asset('frontend')}}/js/jquery.min.js" id='halim-jquery-js'></script>
      <style type="text/css" id="wp-custom-css">
         .textwidget p a img {
         width: 100%;
         }
      </style>
      <style>#header .site-title {
         background: url(frontend/img/logo.png) no-repeat top left;
         background-size: contain;
         text-indent: -9999px;
         }
      </style>
   </head>
   <body class="home blog halimthemes halimmovies" data-masonry="">
      <header id="header">
         <div class="container">
            <div class="row" id="headwrap">
               <div class="col-md-3 col-sm-6 slogan">
                  {{-- <p class="site-title"><a class="logo" href="" title="phim hay ">Phim Hay</p> --}}
                     <p class=""><a class="logo" href="{{route('home')}}" title="phim hay ">
                        <img src="{{asset('upload/logo/'.$info->logo)}}" style="height: 75px">
                     </p>

                  </a>
               </div>
               <div class="col-md-5 col-sm-6 halim-search-form hidden-xs">
                  <style type="text/css">
                     ul#result{
                        position: absolute;
                        z-index: 9999;
                        background: #1b2c3d;
                        width: 94%;
                        padding: 10px;
                        margin: 1px;
                     }
                     .input-row {
                        display: flex;
                        align-items: center;
                     }

                     .input-row input {
                        flex: 1;
                        margin-right: 1px;
                     }
                  </style>
                  <div class="header-nav">
                     <div class="col-xs-12">
                        <form id="search-form-pc" name="halimForm" role="search" action="{{route('tim-kiem')}}" method="GET">
                           <div class="form-group">
                              <div class="input-row">
                                 <input id="timkiem" type="text" name="search" class="form-control" placeholder="Tìm kiếm..." autocomplete="off" required>
                                 <button class="btn btn-primary">Tìm</button>
                             </div>
                              {{-- <div class="input-group col-xs-12">
                                 <input id="timkiem" type="text" name="search" class="form-control" placeholder="Tìm kiếm..." autocomplete="off" required>
                                 <button class="btn btn-primary">Tìm</button>
                              </div> --}}
                           </div>
                        </form>
                        <ul class="list-group list-unstyled" id="result" style="display: none">
                        </ul>
                     </div>
                  </div>
               </div>
               

               <div class="col-md-4 hidden-xs">
                  @guest
                  <a href="{{ route('user_login') }}" id="get-bookmark" class="box-shadow">
                     <i class="fas fa-heart"></i><span> Yêu Thích</span>

                     {{-- <span class="count"></span> --}}

                  </a>
                  @else
                  <a href="{{route('yeuthich.index')}}" id="get-bookmark" class="box-shadow">
                     <i class="fas fa-heart"></i><span> Yêu Thích</span>

                     {{-- <span class="count"></span> --}}

                  </a>
                  @endguest
                  
                  <div id="bookmark-list" class="hidden bookmark-list-on-pc">
                     <ul style="margin: 0;"></ul>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <div class="navbar-container">
         <div class="container">
            <nav  class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#halim" aria-expanded="false">
                  <span class="sr-only">Menu</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <button type="button" class="navbar-toggle collapsed pull-right expand-search-form" data-toggle="collapse" data-target="#search-form" aria-expanded="false">
                     <i class="bi bi-search"></i><span class="hl-search" aria-hidden="true"></span>
                  </button>
                  {{-- <button type="button" class="navbar-toggle collapsed pull-right get-bookmark-on-mobile">
                  Yêu Thích<i class="hl-bookmark" aria-hidden="true"></i>
                  <span class="count">0</span>
                  </button>
                  <button type="button" class="navbar-toggle collapsed pull-right get-locphim-on-mobile">
                  <a href="javascript:;" id="expand-ajax-filter" style="color: #ffed4d;">Lọc <i class="fas fa-filter"></i></a>
                  </button> --}}
               </div>
               
               <div class="collapse navbar-collapse" id="halim">
                  <div class="menu-menu_1-container">
                     <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
                        <li class="current-menu-item active"><a title="Trang Chủ" href="{{route('home')}}">Trang Chủ</a></li>
                           @foreach($danhmuc as $dm)
                           <li class="mega"><a title="{{$dm->title}}" href="{{route('danhmuc',$dm->slug)}}">{{$dm->title}}</a></li>
                           @endforeach
                        {{-- <li class="mega"><a title="Xem Nhiều" href="{{route('xem_nhieu')}}">Xem Nhiều</a></li> --}}
                        <li class="mega dropdown">
                           <a title="Thể loại" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Thể Loại<span class="caret"></span></a>
                           <ul role="menu" class=" dropdown-menu">
                              @foreach($theloai as $tl)
                                 <li><a title="{{$tl->title}}" href="{{route('theloai',$tl->slug)}}">{{$tl->title}}</a></li>
                              @endforeach
                           </ul>
                        </li>

                        <li class="mega dropdown">
                           <a title="Năm phim" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Năm<span class="caret"></span></a>
                           <ul role="menu" class=" dropdown-menu">
                              <?php
                                 $currentYear = date('Y');
                                 $startYear = 2000;
                              ?>
                              @for ($year = $startYear; $year <= $currentYear; $year++)
                                 <li>
                                    <a title="{{$year}}" href="{{route('nam',$year)}}">{{$year}}</a>
                                 </li>
                              @endfor
                           </ul>
                        </li>
                        
                     </ul>
                     <ul id="menu-menu_1" class="nav navbar-nav navbar-right">
                        <!-- Kiểm tra xem người dùng đã đăng nhập hay chưa -->
                        @guest
                            <!-- Hiển thị nút đăng nhập -->
                            <li class="mega dropdown">
                                <a title="Ấn để đăng nhập" href="{{ route('user_login') }}">
                                    <i class="fas fa-user"></i> Login
                                </a>
                            </li>
                        @else
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                
                                <span class="hidden-xs"> <i class="fas fa-user"></i>   {{Auth::user()->name}}</span>
                              </a>
                              <ul class="dropdown-menu">
                                <!-- User image -->
                                
                                @if(Auth::user()->role == 1)
                                <li class="user-header">
                                 <p>
                                   Xin Chào: {{Auth::user()->name}} 
                                 </p>
                               </li>
                                @else
                                <li class="user-header">
                                 <p>
                                   Xin Chào: {{Auth::user()->name}} 
                                 </p>
                               </li>
                                <li>
                                 <div class="pull-right">
                                    <a href="{{route('admin.home')}}" class="btn btn-default btn-flat">trang admin</a>
                                 </div>
                                </li>
                                @endif
                                
                                <li class="user-footer">
                                 
                                  <div class="pull-right">
                                    <a href="{{route('user_logout')}}" class="btn btn-default btn-flat">đăng xuất</a>
                                  </div>
                                </li>
                              </ul>
                            </li>
                        @endguest
                    </ul>
                  </div>

               </div>
            </nav>
            <div class="collapse navbar-collapse" id="search-form">
               <div id="mobile-search-form" class="halim-search-form"></div>
            </div>
            <div class="collapse navbar-collapse" id="user-info">
               <div id="mobile-user-login"></div>
            </div>
         </div>
      </div>
      </div>
      
      <div class="container">
         <div class="row fullwith-slider"></div>
      </div>
      <div class="container">
         @yield('main-content')
      </div>
      <div class="clearfix"></div>
      <footer id="footer" class="clearfix">
         <div class="container footer-columns">
            <div class="row container">
               <div class="widget about col-xs-12 col-sm-4 col-md-4">
                  <div class="footer-logo">
                     <img src="{{asset('upload/logo/'.$info->logo)}}" style="height: 55px">
                     {{-- <img class="img-responsive" src="https://img.favpng.com/9/23/19/movie-logo-png-favpng-nRr1DmYq3SNYSLN8571CHQTEG.jpg" alt="Phim hay 2021- Xem phim hay nhất" /> --}}
                  </div>
                  Liên hệ QC: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e5958d8c888d849ccb868aa58288848c89cb868a88">[email&#160;tuantaquang2001@gmail.com]</a>
               </div>
            </div>
            
         </div>
         <div class="col-xs-12 col-sm-4 col-md-4">
            <p>{{$info->copyright}}</p>
         </div>
      </footer>
      
      <div id='easy-top'></div>
     
      <script type='text/javascript' src="{{asset('frontend')}}/js/bootstrap.min.js?ver=5.7.2" id='bootstrap-js'></script>
      <script type='text/javascript' src="{{asset('frontend')}}/js/owl.carousel.min.js?ver=5.7.2" id='carousel-js'></script>

      <script type='text/javascript' src="{{asset('frontend')}}/js/halimtheme-core.min.js?ver=1626273138" id='halim-init-js'></script>
   
      <style>#overlay_mb{position:fixed;display:none;width:100%;height:100%;top:0;left:0;right:0;bottom:0;background-color:rgba(0, 0, 0, 0.7);z-index:99999;cursor:pointer}#overlay_mb .overlay_mb_content{position:relative;height:100%}.overlay_mb_block{display:inline-block;position:relative}#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:600px;height:auto;position:relative;left:50%;top:50%;transform:translate(-50%, -50%);text-align:center}#overlay_mb .overlay_mb_content .cls_ov{color:#fff;text-align:center;cursor:pointer;position:absolute;top:5px;right:5px;z-index:999999;font-size:14px;padding:4px 10px;border:1px solid #aeaeae;background-color:rgba(0, 0, 0, 0.7)}#overlay_mb img{position:relative;z-index:999}@media only screen and (max-width: 768px){#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:400px;top:3%;transform:translate(-50%, 3%)}}@media only screen and (max-width: 400px){#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:310px;top:3%;transform:translate(-50%, 3%)}}</style>
{{--tìm kiếm --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
      $('#timkiem').keyup(function(){
         $('#result').html('');
         var search = $(this).val();
         if (search !== '') {
            $('#result').css('display','inherit');
            var expression = new RegExp(search, "i");
            $.getJSON('/json/phim.json', function(data){
               $.each(data, function(key, value){
                  if (value.title.search(expression) !== -1 || value.ten_khac.search(expression) !== -1) {
                     $('#result').append('<li class="list-group-item " style="cursor:pointer"><div class="row"><div class="col-md-2"><img src="/upload/phim/'+value.img+'"></div><div class="col-md-10" style="margin-top:5px"><h5> '+value.title+'</h5><h6>('+value.ten_khac+')</h6></div></div><hr></li>');
                  }
               });
            });
         }else{
            $('#result').css('display','none');
         }
      });

      $('#result').on('click', 'li', function(){
         var click_text = $(this).text().split('(');
         $('#timkiem').val($.trim(click_text[0]));
         $('#result').html('');
         $('#result').css('display','none');
      });
   });
</script>



      <style>
         #overlay_pc {
         position: fixed;
         display: none;
         width: 100%;
         height: 100%;
         top: 0;
         left: 0;
         right: 0;
         bottom: 0;
         background-color: rgba(0, 0, 0, 0.7);
         z-index: 99999;
         cursor: pointer;
         }
         #overlay_pc .overlay_pc_content {
         position: relative;
         height: 100%;
         }
         .overlay_pc_block {
         display: inline-block;
         position: relative;
         }
         #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
         width: 600px;
         height: auto;
         position: relative;
         left: 50%;
         top: 50%;
         transform: translate(-50%, -50%);
         text-align: center;
         }
         #overlay_pc .overlay_pc_content .cls_ov {
         color: #fff;
         text-align: center;
         cursor: pointer;
         position: absolute;
         top: 5px;
         right: 5px;
         z-index: 999999;
         font-size: 14px;
         padding: 4px 10px;
         border: 1px solid #aeaeae;
         background-color: rgba(0, 0, 0, 0.7);
         }
         #overlay_pc img {
         position: relative;
         z-index: 999;
         }
         @media only screen and (max-width: 768px) {
         #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
         width: 400px;
         top: 3%;
         transform: translate(-50%, 3%);
         }
         }
         @media only screen and (max-width: 400px) {
         #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
         width: 310px;
         top: 3%;
         transform: translate(-50%, 3%);
         }
         }
      </style>
     
      <style>
         .float-ck { position: fixed; bottom: 0px; z-index: 9}
         * html .float-ck /* IE6 position fixed Bottom */{position:absolute;bottom:auto;top:expression(eval (document.documentElement.scrollTop+document.docum entElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0))) ;}
         #hide_float_left a {background: #0098D2;padding: 5px 15px 5px 15px;color: #FFF;font-weight: 700;float: left;}
         #hide_float_left_m a {background: #0098D2;padding: 5px 15px 5px 15px;color: #FFF;font-weight: 700;}
         span.bannermobi2 img {height: 70px;width: 300px;}
         #hide_float_right a { background: #01AEF0; padding: 5px 5px 1px 5px; color: #FFF;float: left;}
      </style>


   </body>
</html>