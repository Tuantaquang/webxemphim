@extends('admin.layout.admin_layout')
@section('title','Admin | Quản lý thể loại')
@section('title_pages','Quản lý thể loại')
@section('admin_content')

<section class="content">
  <div class="container-fuild">
    <div class="row">
          <!-- Default box -->
   <div class="col-md-8">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Thêm mới thể loại</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="{{route('the-loai.store')}}" method="POST">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Tên thể loại</label>
            <input name="title" type="text" class="form-control" id="slug" onkeyup="ChangeToSlug()" placeholder="Tên thể loại" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Slug</label>
            <input name="slug" type="slug" class="form-control" id="convert_slug" required>
          </div>

          <div class="form-group">
            <label for="productDescription">Mô tả</label>
            <textarea name="desc" class="form-control" style="resize: none" id="productDescription" rows="5"></textarea>
          </div>          
          <div class="form-group">
            <label for="exampleInputEmail1">Chọn trạng thái</label>
            <select name="status" class="form-control input-sm m-bot15">
              <option value="0">Ẩn</option>
              <option value="1">Hiển Thị</option>
          </select>
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