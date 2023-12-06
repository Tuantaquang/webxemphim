@extends('admin.layout.admin_layout')
@section('title','Admin | Quản lý danh Mục')
@section('title_pages','Quản Lý Danh Mục')
@section('admin_content')

<section class="content">
  <div class="container-fuild">
    <div class="row">
          <!-- Default box -->
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a href="{{route('info.create')}}" class="btn btn-success">+Thêm mới Danh Mục</a>
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
              <th>Tiêu đề</th>
              <th>Mô tả</th>
              <th>Logo</th>
              <th>CopyRight</th>
              <th class="text-center" style="width: 200px">Tùy chọn</th>
            </tr>
          </thead>
          <tbody class="order_position">
            @foreach($info as $key=> $inf)
            <tr id="{{$inf->id}}">
              <td>{{$key}}</td>
              <td >{{$inf->title}}</td>
              <td >{{$inf->desc}}</td>
              <td><img src="{{asset('upload/logo/'.($inf->logo))}}" height="60" width="100"></td>
              <td >{{$inf->copyright}}</td>
              <td class="text-center">
                <div style="display: flex; align-items: center; justify-content: center;">
                    <a style="margin: 5px" href="{{route('info.edit',$inf->id)}}" class="btn btn-success">Sửa</a>
                    <form action="{{ route('info.destroy', $inf->id) }}" method="POST">
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
              {{ $info->appends(request()->all())->links('pagination::bootstrap-4') }}
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