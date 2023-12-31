<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('backend')}}/images/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->

    <ul class="sidebar-menu" data-widget="tree">

      <li>
        <a href="{{route('admin.home')}}">
          <i class="fa fa-th"></i> <span>Dashboard </span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">FE</small>
          </span>
        </a>
      </li>

      <li>
        <a href="{{route('danh-muc.index')}}">
          <i class="fa fa-file"></i> <span>Quản lý Danh Muc </span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">FE</small>
          </span>
        </a>
      </li>

      <li>
        <a href="{{route('the-loai.index')}}">
          <i class="fa fa-child"></i> <span>Quản lý Thể Loại </span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">FE</small>
          </span>
        </a>
      </li>

      <li>
        <a href="{{route('phim.index')}}">
          <i class="fa fa-film"></i> <span>Quản lý Phim </span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">FE</small>
          </span>
        </a>
      </li>

      <li>
        <a href="{{route('tap-phim.index')}}">
          <i class="fa fa-video-camera"></i> <span>Quản lý Tập Phim </span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">FE</small>
          </span>
        </a>
      </li>

      <li>
        <a href="{{route('info.index')}}">
          <i class="fa fa-info-circle"></i> <span>Thông tin website</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">FE</small>
          </span>
        </a>
      </li>
      {{-- <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Quản lý banner</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=""><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul>
      </li> --}}
      
      {{-- <li>
        <a href="">
          <i class="fa fa-th"></i> <span>Widgets</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">Hot</small>
          </span>
        </a>
      </li> --}}
      
    </ul>
  </section>