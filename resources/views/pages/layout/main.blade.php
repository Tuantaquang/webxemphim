
@extends('layout')
@section('main-content')

<div class="row container" id="wrapper">
   <div class="halim-panel-filter">
      <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
         <div class="ajax"></div>
      </div>
   </div>
   {{-- //phim hot// --}}
      @include('pages.layout.phim_hot')
   {{--//////end-phim hot/////--}}

   <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
      <section id="halim-advanced-widget-2">
         <div class="section-heading">
            <a title="tất cả phim">
            <span class="h-text">Tất cả phim</span>
            </a>
         </div>
         <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
            @foreach($all_phim as $phim)
               <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                  <div class="halim-item">
                     <a class="halim-thumb" href="{{route('chi_tiet_phim',$phim->slug)}}">
                        <figure><img class="lazy img-responsive" 
                        src="{{asset('upload/phim/'.$phim->img)}}" alt="{{$phim->title}}" title="{{$phim->title}}"></figure>
                        @if($phim->bo_le == 0)
                           <span class="status">TẬP {{$phim->tapphim_count}}</span>
                        @else
                           <span class="status">{{$phim->thoi_luong}}</span>
                        @endif
                        <span class="episode">
                           <span>
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
                           <i class="fa fa-grip-lines-vertical" aria-hidden="true"></i> 
                           @if ($phim->phu_de == 1)
                              <span>Thuyết minh</span>
                           @else
                              <span>VietSub</span>
                           @endif
                        </span> 
                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                           <div class="halim-post-title ">
                              <p class="entry-title">{{$phim->title}}</p>
                              <p class="original_title">{{$phim->ten_khac}}</p>
                           </div>
                        </div>
                     </a>
                  </div>
               </article>
            @endforeach
         </div>
      </section>
      <div class="clearfix"></div>
      <div class="text-center">
         {{ $all_phim->links('pagination::bootstrap-4') }}
      </div>  
   </main>
   
   

   {{-- //side bar// --}}
   @include('pages.layout.sidebar')
   {{--end side bar--}}

   
</div>

    
@endsection
