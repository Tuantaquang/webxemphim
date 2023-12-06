@extends('admin.layout.admin_main')
@section('content')

<div class="row">
  <hr>
  <h3 class="text-center">Danh Sách Phim</h3>
  <style>
    .box-flim {
      color: black !important;
      background: #ffffff !important;
      margin: 5px;
      width: 169px;
      height: 300px;
    }
    .box-flim img{
      margin: 5px;
      width: 145px;
      height: 180px;
    }

    .box-flim img .text-center{
      margin: 5px;
    }
  </style>
  @foreach($phim as $key => $ph)
  <div class="col-md-2 col-sm-6 col-xs-12">
    <a href="{{route('info-phim',$ph->slug)}}" class="black-link">
    <div class="box-flim">
      
        <div class="text-center">
          <img src="{{asset('upload/phim/'.($ph->img))}}">
        </div>
        
        <div class="text-center">
          <div>{{$ph->title}}</div>
          <small>{{$ph->ten_khac}}</small>
        </div>
      
    </div>
  </a>
  </div>
  @endforeach
</div>

<footer class="panel-footer">
  <div class="row" style="height: 60px;">
    <div class="col-sm-7 text-right ">
      {{ $phim->appends(request()->all())->links('pagination::bootstrap-4') }}
    </div>
  </div>
</footer>

@endsection