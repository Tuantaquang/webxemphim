@extends('admin.layout.admin_layout')
@section('title','Admin | Quản lý danh Mục')
@section('title_pages','Quản Lý Danh Mục')
@section('admin_content')

<section class="content">
  <div class="container-fuild">
    <div class="row">
          <!-- Default box -->
   <div class="col-md-8">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Sửa danh muc</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      @foreach($info as $ds)
      <form role="form" action="{{route('info.update',$ds->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Tiêu đề</label>
            <input value="{{$ds->title}}" name="title" type="text" class="form-control" placeholder="title.." required>
          </div>


          <div class="form-group">
            <label for="productDescription">Mô tả</label>
            <textarea name="desc" class="form-control" style="resize: none" id="productDescription" rows="5">{{$ds->desc}}</textarea>
          </div>          

          <div class="form-group">
            <label for="exampleInputEmail1">Hình Ảnh</label>
            <input name="logo" type="file" class="form-control">
            @if($ds)
            <img src="{{asset('upload/logo/'.($ds->logo))}}" height="80" width="80">
            @endif
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">CopyRight</label>
            <input value="{{$ds->copyright}}" name="copyright" type="text" class="form-control" placeholder=".." required>
          </div>
          
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
      </form>
      @endforeach
    </div>
 
    <!-- /.box -->

  </div>
<!-- /.box -->
    </div>
  </div>


  </section>

@endsection