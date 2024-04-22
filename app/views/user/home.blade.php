
<!-- ==========Banner-Section========== -->
<section class="banner-section">
        <div class="banner-bg bg_img bg-fixed" data-background="public/assets/images/banner/banner01.jpg"></div>
        <div class="container">
            <div class="banner-content">
                <h1 class="title  cd-headline clip"><span class="d-block">Đặt vé</span>
                    <span class="color-theme cd-words-wrapper p-0 m-0">
                        <b class="is-visible">Xem phim</b>
                        <b>FPOLY Cinema</b>
                    </span>
                </h1>
            </div>
        </div>
    </section>
    <!-- ==========Banner-Section========== -->

<!-- ==========Movie-Main-Section========== -->
<section class="movie-section padding-top padding-bottom bg-two">
    <div class="container">
        <div class="row flex-wrap-reverse justify-content-center">
            <div class="col-lg-3 col-sm-10  mt-50 mt-lg-0">
                <div class="widget widget-search">
                    <!-- <h5 class="title">tìm kiếm</h5> -->
                    <form class="search-form" action="index.php?act=movie" method="post">
                        <input type="text" name="kyw" placeholder="Tìm kiếm phim" required>
                        <input type="submit" value="Tìm kiếm" name="btn-search" class="btn btn-primary rounded ">
                    </form>
                </div>
                <div class="widget-1 widget-trending-search">
                    <h3 class="title">Thể Loại</h3>
                    <div class="widget-1-body">
                        <ul>
                            <?php
                            if (isset($listGenre)) {
                                foreach ($listGenre as $value) {
                                    extract($value); ?>
                                    <li>
                                        <h6 class="sub-title">
                                            <a href="index.php?act=film_by_genre/{{$id}}">{{$name}}</a>
                                        </h6>
                                    </li>
                            <?php
                                }
                            } ?>


                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="article-section padding-bottom">
                    <div class="section-header-1">
                        <h2 class="title">Phim Hoạt Hình</h2>
                        </form>
                    </div>
                    <div class="row mb-30-none justify-content-center">
                        @foreach ($filmCartoon as $value)
                            @php
                                extract($value);
                            @endphp
                            <div class="col-sm-6 col-lg-4">
                                <div class="movie-grid">
                                    <div class="movie-thumb c-thumb">
                                        <a href="filmDetails/{{$id}}">
                                            <img src="{{$image}}" alt="movie">
                                        </a>
                                    </div>
                                    <div class="movie-content bg-one" style="height: 160px;">
                                        <h5 class="title m-0 ">
                                            <a href="filmDetails/{{$id}}" class="">{{$name}}</a>
                                        </h5>
                                        <ul class="movie-rating-percent">
                                            <li>
                                                <div class="thumb">
                                                    <img src="public/assets/images/movie/tomato.png" alt="movie">
                                                </div>
                                                <span class="content">88%</span>
                                            </li>
                                            <li>
                                                <div class="thumb">
                                                    <img src="public/assets/images/movie/cake.png" alt="movie">
                                                </div>
                                                <span class="content">88%</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="article-section padding-bottom">
                    <div class="section-header-1">
                        <h2 class="title">Phim Hài</h2>
                        <!-- <a class="view-all" href="index.php?act=film_by_genre/<?php echo $genre ?>">View All</a> -->
                    </div>
                    <div class="row mb-30-none justify-content-center">
                        @foreach ($filmRomantic as $value)
                        @php
                            extract($value);
                        @endphp
                            <div class="col-sm-6 col-lg-4">
                                <div class="movie-grid">
                                    <div class="movie-thumb c-thumb">
                                        <a href="filmDetails/{{$id}}">
                                            <img src="{{$image}}" alt="movie">
                                        </a>
                                    </div>
                                    <div class="movie-content bg-one" style="height: 160px;">
                                        <h5 class="title m-0">
                                            <a href="filmDetails/{{$id}}">{{$name}}</a>
                                        </h5>
                                        <ul class="movie-rating-percent">
                                            <li>
                                                <div class="thumb">
                                                    <img src="public/assets/images/movie/tomato.png" alt="movie">
                                                </div>
                                                <span class="content">88%</span>
                                            </li>
                                            <li>
                                                <div class="thumb">
                                                    <img src="public/assets/images/movie/cake.png" alt="movie">
                                                </div>
                                                <span class="content">88%</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ==========Movie-Main-Section========== -->
@php
include "app/views/footer.blade.php";
@endphp