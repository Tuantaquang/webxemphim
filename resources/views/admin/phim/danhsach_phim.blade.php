@extends('admin.layout.admin_layout')
@section('title','Admin | Quản lý Phim')
@section('title_pages','Quản Lý Phim')
@section('admin_content')

<section class="content">
  <div class="container-fuild">
    <div class="row">
        <!-- Default box -->
  <div class="col-xs-12">
    <div class="box ">
      <div class="box-header ">
      <a href="{{route('phim.create')}}" class="btn btn-success">+Thêm Phim</a>
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
              <th>Tên khác</th>
              <th>Thời Lượng</th>
              <th>Số Tập</th>
              <th>Hình ảnh</th>
              {{-- <th>Mô Tả</th> --}}
              <th>Danh Mục</th>
              <th>Thể Loại</th>
              <th>Phim thuộc Bộ/Lẻ</th>
              <th>HOT</th>
              <th>Phân giải</th>
              <th>Phụ đề</th>
              <th>Trạng thái</th>
              <th>Ngày tạo</th>
              <th>Ngày cập nhật</th>
              <Th>Năm</Th>
              <th>Top views</th>
              <th>Tùy chọn</th>
            </tr>
          </thead>
          <tbody>
            @foreach($danhsach_phim as $key => $ds)
            <tr>
              <td>{{$key}}</td>
              <td>{{$ds->title}}</td>
              <td>{{$ds->ten_khac}}</td>
              <td>{{$ds->thoi_luong}}</td>
              <td> 
                {{$ds->tapphim_count}}/{{$ds->sotap}}
                
                <a href="{{route('ds-tap',[$ds->id])}}" class="btn btn-success btn-sm">+thêm tập</a>
              </td>
              <td><img src="{{asset('upload/phim/'.($ds->img))}}" height="80" width="60"></td>
              {{-- <td>{{$ds->desc}}</td> --}}
              {{-- <td>{{$ds->danhmuc->title}}</td> --}}
              <td>
                @foreach($ds->danh_mucs as $list)
                  <span class="badge rounded-pill text-bg-dark">{{$list->title}}</span><br>
                @endforeach
              </td>

              <td>
                @foreach($ds->the_loais as $list)
                  <span class="badge rounded-pill text-bg-dark">{{$list->title}}</span><br>
                @endforeach
              </td>

              <td>
                @if ($ds->bo_le == 1)
                <span class="label label-danger">Phim Lẻ</span>
                @else
                <span class="label label-danger">Phim Bộ</span>
                @endif
              </td>

              <td>
                @if ($ds->phim_hot == 1)
                <span class="label label-info">Có</span>
                @else
                <span class="label label-warning">Không</span>
                @endif
              </td>
              <td>
                @if ($ds->phan_giai == 0)
                <span class="label label-danger">SD</span>
                @elseif($ds->phan_giai == 1)
                <span class="label label-danger">HD</span>
                @elseif($ds->phan_giai == 2)
                <span class="label label-danger">Cam</span>
                @elseif($ds->phan_giai == 3)
                <span class="label label-danger">HDCam</span>
                @elseif($ds->phan_giai == 4)
                <span class="label label-danger">FullHD</span>
                @endif
              </td>
              <td>
                @if ($ds->phu_de == 1)
                <span class="label label-danger">Thuyết minh</span>
                @else
                <span class="label label-danger">VietSub</span>
                @endif
              </td>
              <td>
                @if ($ds->status == 1)
                <span class="label label-success">Hiển thị</span>
                @else
                <span class="label label-danger">Ẩn</span>
                @endif
              </td>
              <td>{{$ds->ngay_tao}}</td>
              <td>{{$ds->ngay_cap_nhat}}</td>
              <td>
                <select name="year" class="select-year" id="{{ $ds->id }}">
                  <?php
                    $currentYear = date('Y');
                    $startYear = 2000;
                    for ($year = $startYear; $year <= $currentYear; $year++) {
                      $selected = $ds->nam == $year ? 'selected' : '';
                      echo "<option value=\"$year\" $selected>$year</option>";
                    }
                  ?>
                </select>
              </td>

              <td>
                <select name="top_views" class="select-topviews" id="{{ $ds->id }}">
                  <option value="0" {{ $ds->top_views == 0 ? 'selected' : '' }}>Không</option>
                  <option value="1" {{ $ds->top_views == 1 ? 'selected' : '' }}>Có</option>
                </select>
              </td>

              <td class="text-center">
                <a style="margin: 5px" href="{{route('phim.edit',$ds->id)}}" class="btn btn-success">Sửa</a>
                <form action="{{ route('phim.destroy', $ds->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Bạn có chắc chắn muốn xoá không?')" 
                    class="btn btn-danger" 
                    type="submit">Xoá</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <footer class="panel-footer">
          <div class="row" style="height: 60px;">
            <div class="col-sm-7 text-right ">
              {{ $danhsach_phim->appends(request()->all())->links('pagination::bootstrap-4') }}
            </div>
          </div>
        </footer>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.box -->
    </div>
  </div>

</section>
@endsection