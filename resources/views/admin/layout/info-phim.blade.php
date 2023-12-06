@extends('admin.layout.admin_main')
@section('content')

<div class="container">
    <style>
        .box-inf{
            display: flex;
            background:aqua;
            border: 2px black solid;

        }

        .box-inf .image-container{
            flex: 0 0 auto;
            margin-right: 10px;
            width: 320px;
            height: 450px;
        }

        .box-inf .content-container{
            flex: 1 1 auto;
            margin: 5px
        }
    </style>
    <div class="box-inf">
        <div class="image-container">
            <img style="width: 300px; height: 450px; margin: 10px" src="{{asset('upload/phim/'.($phim->img))}}">
        </div>
        <div class="content-container">
            <h2>{{$phim->title}}</h2>
            <h4>{{$phim->ten_khac}}</h4>
            <ul class="list-group">
                <li class="list-group-item">
                    <span>Phân Giải</span> : 
                    <span class="quality">
                        @if ($phim->phan_giai == 0)
                        <span>SD</span>
                        @elseif($phim->phan_giai == 1)
                        <span>HD</span>
                        @elseif($phim->phan_giai == 2)
                        <span>Cam</span>
                        @elseif($phim->phan_giai == 3)
                        <span>HDCam</span>
                        @elseif($phim->phan_giai == 4)
                        <span>FullHD</span>
                        @endif
                    </span>
                </li>
                <li class="list-group-item">
                    Thời Lượng:{{$phim->thoi_luong}}
                </li>
                <li class="list-group-item">
                    <span>Trạng thái</span> : 
                    <span class="episode">
                        @if ($phim->phu_de == 1)
                        <span>Thuyết minh</span>
                        @else
                        <span>VietSub</span>
                        @endif
                     </span>
                </li>
                <li class="list-group-item">Thời Lượng:  {{$phim->thoi_luong}}</li>
                <li class="list-group-item">Sô tập: {{$phim->sotap}} tập</li>
                <li class="list-group-item">Lượt xem: {{$phim->luotxem}} views</li>
                <li class="list-group-item">Mô tả: {{$phim->desc}}</li>
            </ul>
            <a style="margin: 5px text-center" href="{{route('phim.edit',$phim->id)}}" class="btn btn-danger">Chỉnh sửa thông tin phim</a>
        </div>
    </div>
</div>

@endsection