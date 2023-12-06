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
        <h3 class="box-title">Thêm thông tin</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="{{route('info.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Tiêu đề</label>
            <input name="title" type="text" class="form-control"  placeholder="Title..." required>
          </div>

          <div class="form-group">
            <label for="productDescription">Mô tả</label>
            <textarea name="desc" class="form-control" style="resize: none" id="productDescription" rows="5" placeholder="..."></textarea>
          </div>          

          <div class="form-group">
            <label for="productDescription">Hình ảnh</label>
            <input type="file" name="logo" class="form-control">
          </div> 

          <div class="form-group">
            <label for="exampleInputEmail1">CopyRight</label>
            <input name="copyright" type="text" class="form-control"  placeholder="..." required>
          </div>
          
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
      </form>
    </div>
 
    <!-- /.box -->

  </div>
<!-- /.box -->
    </div>
  </div>


  </section>

@endsection