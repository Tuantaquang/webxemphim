<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Top Views</span>
                {{-- <ul class="halim-popular-tab" role="tablist">
                    <li role="presentation" class="active">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                            data-type="today">Day</a>
                    </li>
                    <li role="presentation">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                            data-type="week">Week</a>
                    </li>
                    <li role="presentation">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                            data-type="month">Month</a>
                    </li>
                    <li role="presentation">
                        <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                            data-type="all">All</a>
                    </li>
                </ul> --}}
            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">
                    @foreach($topview as $key=> $view)
                    <div class="item post-37176">
                        <a href="{{route('chi_tiet_phim',$view->slug)}}" title="{{$view->title}}">
                            <div class="item-link">
                                <img src="{{asset('upload/phim/'.$view->img)}}"
                                    class="lazy post-thumb" alt="{{$view->title}}"
                                    title="{{$view->title}}" />
                                <span class="is_trailer">
                                    @if ($view->phan_giai == 0)
                                    <span>SD</span>
                                    @elseif($view->phan_giai == 1)
                                    <span>HD</span>
                                    @elseif($view->phan_giai == 2)
                                    <span>Cam</span>
                                    @elseif($view->phan_giai == 3)
                                    <span>HDCam</span>
                                    @elseif($view->phan_giai == 4)
                                    <span>FullHD</span>
                                    @endif
                                </span>
                            </div>
                            <p class="title">{{$view->title}}</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">
                            @if($view->luotxem>0)
                                {{number_format($view->luotxem)}}
                                lượt xem
                            @else
                                @php
                                $views = rand(1000, 999999);
                                echo number_format($views);
                                @endphp
                                lượt xem
                            @endif
                        </div>
                        <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang"
                                style="display: block;/* width: 100%; */">
                                <span style="width: 0%"></span>
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
</aside>