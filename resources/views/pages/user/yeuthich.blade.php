@extends('layout')
@section('main-content')

<div class="row container" id="wrapper">
   <div class="halim-panel-filter">
      <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
         <div class="ajax"></div>
      </div>
   </div>
   <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
      <section>
         <div class="section-bar clearfix">
            <h1 class="section-title">
               <span>Danh Sách Yêu thích: {{Auth::user()->name}}</span>
               @if(isset($danhsach->id_user))
               <span class="pull-right">
                  <form action="{{ route('yeuthich.destroy', $danhsach->id_user) }}" method="POST">
                     @csrf
                     @method('DELETE')
                     <button onclick="return confirm('Bạn có chắc chắn muốn xoá không?')" 
                     class="btn btn-danger" 
                     type="submit">clear all</button>
                 </form>
               </span>
               @endif
               
            </h1>

            
           
         </div>
         <div class="halim_box">
            @foreach($danhsach_yt as $key =>$yt)
            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
               <div class="halim-item">
                  <a class="halim-thumb" href="{{route('chi_tiet_phim',$yt->phim->slug)}}" title="{{$yt->phim->title}}">
                     <figure><img class="lazy img-responsive" 
                        src="{{asset('upload/phim/'.$yt->phim->img)}}" alt="{{$yt->phim->title}}" title="{{$yt->phim->title}}"></figure>

                     @if($yt->phim->bo_le == 0)
                        <span class="status">{{$yt->tapphim_count}}/{{$yt->phim->sotap}}</span>
                     @else
                        <span class="status">{{$yt->phim->thoi_luong}}</span>
                     @endif

                     <span class="episode">
                        <span>
                           @if ($yt->phim->phan_giai == 0)
                           <span>SD</span>
                           @elseif($yt->phim->phan_giai == 1)
                           <span>HD</span>
                           @elseif($yt->phim->phan_giai == 2)
                           <span>Cam</span>
                           @elseif($yt->phim->phan_giai == 3)
                           <span>HDCam</span>
                           @elseif($yt->phim->phan_giai == 4)
                           <span>FullHD</span>
                           @endif
                        </span>
                        <i class="fa fa-grip-lines-vertical" aria-hidden="true"></i> 
                        @if ($yt->phim->phu_de == 1)
                           <span>Thuyết minh</span>
                        @else
                           <span>VietSub</span>
                        @endif
                     </span> 
                     <div class="icon_overlay"></div>
                     <div class="halim-post-title-box">
                        <div class="halim-post-title ">
                           <p class="entry-title">{{$yt->phim->title}}</p>
                           <p class="original_title">{{$yt->phim->ten_khac}}</p>
                        </div>
                     </div>
                  </a>
               </div>
            </article>
            @endforeach
         </div>
         <div class="clearfix"></div>
         <div class="text-center">
            {{ $danhsach_yt->links('pagination::bootstrap-4') }}
         </div>
      </section>
   </main>

   @include('pages.layout.sidebar')

</div>
@endsection