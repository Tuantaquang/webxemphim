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
        <h3 class="box-title">Sửa Phim</h3>
      </div>
        <!-- /.box-header -->
        <!-- form start -->

        
      {{-- @foreach($danhsach_phim as $ds) --}}
      {{-- @dd($danhsach_phim) --}}
      <form role="form" action="{{route('phim.update',$danhsach_phim->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Tên phim</label>
            <input value="{{$danhsach_phim->title}}" name="title" type="text" class="form-control" id="slug" onkeyup="ChangeToSlug()" placeholder="Tên phim..." required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Slug</label>
            <input value="{{$danhsach_phim->slug}}" name="slug" type="slug" class="form-control" id="convert_slug" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Tên khác</label>
            <input value="{{$danhsach_phim->ten_khac}}" name="ten_khac" type="text" class="form-control" placeholder="Tên khac..." required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Hình Ảnh</label>
            <input name="img" type="file" class="form-control">
            @if($danhsach_phim)
            <img src="{{asset('upload/phim/'.($danhsach_phim->img))}}" height="80" width="80">
            @endif
          </div>

          <div class="form-group">
            <label for="productDescription">Mô tả</label>
            <textarea name="desc" class="form-control" style="resize: none" placeholder="Mô tả..." rows="5">{{$danhsach_phim->desc}}</textarea>
          </div>          

          {{-- <div class="form-group">
            <label for="exampleInputEmail1">Danh Mục</label>
            <select name="id_danhmuc" class="form-control input-sm m-bot15">
              @foreach($danhmuc as $danhmuc)
                <option value="{{$danhmuc->id}}"
                  @if($danhmuc->id == $danhsach_phim->id_danhmuc) selected 
                  @endif 
                  >{{$danhmuc->title}}
                </option>
              @endforeach
            </select>
          </div> --}}
          <div class="form-group">
            <label for="exampleInputEmail1">Danh Mục</label>
            @foreach($danhmuc as $key => $dm)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="danhmuc[]" value="{{$dm->id}}"
                    @if($danhmucs && $danhmucs->contains($dm->id))
                    checked
                    @endif
                    >
                    <label class="form-check-label" for="danhmuc">
                        {{$dm->title}}
                    </label>
                </div>
            @endforeach
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Thể loại</label>
            @foreach($theloai as $key => $tl)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="theloai[]" value="{{$tl->id}}"
                    @if($theloais && $theloais->contains($tl->id))
                    checked
                    @endif
                    >
                    <label class="form-check-label" for="theloai">
                        {{$tl->title}}
                    </label>
                </div>
            @endforeach
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Phim thuộc phim Bộ/Lẻ</label>
            <select name="bo_le" class="form-control input-sm m-bot15">
                @if($danhsach_phim->bo_le=='1'){
                    <option value="0">Phim Bộ</option>
                    <option selected  value="1">Phim Lẻ</option>
                    }
                @else{
                    <option selected  value="0">Phim Bộ</option>
                    <option  value="1">Phim Lẻ</option>
                    }
                @endif
            </select>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Số tập</label>
            <input value="{{$danhsach_phim->sotap}}" name="sotap" type="text" class="form-control" placeholder="Tập..." required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">HOT</label>
            <select name="phim_hot" class="form-control input-sm m-bot15">
                @if($danhsach_phim->phim_hot=='1'){
                    <option value="0">Không</option>
                    <option selected  value="1">Có</option>
                    }
                @else{
                    <option selected  value="0">Không</option>
                    <option  value="1">Có</option>
                    }
                @endif
            </select>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Phân giải</label>
            <select name="phan_giai" class="form-control input-sm m-bot15">
                @if($danhsach_phim->phan_giai=='0'){
                  <option selected value="0">SD</option>
                  <option value="1">HD</option>
                  <option value="2">Cam</option>
                  <option value="3">HDCam</option>
                  <option value="4">FullHD</option>
                  }
                @elseif($danhsach_phim->phan_giai=='1'){
                  <option value="0">SD</option>
                  <option selected value="1">HD</option>
                  <option value="2">Cam</option>
                  <option value="3">HDCam</option>
                  <option value="4">FullHD</option>
                  }
                @elseif($danhsach_phim->phan_giai=='2'){
                  <option value="0">SD</option>
                  <option value="1">HD</option>
                  <option selected value="2">Cam</option>
                  <option value="3">HDCam</option>
                  <option value="4">FullHD</option>
                }
                @elseif($danhsach_phim->phan_giai=='3'){
                  <option value="0">SD</option>
                  <option value="1">HD</option>
                  <option value="2">Cam</option>
                  <option selected value="3">HDCam</option>
                  <option value="4">FullHD</option>
                }
                @elseif($danhsach_phim->phan_giai=='4'){
                  <option value="0">SD</option>
                  <option value="1">HD</option>
                  <option value="2">Cam</option>
                  <option value="3">HDCam</option>
                  <option selected value="4">FullHD</option>
                }
                @endif
            </select>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Phụ đề</label>
            <select name="phu_de" class="form-control input-sm m-bot15">
                @if($danhsach_phim->phu_de=='1'){
                    <option value="0">VietSub</option>
                    <option selected  value="1">Thuyết Minh</option>
                    }
                @else{
                    <option selected  value="0">VietSub</option>
                    <option  value="1">Thuyết Minh</option>
                    }
                @endif
            </select>
          </div>

          <div class="form-group">
            <label for="productDescription">Thời Lượng</label>
            <input value="{{$danhsach_phim->thoi_luong}}" name="thoi_luong" type="text" class="form-control" placeholder="Thời lượng..." required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Chọn trạng thái</label>
            <select name="status" class="form-control input-sm m-bot15">
                @if($danhsach_phim->status=='1'){
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
      {{-- @endforeach --}}
    </div>
    <!-- /.box -->
  </div>
<!-- /.box -->
    </div>
  </div>
</section>
@endsection