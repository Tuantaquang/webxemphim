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
        <h3 class="box-title">Thêm mới danh muc</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="{{route('danh-muc.store')}}" method="POST">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Tên danh mục</label>
            <input name="title" type="text" class="form-control" id="slug" onkeyup="ChangeToSlug()" placeholder="Tên danh mục" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Slug</label>
            <input name="slug" type="slug" class="form-control" id="convert_slug" required>
          </div>

          <div class="form-group">
            <label for="productDescription">Mô tả</label>
            <textarea name="desc" class="form-control" style="resize: none" id="productDescription" rows="5"></textarea>
          </div>          

          {{-- <div class="form-group">
            <label for="exampleInputEmail1">Chọn Vị trí</label>
            <select name="" id="input" class="form-control" required="required">
              <option value="">Chọn vị trí</option>
              <option value="">1</option>
              <option value="">2</option>
              <option value="">3</option>
            </select>
          </div> --}}
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