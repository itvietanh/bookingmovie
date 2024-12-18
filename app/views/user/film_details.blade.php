@php
extract($filmDetails);
@endphp

@if (!empty($listOderSeat))
@foreach ($listOderSeat as $key => $seats)
$bookedSeats[] = $seats['seat_order'];
@endforeach
$check_seat = implode(",", $bookedSeats);
@endif

@php
include "public/global.php"
@endphp


<?php
if (isset($_SESSION['auth'])) {
    unset($_SESSION['redirect_url']);
}
?>



<section class="details-banner bg_img" data-background="{{BASE_URL}}public/assets/images/banner/banner03.jpg">
    <div class="container">
        <div class="details-banner-wrapper">
            <div class="details-banner-thumb">
                <img src="{{BASE_URL . $image}}" alt="movie">
                <a href="https://www.youtube.com/embed/KGeBMAgc46E" class="video-popup">
                    <img src="{{BASE_URL}}public/assets/images/movie/video-button.png" alt="movie">
                </a>
            </div>
            <div class="details-banner-content offset-lg-3">
                <h3 class="title">{{$name_film}}</h3>
                <div class="tags">
                    <a href="#0">English</a>
                    <a href="#0">Hindi</a>
                    <a href="#0">Telegu</a>
                    <a href="#0">Tamil</a>z
                </div>
                <a href="#0" class="button">{{$genre_name}}</a>
                <div class="social-and-duration">
                    <div class="duration-area">
                        <div class="item">
                            <i class="fas fa-calendar-alt"></i><span>{{$rel_date}}</span>
                        </div>
                        <div class="item">
                            <i class="far fa-clock"></i><span>2 hrs 50 mins</span>
                        </div>
                    </div>
                    <ul class="social-share">
                        <li><a href="#0"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#0"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#0"><i class="fab fa-pinterest-p"></i></a></li>
                        <li><a href="#0"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#0"><i class="fab fa-google-plus-g"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ==========Banner-Section========== -->

