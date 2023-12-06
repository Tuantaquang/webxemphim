@extends('admin.layout.admin_layout')
@section('title','Admin | Quản lý tập Phim')
@section('title_pages','Quản Lý tập Phim')
@section('admin_content')

<section class="content">
  <div class="container-fuild">
        <div class="row">
            <!-- Default box -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thêm mới tập Phim</h3>
                    </div>
                    @if(session('message'))
                        <div style="color: red; text-align: center; font-weight: bold">
                            {{ session('message') }}
                        </div>
                    @endif
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('tap-phim.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="phim">Chọn phim:</label>
                                <select name="id_phim" id="phim" class="chon-phim form-control">
                                    <option value="0">---chọn phim---</option>
                                    <?php
                                    foreach ($list_phim as $phim_id => $phim_name) {
                                        // $selected = isset($tapphim) && $tapphim->id_phim == $phim_id ? 'selected' : '';
                                        echo "<option value=\"$phim_id\">$phim_name</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="link">Link phim</label>
                                <input name="linkphim" type="text" class="form-control" placeholder="link..." required>
                            </div>

                            <div class="form-group">
                                <label for="tapphim">Tập Phim</label>
                                <select name="tapphim" class="form-control" id="select_phim">
                                    
                                </select>
                            </div>
                        
                            <!-- /.box-body -->
                        </div>
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