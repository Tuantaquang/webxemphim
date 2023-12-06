@extends('layout')
@section('main-content')


<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
       <div class="panel-heading">
          <div class="row">
             <div class="col-xs-6">
                <div class="yoast_breadcrumb hidden-xs">
                  <span>
                     <span><a href="{{route('danhmuc',$phim_ct->danhmuc->slug)}}">{{$phim_ct->danhmuc->title}}</a> » 
                        <span>
                           @foreach($phim_ct->the_loais as $tls)
                           <a href="{{route('theloai',$tls->slug)}}">
                              {{$tls->title}}
                           </a> » 
                           @endforeach
                           <span><a href="{{route('nam',$phim_ct->nam)}}">{{$phim_ct->nam}}</a> » 
                              <span class="breadcrumb_last" aria-current="page">{{$phim_ct->title}}</span>
                           </span>
                        </span>
                     </span>
                  </span>
                  </div>
             </div>
          </div>
       </div>
       <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
          <div class="ajax"></div>
       </div>
    </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
       <section id="content" class="test">
          <div class="clearfix wrap-content">
            
             <div class="halim-movie-wrapper">
                
                <div class="movie_info col-xs-12">
                   <div class="movie-poster col-md-3">
                      <img style="margin-top: 20px" class="movie-thumb mt-3" src="{{asset('upload/phim/'.$phim_ct->img)}}" alt="{{$phim_ct->title}}" title="{{$phim_ct->title}}">

                      <div class="bwa-content">
                         <div class="loader"></div>
                         <a href="{{url('xem-phim/'.$phim_ct->slug.'/tap-'.$tap_moinhat->tap)}}" class="bwac-btn">
                         <i class="fa fa-play"></i>
                         </a>
                      </div>

                   </div>
                   <div class="film-poster col-md-9">
                      <h1 class="movie-title title-1" 
                        style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: 
                        uppercase;font-size: 18px;">{{$phim_ct->title}}
                     </h1>
                      <h2 class="movie-title title-2" style="font-size: 12px;">{{$phim_ct->ten_khac}} ({{$phim_ct->nam}})</h2>
                      <ul class="list-info-group">
                         <li class="list-info-group-item">
                           <span>Trạng Thái</span> : 
                           <span class="quality">
                              @if ($phim_ct->phan_giai == 0)
                              <span>SD</span>
                              @elseif($phim_ct->phan_giai == 1)
                              <span>HD</span>
                              @elseif($phim_ct->phan_giai == 2)
                              <span>Cam</span>
                              @elseif($phim_ct->phan_giai == 3)
                              <span>HDCam</span>
                              @elseif($phim_ct->phan_giai == 4)
                              <span>FullHD</span>
                              @endif
                           </span>
                           <span class="episode">
                              @if ($phim_ct->phu_de == 1)
                              <span>Thuyết minh</span>
                              @else
                              <span>VietSub</span>
                              @endif
                           </span>
                           </li>
                           <li class="list-info-group-item"><span>Thời lượng</span> : {{$phim_ct->thoi_luong}}</li>
                           <li class="list-info-group-item"><span>Danh mục</span> : 
                            <a href="{{route('danhmuc',$phim_ct->danhmuc->slug)}}">{{$phim_ct->danhmuc->title}}</a>
                           </li>
                           <li class="list-info-group-item"><span>Thể loại</span> : 
                              @foreach($phim_ct->the_loais as $tls)
                                 <a href="{{route('theloai',$tls->slug)}}">{{$tls->title}}</a> |
                              @endforeach 
                           </li>
                           
                           @if($phim_ct->bo_le == 0)
                           <li class="list-info-group-item"><span>Mới Nhất</span> : 
                              <a class="btn btn-success" >Tập {{$tap_moinhat->tap}}</a>
                           </li>
                           @else
                           <li class="list-info-group-item"><span>Mới Nhất</span> : 
                              <a class="btn btn-success" > Full</a>
                           </li>
                           @endif

                           <li class="list-info-group-item">
                              <a href="{{url('xem-phim/'.$phim_ct->slug.'/tap-'.$tap_moinhat->tap)}}" class="btn btn-danger">
                                 <i class="fa fa-play"> Xem Phim</i>
                              </a>
                           </li>
                           @guest
                           <li class="list-info-group-item">
                              <a href="{{ route('user_login') }}" class="btn btn-warning" onclick="showAlert()">
                                 <i class="fa fa-heart"> Yêu thích</i>
                              </a>
                           </li>
                           @else
                              
                              @if(in_array($phim_ct->id , $ds_yeuthich))
                              <li class="list-info-group-item">
                                 <a href="" class="btn btn-warning" onclick="showAlert1()">
                                    <i class="fa fa-heart"> Yêu thích</i>
                                 </a>
                              </li>
                              @else
                              <li class="list-info-group-item">
                                 <form action="{{ route('yeuthich.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_phim" value="{{ $phim_ct->id }}">
                                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                    <button type="submit" class="btn btn-warning" onclick="showAlert2()">
                                        <i class="fa fa-heart"></i> Yêu thích
                                    </button>
                                </form>
                              </li>
                              @endif
                              
                           @endguest
                        </ul>
                        
                      <div class="movie-trailer hidden"></div>
                   </div>
                </div>
             </div>
             <div class="clearfix"></div>
               <div id="halim-list-server">
                  <div class="tab-content">
                     <div role="tabpanel" class="tab-pane active server-1" id="server-0">
                        <div class="entry-content htmlwrap clearfix">
                           <div class="video-item halim-entry-box">
                              <div class="halim-server">
                                 <ul class="halim-list-eps">
                                    @if($phim_ct->bo_le == 0)
                                       @foreach($all_tap as $key => $sotap)
                                          <a href="{{url('xem-phim/'.$phim_ct->slug.'/tap-'.$sotap->tap)}}" >
                                             <li class="halim-episode">
                                                <span class="halim-btn halim-btn-2 {{$key==0 ? 'active' : ''}} halim-info-1-1 box-shadow" 
                                                data-post-id="37976" data-server="1" data-episode="1" data-position="first" 
                                                data-embed="0" data-title="Xem phim {{$phim_ct->title}} - Tập {{$sotap->tap}} - {{$phim_ct->ten_khac}} - vietsub + Thuyết Minh" 
                                                data-h1="{{$phim_ct->title}} - tập {{$sotap->tap}}">{{$sotap->tap}}</span>
                                             </li>
                                          </a>
                                       @endforeach
                                    @else
                                       Full
                                    @endif
                                 </ul>
                                 <div class="clearfix"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

             <div class="section-bar clearfix">
               <h2 class="section-title"><span style="color:#ffed4d">Nội Dung Phim</span></h2>
            </div>
            <div class="entry-content htmlwrap clearfix">
               <div class="video-item halim-entry-box">
                  <article id="post-38424" class="item-content">
                     Phim - <a href="https://phimhay.co/goa-phu-den-38424/">{{$phim_ct->title}}</a> - {{$phim_ct->nam}}:
                     <p>{{$phim_ct->desc}}</p>
                     
                  </article>
               </div>
            </div>
          </div>
       </section>
       {{-- <section class="related-movies">
          <div id="halim_related_movies-2xx" class="wrap-slider">
             <div class="section-bar clearfix">
                <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
             </div>
             <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                <article class="thumb grid-item post-38498">
                   <div class="halim-item">
                      <a class="halim-thumb" href="chitiet.php" title="Đại Thánh Vô Song">
                         <figure><img class="lazy img-responsive" src="https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&no_expand=1&refresh=604800&url=https://1.bp.blogspot.com/-w860_-tiHFI/YO7DW5hwmNI/AAAAAAAAJqg/yFXRsVIh70oslGUKU4Fg3NxipcmCiPt3ACLcBGAsYHQ/s320/unnamed.jpg" alt="Đại Thánh Vô Song" title="Đại Thánh Vô Song"></figure>
                         <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">Đại Thánh Vô Song</p>
                               <p class="original_title">Monkey King: The One And Only</p>
                            </div>
                         </div>
                      </a>
                   </div>
                </article>
                  <article class="thumb grid-item post-38498">
                   <div class="halim-item">
                      <a class="halim-thumb" href="chitiet.php" title="Đại Thánh Vô Song">
                         <figure><img class="lazy img-responsive" src="https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&no_expand=1&refresh=604800&url=https://1.bp.blogspot.com/-w860_-tiHFI/YO7DW5hwmNI/AAAAAAAAJqg/yFXRsVIh70oslGUKU4Fg3NxipcmCiPt3ACLcBGAsYHQ/s320/unnamed.jpg" alt="Đại Thánh Vô Song" title="Đại Thánh Vô Song"></figure>
                         <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">Đại Thánh Vô Song</p>
                               <p class="original_title">Monkey King: The One And Only</p>
                            </div>
                         </div>
                      </a>
                   </div>
                </article>
                  <article class="thumb grid-item post-38498">
                   <div class="halim-item">
                      <a class="halim-thumb" href="chitiet.php" title="Đại Thánh Vô Song">
                         <figure><img class="lazy img-responsive" src="https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&no_expand=1&refresh=604800&url=https://1.bp.blogspot.com/-w860_-tiHFI/YO7DW5hwmNI/AAAAAAAAJqg/yFXRsVIh70oslGUKU4Fg3NxipcmCiPt3ACLcBGAsYHQ/s320/unnamed.jpg" alt="Đại Thánh Vô Song" title="Đại Thánh Vô Song"></figure>
                         <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">Đại Thánh Vô Song</p>
                               <p class="original_title">Monkey King: The One And Only</p>
                            </div>
                         </div>
                      </a>
                   </div>
                </article>
                  <article class="thumb grid-item post-38498">
                   <div class="halim-item">
                      <a class="halim-thumb" href="chitiet.php" title="Đại Thánh Vô Song">
                         <figure><img class="lazy img-responsive" src="https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&no_expand=1&refresh=604800&url=https://1.bp.blogspot.com/-w860_-tiHFI/YO7DW5hwmNI/AAAAAAAAJqg/yFXRsVIh70oslGUKU4Fg3NxipcmCiPt3ACLcBGAsYHQ/s320/unnamed.jpg" alt="Đại Thánh Vô Song" title="Đại Thánh Vô Song"></figure>
                         <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">Đại Thánh Vô Song</p>
                               <p class="original_title">Monkey King: The One And Only</p>
                            </div>
                         </div>
                      </a>
                   </div>
                </article>
                  <article class="thumb grid-item post-38498">
                   <div class="halim-item">
                      <a class="halim-thumb" href="chitiet.php" title="Đại Thánh Vô Song">
                         <figure><img class="lazy img-responsive" src="https://images2-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&no_expand=1&refresh=604800&url=https://1.bp.blogspot.com/-w860_-tiHFI/YO7DW5hwmNI/AAAAAAAAJqg/yFXRsVIh70oslGUKU4Fg3NxipcmCiPt3ACLcBGAsYHQ/s320/unnamed.jpg" alt="Đại Thánh Vô Song" title="Đại Thánh Vô Song"></figure>
                         <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                         <div class="icon_overlay"></div>
                         <div class="halim-post-title-box">
                            <div class="halim-post-title ">
                               <p class="entry-title">Đại Thánh Vô Song</p>
                               <p class="original_title">Monkey King: The One And Only</p>
                            </div>
                         </div>
                      </a>
                   </div>
                </article>
               
             </div>
             <script>
                jQuery(document).ready(function($) {				
                var owl = $('#halim_related_movies-2');
                owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
             </script>
          </div>
       </section> --}}
    </main>
    <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4"></aside>
    @include('pages.layout.sidebar')
 </div>
 <script>
   function showAlert() {
      alert("Bạn cần đăng nhập để thêm vào danh sách yêu thích.");
   }
</script>

<script>
   function showAlert1() {
      alert("Phim đã có trong danh sách yêu thích");
   }
</script>

<script>
   function showAlert2() {
      alert("Thêm vào danh sách yêu thích Thành công");
   }
</script>
 @endsection