<!-- ==========Book-Section========== -->
<section class="book-section bg-one">
    <div class="container">
        <div class="book-wrapper offset-lg-3">
            <div class="left-side">
                <div class="item">
                    <div class="item-header">
                        <div class="thumb">
                            <img src="{{BASE_URL}}public/assets/images/movie/tomato2.png" alt="movie">
                        </div>
                        <div class="counter-area">
                            <span class="counter-item odometer" data-odometer-final="88">0</span>
                        </div>
                    </div>
                    <p>tomatometer</p>
                </div>
                <div class="item">
                    <div class="item-header">
                        <div class="thumb">
                            <img src="{{BASE_URL}}public/assets/images/movie/cake2.png" alt="movie">
                        </div>
                        <div class="counter-area">
                            <span class="counter-item odometer" data-odometer-final="88">0</span>
                        </div>
                    </div>
                    <p>audience Score</p>
                </div>
                <div class="item">
                    <div class="item-header">
                        <h5 class="title">4.5</h5>
                        <div class="rated">
                            <i class="fas fa-heart"></i>
                            <i class="fas fa-heart"></i>
                            <i class="fas fa-heart"></i>
                            <i class="fas fa-heart"></i>
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>
                    <p>Users Rating</p>
                </div>
                <div class="item">
                    <div class="item-header">
                        <div class="rated rate-it">
                            <i class="fas fa-heart"></i>
                            <i class="fas fa-heart"></i>
                            <i class="fas fa-heart"></i>
                            <i class="fas fa-heart"></i>
                            <i class="fas fa-heart"></i>
                        </div>
                        <h5 class="title">0.0</h5>
                    </div>
                    <p><a href="#0">Rate It</a></p>
                </div>
            </div>

            @if(isset($_SESSION['auth']) && $_SESSION['auth'])
            <a href="#"> <button type="button" class="custom-button" data-bs-toggle="modal" data-bs-target="#myShowTime">Đặt vé</button></a>
            @else
            @php
            $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
            @endphp
            <p class="text-danger"><a href="{{BASE_URL}}login">Đăng nhập</a> để đặt vé!</p>
            @endif


            <!-- lịch Chiếu : Hidden -->
            <div class="modal fade w-100" id="myShowTime">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content" style="background: #001232;">

                        <!-- Modal Header -->
                        <div class="mx-auto">
                            <h5 class="modal-title text-text-white card-title my-3">LỊCH CHIẾU: {{$name_film}}</h5>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <section class="book-section bg-one">
                                <div class="container">
                                    <form class="ticket-search-form" action="" method="post">
                                        <div class="form-group">
                                            <div class="thumb">
                                                <img src="{{BASE_URL}}public/assets/images/ticket/date.png" alt="ticket">
                                            </div>
                                            <span class="type">Ngày Chiếu</span>
                                            <select class="select-bar" id="selectDate" name="selectDate" required="" style="display: none;">

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <div class="thumb">
                                                <img src="{{BASE_URL}}public/assets/images/ticket/date.png" alt="ticket">
                                            </div>
                                            <span class="type">Phòng Chiếu</span>

                                            <select class="select-bar" name="selectRoom" id="selectRoom" onchange="checkRoom()" required="" style="display: none;">
                                                <option value="0">Lựa Chọn</option>
                                                @foreach ($room as $value)
                                                @php
                                                extract($value);
                                                @endphp
                                                <option value="{{$id}}">{{$name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary " name="btnSubmit" class="showTime" value="Xem Suất Chiếu">
                                        </div>
                                        <div class="ticket-plan-section padding-bottom padding-top" style="width: 1200px;">
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-9 mb-5 mb-lg-0">
                                                        <ul class="seat-plan-wrapper bg-five">
                                                            <li>
                                                                <div class="movie-name">
                                                                    <div class="icons">
                                                                        <i class="far fa-heart"></i>
                                                                        <i class="fas fa-heart"></i>
                                                                    </div>
                                                                    <a href="#0" class="name" style="font-size: 14px;">Rạp: FPOLY Cinema</a>
                                                                    <div class="location-icon">
                                                                        <i class="fas fa-map-marker-alt"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="movie-schedule">
                                                                    <div class="" id="showTime">

                                                                    </div>
                                                                    <p id="roomSelectionMessage" style="display: none; color: red;">Hãy chọn phòng chiếu để hiển thị lịch chiếu.</p>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </section>


                        </div>

                        <!-- Modal footer -->
                        <div class="">
                            <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->
                        </div>

                    </div>
                </div>
            </div>

            <!-- Chỗ ngồi: Hidden -->

            <div class="modal fade w-100" id="mySeat">
                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content" style="background: #001232;">

                        <!-- Modal Header -->
                        <div class="mx-auto">
                            <h5 class="modal-title text-text-white card-title my-3">{{$name_film}}</h5>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="seat-plan-section padding-bottom ">
                                <div class="container">
                                    <div class="screen-area">
                                        <div class="screen-thumb">
                                            <img src="{{BASE_URL}}public/assets/images/movie/screen-thumb.png" alt="movie">
                                        </div>
                                        <!-- <h5 class="subtitle">Màn Hình Chiếu</h5> -->
                                        <div class="status_seat" style="display: flex;justify-content: center;">
                                            <div class="status" style="display: flex;margin: 1em; align-items: center;">
                                                <div style="border-radius: 5px;width: 20px;height: 20px;border: 1px solid gray;margin-right: 5px"></div>
                                                <span style="color: white"> Ghế trống</span>
                                            </div>
                                            <div class="status" style="display: flex;margin: 1em; align-items: center;">
                                                <div style="border-radius: 5px;width: 20px;height: 20px;border: 1px solid gray;margin-right: 5px;background-color: rgb(255, 255, 255);"></div>
                                                <span style="color: white"> Ghế đang chọn</span>
                                            </div>
                                            <div class="status" style="display: flex;margin: 1em; align-items: center;">
                                                <div style="border-radius: 5px;width: 20px;height: 20px;border: 1px solid gray;margin-right: 5px;background-color: #ff3131;"></div>
                                                <span style="color: white"> Ghế đã được chọn</span>
                                            </div>
                                        </div>
                                        <form action="" method="post">
                                            <div class="screen-wrapper">
                                                <ul class="seat-area">
                                                    <li class="seat-line" style="flex-flow: column;">
                                                        <ul class="seat--area seat-title">
                                                            <li class="front-seat">
                                                                <?php foreach ($seat as $key => $value) {
                                                                ?>
                                                                    <ul>
                                                                        <span><?php echo $key ?></span>
                                                                        <?php foreach ($value as $key2 => $value2) {
                                                                        ?>

                                                                            <li class="single-seat">
                                                                                <!--                                                    <img src="assets/images/movie/seat01.png" alt="seat">-->
                                                                                <span class="sit-num"><?php echo $key . $value2 ?></span>
                                                                            </li>
                                                                        <?php
                                                                        } ?>
                                                                    </ul>
                                                                <?php
                                                                } ?>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                    </div>
                                    </form>
                                    <div class="proceed-book bg_img" data-background="assets/images/movie/movie-bg-proceed.jpg" style="background-image: url(&quot;assets/images/movie/movie-bg-proceed.jpg&quot;);">
                                        <div class="proceed-to-book">
                                            <div class="book-item">
                                                <span>You have Choosed Seat</span>
                                                <h3 class="title" id="title-seat"></h3>
                                            </div>

                                            <div class="book-item">
                                                <form id="submitCheckout" action="{{BASE_URL}}checkout" method="post">
                                                    <span>total price</span>
                                                    <input type="hidden" id="hidden_price" value="<?php echo $ticketPrice['price'] ?>">
                                                    <input type="hidden" name="nameFilm" value="{{$name_film}}">
                                                    <input type="hidden" name="idFilm" value="{{$id_film}}">
                                                    <input type="hidden" id="select_seat" name="selected_seats">
                                                    <input type="hidden" id="mul_price" name="price">
                                                    <input type="hidden" id="hidden_quantity" name="hidden_quantity">
                                                    <input type="hidden" id="orderRoom" name="orderRoom">
                                                    <input type="hidden" id="orderDate" name="orderDate">
                                                    <input type="hidden" id="nameRoom" name="nameRoom">
                                                    <input type="hidden" id="nameCinema" name="nameCinema">
                                                    <input type="hidden" id="startTime" name="startTime">
                                                    <input type="hidden" id="endTime" name="endTime">
                                                    <input type="hidden" id="idShowTime" name="idShowTime">

                                                    <h3 class="title" id="price"></h3>
                                                    <input type="submit" class="custom-button" name="btnSubmit" value="Đặt vé">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="">
                            <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
</section>
<!-- ==========Book-Section========== -->

<!-- ==========Movie-Section========== -->
<section class="movie-details-section padding-top padding-bottom">
    <div class="container">
        <div class="row justify-content-center flex-wrap-reverse mb--50">
            <!-- @php
                include "app/views/aside.blade.php";
            @endphp -->
            <div class="col-lg-9 mb-50">
                <div class="movie-details">
                    <h3 class="title">photos</h3>
                    <div class="details-photos owl-carousel">
                        <div class="thumb">
                            <a href="{{BASE_URL}}public/assets/images/movie/movie-details01.jpg" class="img-pop">
                                <img src="{{BASE_URL}}public/assets/images/movie/movie-details01.jpg" alt="movie">
                            </a>
                        </div>
                        <div class="thumb">
                            <a href="{{BASE_URL}}public/assets/images/movie/movie-details02.jpg" class="img-pop">
                                <img src="{{BASE_URL}}public/assets/images/movie/movie-details02.jpg" alt="movie">
                            </a>
                        </div>
                        <div class="thumb">
                            <a href="{{BASE_URL}}public/assets/images/movie/movie-details03.jpg" class="img-pop">
                                <img src="{{BASE_URL}}public/assets/images/movie/movie-details03.jpg" alt="movie">
                            </a>
                        </div>
                        <div class="thumb">
                            <a href="{{BASE_URL}}public/assets/images/movie/movie-details01.jpg" class="img-pop">
                                <img src="{{BASE_URL}}public/assets/images/movie/movie-details01.jpg" alt="movie">
                            </a>
                        </div>
                        <div class="thumb">
                            <a href="{{BASE_URL}}public/assets/images/movie/movie-details02.jpg" class="img-pop">
                                <img src="{{BASE_URL}}public/assets/images/movie/movie-details02.jpg" alt="movie">
                            </a>
                        </div>
                        <div class="thumb">
                            <a href="{{BASE_URL}}public/assets/images/movie/movie-details03.jpg" class="img-pop">
                                <img src="{{BASE_URL}}public/assets/images/movie/movie-details03.jpg" alt="movie">
                            </a>
                        </div>
                    </div>
                    <div class="tab summery-review">
                        <ul class="tab-menu">
                            <li class="active">
                                Bình luận
                            </li>
                            <li>
                                Mô tả
                            </li>
                        </ul>
                        <div class="tab-area">
                            <div class="tab-item  active" id="commentTab">
                                @foreach ($comment as $value)
                                @php
                                extract($value);
                                @endphp
                                <div class="movie-review-item">
                                    <div class="author">
                                        <div class="thumb">
                                            <a href="#0">
                                                <img src="{{BASE_URL}}public/assets/images/cast/cast02.jpg" alt="cast">
                                            </a>
                                        </div>
                                        <div class="movie-review-info">
                                            <span class="reply-date">{{$date_comment}}</span>
                                            <h6 class="subtitle"><a href="#0">{{$name}}</a></h6>
                                            <span><i class="fas fa-check"></i> verified review</span>
                                        </div>
                                    </div>
                                    <div class="movie-review-content">
                                        <div class="review">
                                            <i class="flaticon-favorite-heart-button"></i>
                                            <i class="flaticon-favorite-heart-button"></i>
                                            <i class="flaticon-favorite-heart-button"></i>
                                            <i class="flaticon-favorite-heart-button"></i>
                                            <i class="flaticon-favorite-heart-button"></i>
                                        </div>
                                        <h6 class="cont-title">{{$name_film}}</h6>
                                        <div id="comment" class="mb-3">
                                            <p>{{$content}} </p>
                                        </div>
                                        <div class="review-meta">
                                            <a href="#0">
                                                <i class="flaticon-hand"></i><span>8</span>
                                            </a>
                                            <a href="#0" class="dislike">
                                                <i class="flaticon-dont-like-symbol"></i><span>0</span>
                                            </a>
                                            <a onclick="return confirm('Bạn có muốn xóa bình luận này không?')" href="index.php?act=delete_comment&id_comment=<?php echo $id_comment ?>&id=<?php echo $id_film ?>">
                                                Xóa bình luận
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @if (!isset($_SESSION['auth']))
                                <p class="text-danger">Bạn phải đăng nhập để bình luận !!!</p>
                                @else
                                <form id="commentForm" action="{{BASE_URL}}comment/{{$id_film}}" method="post" style="margin: 0 0 40px 0;">
                                    <div class="input-group">
                                        <input type="text" name="comment" placeholder="Viết bình luận..." style="height: 100px; margin: 0 0 30px 0" id="commentInput" required>
                                        </input>
                                        <div class="" style="width: 150px;">
                                            <input class="custom-button " type="submit" name="submitComment" value="Gửi">
                                            @if(isset($error['comment']))
                                            <p class="text-dark">{{ $error['comment'] }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                                @endif
                                <div class="load-more text-center">
                                    <a href="#0" class="custom-button transparent">load more</a>
                                </div>
                            </div>
                            <div class="tab-item">
                                <div class="item">
                                    <h5 class="sub-title">Synopsis</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vehicula eros sit amet est tincidunt aliquet. Fusce laoreet ligula ac ultrices eleifend. Donec hendrerit fringilla odio, ut feugiat mi convallis nec. Fusce elit ex, blandit vitae mattis sit amet, iaculis ac elit. Ut diam mauris, viverra sit amet dictum vel, aliquam ac quam. Ut mi nisl, fringilla sit amet erat et, convallis porttitor ligula. Sed auctor, orci id luctus venenatis, dui dolor euismod risus, et pharetra orci lectus quis sapien. Duis blandit ipsum ac consectetur scelerisque. </p>
                                </div>

                            </div>

                        </div>
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