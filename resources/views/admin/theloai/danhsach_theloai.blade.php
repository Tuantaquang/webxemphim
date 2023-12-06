@extends('admin.layout.admin_layout')
@section('title','Admin | Quản lý thể loại')
@section('title_pages','Quản Lý thể loại')
@section('admin_content')

<section class="content">
  <div class="container-fuild">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <a href="{{route('danh-muc.create')}}" class="btn btn-success">+Thêm mới Thể loại</a>
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
                  <th style="width: 200px">Tên</th>
                  <th>Slug</th>
                  <th>Mô Tả</th>
                  <th class="text-center" style="width: 200px">Trạng thái</th>
                  <th class="text-center" style="width: 200px">Tùy chọn</th>
                </tr>
              </thead>
              <tbody>
                @foreach($danhsach_tl as $key=> $ds)
                <tr>
                  <td>{{$key}}</td>
                  <td style="width: 200px">{{$ds->title}}</td>
                  <td >{{$ds->slug}}</td>
                  <td >{{$ds->desc}}</td>
                  <td class="text-center" style="width: 200px">
                    @if ($ds->status == 1)
                    <span class="label label-success">Hiển thị</span>
                    @else
                    <span class="label label-danger">Ẩn</span>
                    @endif
                    
                  </td>
                  <td class="text-center">
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <a style="margin: 5px" href="{{route('the-loai.edit',$ds->id)}}" class="btn btn-success">Sửa</a>
                        <form action="{{ route('the-loai.destroy', $ds->id) }}" method="POST">
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
                  {{ $danhsach_tl->appends(request()->all())->links('pagination::bootstrap-4') }}
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