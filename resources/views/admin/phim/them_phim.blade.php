@extends('admin.layout.admin_layout')
@section('title','Admin | Quản lý Phim')
@section('title_pages','Quản Lý Phim')
@section('admin_content')

<section class="content">
  <div class="container-fuild">
    <div class="row">
          <!-- Default box -->
   <div class="col-md-8">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Thêm mới Phim</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="{{route('phim.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Tên Phim</label>
            <input name="title" type="text" class="form-control" id="slug" onkeyup="ChangeToSlug()" placeholder="Tên Phim..." required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Slug</label>
            <input name="slug" type="slug" class="form-control" id="convert_slug">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Tên khác</label>
            <input name="ten_khac" type="text" class="form-control" placeholder="Tên tiếng anh..." required>
          </div>

          <div class="form-group">
            <label for="productDescription">Hình ảnh</label>
            <input type="file" name="img" class="form-control">
          </div> 

          <div class="form-group">
            <label for="productDescription">Mô tả</label>
            <textarea name="desc" class="form-control" style="resize: none" placeholder="mô tả..." rows="5"></textarea>
          </div>

          {{-- <div class="form-group">
            <label for="exampleInputEmail1">Danh mục</label>
            <select name="id_danhmuc" class="form-control input-sm m-bot15">
              @foreach($danhmuc as $dm)
              <option value="{{$dm->id}}">{{$dm->title}}</option>
              @endforeach
            </select>
          </div> --}}
          <div class="form-group">
            <label for="exampleInputEmail1">Danh Mục</label>
            @foreach($danhmuc as $key => $dm)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="danhmuc[]" value="{{$dm->id}}">
                    <label class="form-check-label" for="danhmuc">{{$dm->title}}</label>
                  </div>
            @endforeach
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Thể loại</label>
            @foreach($theloai as $key => $tl)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="theloai[]" value="{{$tl->id}}">
                    <label class="form-check-label" for="theloai">{{$tl->title}}</label>
                  </div>
            @endforeach
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Phim thuộc phim Bộ/Lẻ</label>
            <select name="bo_le" class="form-control input-sm m-bot15">
              <option value="0">Phim Bộ</option>
              <option value="1">Phim Lẻ</option>
          </select>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Số tập</label>
            <input name="sotap" type="text" class="form-control" placeholder="Tập..." required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">HOT</label>
            <select name="phim_hot" class="form-control input-sm m-bot15">
              <option value="0">Không</option>
              <option value="1">Có</option>
          </select>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">phân giải</label>
            <select name="phan_giai" class="form-control input-sm m-bot15">
              <option value="0">SD</option>
              <option value="1">HD</option>
              <option value="2">Cam</option>
              <option value="3">HDCam</option>
              <option value="4">FullHD</option>
          </select>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Phụ đề</label>
            <select name="phu_de" class="form-control input-sm m-bot15">
              <option value="0">VietSub</option>
              <option value="1">Thuyết Minh</option>
          </select>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Thời Lượng</label>
            <input name="thoi_luong" type="text" class="form-control" placeholder="Thời lượng phim..." required>
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