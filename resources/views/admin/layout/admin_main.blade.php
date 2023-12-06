@extends('admin.layout.admin_layout')
@section('title','Admin | Trang chủ')
@section('title_pages','Thống Kê')
@section('admin_content')


<section class="content">
    <style>
      .black-link {
        color: black !important;
      }
    </style>
  <div class="row">
    
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <a href="{{route('danh-muc.index')}}" class="black-link">
          <span class="info-box-icon bg-aqua"><i class="fa fa-file"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Danh Mục</span>
            <span class="info-box-number">{{$danhmuc_count}}</span>
          </div>
        </a>
      </div>
    </div>
    
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <a href="{{route('the-loai.index')}}" class="black-link">
          <span class="info-box-icon bg-red"><i class="fa fa-child"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Thể Loại</span>
            <span class="info-box-number">{{$theloai_count}}</span>
          </div>
        </a>
      </div>
    </div>
    
    
    <div class="clearfix visible-sm-block"></div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <a href="{{route('phim.index')}}" class="black-link">
            <span class="info-box-icon bg-green"><i class="fa fa-film"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Phim</span>
              <span class="info-box-number">{{$phim_count}}</span>
            </div>
          </a>
      </div>
    </div>
    
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <a href="{{route('tap-phim.index')}}" class="black-link">
          <span class="info-box-icon bg-yellow"><i class="fa fa-video-camera"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Tập Phim</span>
              <span class="info-box-number">{{$tap_count}}</span>
            </div>
        </a>
      </div>
    </div>
  </div>

  {{-- ////content//// --}}
  @yield('content')
</section>



@endsection