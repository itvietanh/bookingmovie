@php
extract($filmDetails);
@endphp

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
            <a href="#"> <button type="button" class="custom-button" data-bs-toggle="modal" data-bs-target="#myModal">Đặt vé</button></a>
            <!-- The Modal -->
            <div class="modal fade w-100" id="myModal" >
                <div class="modal-dialog modal-xl modal-dialog-centered" >
                    <div class="modal-content" style="background: #001232;">

                        <!-- Modal Header -->
                        <div class="">
                            <h4 class="modal-title " style="color: black;">FIlm Name</h4>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <section class="book-section bg-one">
                                <div class="container">
                                    <form class="ticket-search-form two" action="" method="post">
                                        <div class="form-group">
                                            <div class="thumb">
                                                <img src="{{BASE_URL}}public/assets/images/ticket/date.png" alt="ticket">
                                            </div>
                                            <span class="type">Ngày Chiếu</span>
                                            <select class="select-bar" name="choose_date" required="" style="display: none;">
                                                <option value="">--- Lựa Chọn ---</option>
                                                <option value="2023-11-09" selected="">2023-11-09</option>
                                                <option value="2023-11-10">2023-11-10</option>
                                                <option value="2023-12-11">2023-12-11</option>
                                            </select>
                                            <!-- <div class="nice-select select-bar" tabindex="0"><span class="current">2023-11-09</span>
                                                <ul class="list">
                                                    <li data-value="" class="option">--- Lựa Chọn ---</li>
                                                    <li data-value="2023-11-09" class="option selected focus">2023-11-09</li>
                                                    <li data-value="2023-11-10" class="option">2023-11-10</li>
                                                    <li data-value="2023-12-11" class="option">2023-12-11</li>
                                                </ul>
                                            </div> -->
                                        </div>

                                        <div class="form-group">
                                            <div class="thumb">
                                                <img src="{{BASE_URL}}public/assets/images/ticket/date.png" alt="ticket">
                                            </div>
                                            <span class="type">Phòng Chiếu</span>
                                            <select class="select-bar" name="choose_room" required="" style="display: none;">
                                                <option value="">--- Lựa Chọn ---</option>
                                                <option value="1" selected="">Phòng Chiếu 1</option>
                                                <option value="2">Phòng Chiếu 2</option>
                                                <option value="3">Phòng Chiếu 3
                                                </option>
                                                <option value="4">Phòng Chiếu 4
                                                </option>
                                                <option value="5">Phòng Chiếu 5
                                                </option>
                                            </select>
                                            <!-- <div class="nice-select select-bar" tabindex="0"><span class="current">Phòng Chiếu 1</span>
                                                <ul class="list">
                                                    <li data-value="" class="option">--- Lựa Chọn ---</li>
                                                    <li data-value="1" class="option selected focus">Phòng Chiếu 1</li>
                                                    <li data-value="2" class="option">Phòng Chiếu 2</li>
                                                    <li data-value="3" class="option">Phòng Chiếu 3
                                                    </li>
                                                    <li data-value="4" class="option">Phòng Chiếu 4
                                                    </li>
                                                    <li data-value="5" class="option">Phòng Chiếu 5
                                                    </li>
                                                </ul>
                                            </div> -->
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" value="1" name="id_film">
                                            <input type="hidden" value="1" name="id_cinema">
                                            <input type="submit" class="btn btn-primary " name="btnSubmit" value="Xem Suất Chiếu" >
                                        </div>
                                    </form>
                                </div>
                            </section>

                            <div class="ticket-plan-section padding-bottom padding-top">
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
                                                        <div class="item">
                                                            <a href="index.php?act=film_seat&amp;id=1&amp;date=2023-11-09&amp;id_film=26&amp;room=1&amp;cinema=1">14:00:00</a>
                                                        </div>
                                                        <div class="item">
                                                            <a href="index.php?act=film_seat&amp;id=2&amp;date=2023-11-09&amp;id_film=26&amp;room=1&amp;cinema=1">16:00:00</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
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
                                    <input type="text" name="comment" placeholder="Viết bình luận..." style="height: 100px; margin: 0 0 30px 0" id="commentInput" required>
                                    </input>
                                    <div class="" style="width: 150px;">
                                        <input class="custom-button" type="submit" name="submitComment" value="Gửi">
                                        @if(isset($error['comment']))
                                        <p class="text-dark">{{ $error['comment'] }}</p>
                                        @endif
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Intercept form submission
        $('#commentForm').submit(function(event) {
            // Prevent default form submission
            event.preventDefault();

            // Get the comment input value
            var comment = $('#commentInput').val();

            // Send AJAX request
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                dataType: 'json',
                data: {
                    comment: comment
                },
                success: function(response) {
                    console.log(response);
                    // Update UI with new comment
                    var newCommentHtml = `
                    <div class="movie-review-item">
                        <div class="author">
                            <div class="thumb">
                                <a href="#0">
                                    <img src="{{BASE_URL}}public/assets/images/cast/cast02.jpg" alt="cast">
                                </a>
                            </div>
                            <div class="movie-review-info">
                                <span class="reply-date">${response[0]['date_comment']}</span>
                                <h6 class="subtitle"><a href="#0">${response[0]['name']}</a></h6>
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
                            <h6 class="cont-title">${response[0]['name_film']}</h6>
                            <div id="comment" class="mb-3">
                                <p>${response[0]['content']}</p>
                            </div>
                            <div class="review-meta">
                                <a href="#0">
                                    <i class="flaticon-hand"></i><span>8</span>
                                </a>
                                <a href="#0" class="dislike">
                                    <i class="flaticon-dont-like-symbol"></i><span>0</span>
                                </a>
                                <a onclick="return confirm('Bạn có muốn xóa bình luận này không?')" href="index.php?act=delete_comment&id_comment=${response.id_comment}&id=${response.id_film}">
                                    Xóa bình luận
                                </a>
                            </div>
                        </div>
                    </div>
                `;
                    // Prepend the new comment to the comments section
                    $('#commentTab').prepend(newCommentHtml);

                    // Clear comment input field
                    $('#commentInput').val('');

                    // Optionally, you can show a success message or perform any other action
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(error);
                    // Optionally, update UI or show error message
                }
            });
        });
    });





    // $(document).ready(function() {
    //     // Intercept form submission
    //     $('#commentForm').submit(function(event) {
    //         // Prevent default form submission
    //         event.preventDefault();

    //         // Get the comment input value
    //         var comment = $('#commentInput').val();
    //         // console.log(comment);

    //         // Send AJAX request
    //         $.ajax({
    //             type: 'POST',
    //             url: $(this).attr('action'),
    //             dataType: 'json',
    //             data: {
    //                 comment: comment
    //             },
    //             success: function(response) {
    //                 console.log(response);
    //             },
    //             error: function(xhr, status, error) {
    //                 // Handle error
    //                 console.error(error);
    //                 // Optionally, update UI or show error message
    //             }
    //         })
    //     });
    // });
</script>