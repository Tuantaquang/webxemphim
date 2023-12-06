<!-- Logo -->
<a href="" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>HH</b>-T</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">HH-TRUNG</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{route('home')}}">Trang chủ</a>
      </li>
    </ul>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{asset('backend')}}/images/user2-160x160.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs">{{Auth::user()->name}}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{asset('backend')}}/images/user2-160x160.jpg" class="img-circle" alt="User Image">

              <p>
                Hello
              </p>
            </li>
            <!-- Menu Body -->
            {{-- <li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
                </div>
              </div>
              <!-- /.row -->
            </li> --}}
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">thông tin</a>
              </div>
              <div class="pull-right">
                <a href="{{route('admin_logout')}}" class="btn btn-default btn-flat">đăng xuất</a>
              </div>
            </li>
          </ul>
        </li>
        
      </ul>
    </div>
  </nav>