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
      @foreach($danhsach_dm as $ds)
      <form role="form" action="{{route('danh-muc.update',$ds->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Tên danh mục</label>
            <input value="{{$ds->title}}" name="title" type="text" class="form-control" id="slug" onkeyup="ChangeToSlug()" placeholder="Tên danh mục" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Slug</label>
            <input value="{{$ds->slug}}" name="slug" type="slug" class="form-control" id="convert_slug" required>
          </div>

          <div class="form-group">
            <label for="productDescription">Mô tả</label>
            <textarea name="desc" class="form-control" style="resize: none" id="productDescription" rows="5">{{$ds->desc}}</textarea>
          </div>          

          <div class="form-group">
            <label for="exampleInputEmail1">Chọn trạng thái</label>
            <select name="status" class="form-control input-sm m-bot15">
                @if($ds->status=='1'){
                    <option value="0">Ẩn</option>
                    <option selected  value="1">Hiển thị</option>
                    }
                @else{
                    <option selected  value="0">Ẩn</option>
                    <option  value="1">Hiển thị</option>
                    }
                @endif
          </select>
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