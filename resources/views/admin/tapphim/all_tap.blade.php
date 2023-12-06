@extends('admin.layout.admin_layout')
@section('title','Admin | Quản lý Tap phim')
@section('title_pages','Quản Lý tap phim')
@section('admin_content')

<section class="content">
  <div class="container-fuild">
    <div class="row">
          <!-- Default box -->
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a href="{{route('tap-phim.create')}}" class="btn btn-success">+Thêm mới tap phim</a>
        @if(session('message'))
          <div style="color: red; text-align: center; font-weight: bold">
              {{ session('message') }}
          </div>
        @endif
        <div class="box-tools">
          <form action="" class="from-inline">
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="key" class="form-control pull-right" placeholder="Search">
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>  
        </form>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Tên Phim</th>
              <th>Hình ảnh</th>
              <th>tap phim</th>
              <th>Link phim</th>
              {{-- <th>Trạng thái</th> --}}
              <th>Tùy chọn</th>
            </tr>
          </thead>
          <tbody class="order_position">
            @foreach($list_tapphim as $key=> $lis)
              
            <tr>
              <td>{{$key}}</td>
              <td >{{$lis->phim->title}}</td>
              <td ><img src="{{asset('upload/phim/'.($lis->phim->img))}}" style="max-height: 200px"></td>
              <td >{{$lis->tap}}</td>
              <td style="width: 20%;">{{$lis->link}}</td>
              {{-- <td class="text-center" style="width: 200px">
                @if ($lis->phim->status == 1)
                <span class="label label-success">Hiển thị</span>
                @else
                <span class="label label-danger">Ẩn</span>
                @endif
                
              </td> --}}
              <td class="text-center">
                <div style="display: flex; align-items: center; justify-content: center;">
                    <a style="margin: 5px" href="{{route('tap-phim.edit',$lis->id)}}" class="btn btn-success">Sửa</a>
                    <form action="{{ route('tap-phim.destroy', $lis->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Bạn có chắc chắn muốn xoá không?')" 
                        class="btn btn-danger" 
                        type="submit">Xoá</button>
                    </form>
                </div>
              </td>
            </tr>
              
            @endforeach
          </tbody>
        </table>
        <footer class="panel-footer">
          <div class="row" style="height: 60px;">
            <div class="col-sm-7 text-right ">
              {{ $list_tapphim->appends(request()->all())->links('pagination::bootstrap-4') }}
            </div>
          </div>
        </footer>
      </div>
    </div>
    
</div>
    </div>
  </div>

  </section>
  @endsection