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
                        @if(session('message'))
                            <div style="color: red; text-align: center; font-weight: bold">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    @foreach($list_tapphim as $key => $tp)
                    <form role="form" action="{{route('tap-phim.update',$tp->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                          
                            <div class="form-group">
                                <label for="phim">Tên phim:</label>
                                <input name="phim" type="text" class="form-control" value="{{$tp->phim->title}}" readonly>
                                <input name="id_phim" type="hidden" class="form-control" value="{{$tp->id_phim}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="link">Link phim</label>
                                <textarea name="linkphim" class="form-control" style="resize: none" rows="5" required>{{$tp->link}}</textarea>
                                
                            </div>

                            <div class="form-group">
                                <label for="tapphim">Tập Phim:  </label>
                                <input value="{{$tp->tap}}" name="tapphim" type="text" class="form-control" readonly>
                            </div>
                            @endforeach
                            <!-- /.box-body -->
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
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