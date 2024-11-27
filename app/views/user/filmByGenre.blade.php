<!-- ==========Movie-Section========== -->
<section class="movie-section padding-top padding-bottom">
    <div class="container">
        <div class="row flex-wrap-reverse justify-content-center">
            @php 
            include "app/views/aside.blade.php";
            @endphp
            <div class="col-lg-9 mb-50 mb-lg-0">
                <div class="filter-tab tab">
                    <div class="filter-area">
                        <div class="filter-main">
                            <ul class="grid-button tab-menu">
                                <li class="active">
                                    <i class="fas fa-th"></i>
                                </li>
                                <li>
                                    <i class="fas fa-bars"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-area">
                        <div class="tab-item active">
                            <div class="row mb-10 justify-content-center">
                                @foreach ($filmByGenre as $value)
                                    @php
                                        extract($value); 
                                    @endphp
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="movie-grid">
                                            <div class="movie-thumb c-thumb">
                                                <a href="{{BASE_URL}}filmDetails/{{$id}}">
                                                    <img src=".{{$image}}" alt="movie">
                                                </a>
                                            </div>
                                            <div class="movie-content bg-one">
                                                <h5 class="title m-0">
                                                    <a href="{{BASE_URL}}filmDetails/{{$id}}">{{$name_film}}</a>
                                                </h5>
                                                <ul class="movie-rating-percent">
                                                    <li>
                                                        <div class="thumb">
                                                            <img src="{{BASE_URL}}public/assets/images/movie/tomato.png" alt="movie">
                                                        </div>
                                                        <span class="content">88%</span>
                                                    </li>
                                                    <li>
                                                        <div class="thumb">
                                                            <img src="{{BASE_URL}}public/assets/images/movie/cake.png" alt="movie">
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
                        <div class="tab-item">
                            <div class="movie-area mb-10">
                                @foreach ($filmByGenre as $value) 
                                    @php 
                                    extract($value); 
                                    @endphp
                                    <div class="movie-list">
                                        <div class="movie-thumb c-thumb">
                                            <a href="{{BASE_URL}}filmDetails/{{$id}}" class="w-100 bg_img h-100" data-background=".{{$image}}">
                                                <img class="d-sm-none" src=".{{$image}}" alt="movie">
                                            </a>
                                        </div>
                                        <div class="movie-content bg-one">
                                            <h5 class="title">
                                                <a href="{{BASE_URL}}filmDetails/{{$id}}">{{$name_film}}</a>
                                            </h5>
                                            <p class="duration">2hrs 50 min</p>
                                            <div class="movie-tags">
                                                <a href="#0">{{$genre}}</a>
                                            </div>
                                            <div class="release">
                                                <span>Ngày khởi chiếu : </span> <a href="#0">{{$rel_date}}</a>
                                            </div>
                                            <ul class="movie-rating-percent">
                                                <li>
                                                    <div class="thumb">
                                                        <img src="{{BASE_URL}}public/assets/images/movie/tomato.png" alt="movie">
                                                    </div>
                                                    <span class="content">88%</span>
                                                </li>
                                                <li>
                                                    <div class="thumb">
                                                        <img src="{{BASE_URL}}public/assets/images/movie/cake.png" alt="movie">
                                                    </div>
                                                    <span class="content">88%</span>
                                                </li>
                                            </ul>
                                            <div class="book-area">
                                                <div class="book-ticket">
                                                    <div class="react-item">
                                                        <a href="#0">
                                                            <div class="thumb">
                                                                <img src="{{BASE_URL}}public/assets/images/icons/heart.png" alt="icons">
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="react-item mr-auto">
                                                        <a href="#0">
                                                            <div class="thumb">
                                                                <img src="{{BASE_URL}}public/assets/images/icons/book.png" alt="icons">
                                                            </div>
                                                            <span><a href="{{BASE_URL}}filmDetails/{{$id}}">Đặt vé</a></span>
                                                        </a>
                                                    </div>
                                                    <div class="react-item">
                                                        <a href="#0" class="popup-video">
                                                            <div class="thumb">
                                                                <img src="{{BASE_URL}}public/assets/images/icons/play-button.png" alt="icons">
                                                            </div>
                                                            <span>watch trailer</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="pagination-area text-center">
                        <a href="#0"><i class="fas fa-angle-double-left"></i><span>Prev</span></a>
                        <a href="#0">1</a>
                        <a href="#0">2</a>
                        <a href="#0" class="active">3</a>
                        <a href="#0">4</a>
                        <a href="#0">5</a>
                        <a href="#0"><span>Next</span><i class="fas fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Movie-Section========== -->
@php 
include "app/views/footer.blade.php";
@endphp