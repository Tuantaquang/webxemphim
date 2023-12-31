{{-- <div class="col-xs-12 carausel-sliderWidget">
    <section id="halim-advanced-widget-4">
        <div class="section-heading">
           <a href="danhmuc.php" title="Phim Chiếu Rạp">
           <span class="h-text">Phim Đề Cử</span>
           </a>
           <ul class="heading-nav pull-right hidden-xs">
              <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12" data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Chiếu Rạp"></span></li>
           </ul>
        </div>
        <div id="halim-advanced-widget-4-ajax-box" class="halim_box">
            <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
              <div class="halim-item">
                 <a class="halim-thumb" href="{{route('chi_tiet_phim')}}" title="GÓA PHỤ ĐEN">
                    <figure><img class="lazy img-responsive" src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg" alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                    <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                    <div class="icon_overlay"></div>
                    <div class="halim-post-title-box">
                       <div class="halim-post-title ">
                          <p class="entry-title">GÓA PHỤ ĐEN</p>
                          <p class="original_title">Black Widow</p>
                       </div>
                    </div>
                 </a>
              </div>
           </article>
    
        </div>
     </section>
     <div class="clearfix"></div>
</div> --}}

<div id="halim_related_movies-2xx" class="wrap-slider">
   <div class="container">
   <div class="section-bar clearfix">
      <h3 class="section-title"><span>Phim Hot</span></h3>
   </div>
   <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
      @foreach($phim_hot as $key => $hot)
      <article class="thumb grid-item post-38498">
         <div class="halim-item">
            <a class="halim-thumb" href="{{route('chi_tiet_phim',$hot->slug)}}" title="{{$hot->title}}">
               <figure><img class="lazy img-responsive" 
                  src="{{asset('upload/phim/'.$hot->img)}}" alt="{{$hot->title}}" title="{{$hot->title}}">
               </figure>
               <span class="status">Tập {{$hot->tapphim_count}}</span>
               
               <span class="episode">
                  <span>
                     @if ($hot->phan_giai == 0)
                     <span>SD</span>
                     @elseif($hot->phan_giai == 1)
                     <span>HD</span>
                     @elseif($hot->phan_giai == 2)
                     <span>Cam</span>
                     @elseif($hot->phan_giai == 3)
                     <span>HDCam</span>
                     @elseif($hot->phan_giai == 4)
                     <span>FullHD</span>
                     @endif
                  </span>
                  {{-- <i class="fa fa-play" aria-hidden="true"></i>Vietsub --}}
                  <i class="fa fa-grip-lines-vertical" aria-hidden="true"></i> 
                     @if ($hot->phu_de == 1)
                        <span>Thuyết minh</span>
                    @else
                        <span>VietSub</span>
                    @endif
               </span>
               
               <div class="icon_overlay"></div>
               <div class="halim-post-title-box">
                  <div class="halim-post-title ">
                     <p class="entry-title">{{$hot->title}}</p>
                     <p class="original_title">{{$hot->ten_khac}}</p>
                  </div>
               </div>
            </a>
         </div>
      </article>
      @endforeach
   </div>
   <script>
      jQuery(document).ready(function($) {				
      var owl = $('#halim_related_movies-2');
      owl.owlCarousel({loop: true,margin: 5,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,
         navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
         responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 5}}})});
   </script>
   </div>
</div>