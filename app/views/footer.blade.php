<!-- ==========Newslater-Section========== -->
<footer class="footer-section">
    <div class="newslater-section padding-bottom">
        <div class="container">
            <div class="newslater-container bg_img" data-background="<?=BASE_URL?>public/assets/images/newslater/newslater-bg01.jpg">
                <div class="newslater-wrapper">
                    <h5 class="cate">đăng ký fpoly cinema </h5>
                    <h3 class="title">để nhận thông tin về phim </h3>
                    <form class="newslater-form">
                        <input type="text" placeholder="Nhập địa chỉ email của bạn">
                        <button type="submit">đăng ký</button>
                    </form>
                    <p>Chúng tôi tôn trọng quyền riêng tư của bạn nên chúng tôi không bao giờ chia sẻ thông tin của bạn</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer-top">
            <div class="logo">
                <a href="index.php?act=home">
                    <h5>FPOLY Cinema</h5>
                </a>
            </div>
            <ul class="social-icons">
                <li>
                    <a href="#0">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li>
                    <a href="#0" class="active">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <i class="fab fa-pinterest-p"></i>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <i class="fab fa-google"></i>
                    </a>
                </li>
                <li>
                    <a href="#0">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="footer-bottom">
            <div class="footer-bottom-area">
                <div class="left">
                    <p>Copyright © 2020.All Rights Reserved By <a href="#0">Boleto </a></p>
                </div>
                <ul class="links">
                    <li>
                        <a href="#0">About</a>
                    </li>
                    <li>
                        <a href="#0">Terms Of Use</a>
                    </li>
                    <li>
                        <a href="#0">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#0">FAQ</a>
                    </li>
                    <li>
                        <a href="#0">Feedback</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- ==========Newslater-Section========== -->


<script src="<?=BASE_URL?>public/assets/js/jquery-3.3.1.min.js"></script>
<script src="<?=BASE_URL?>public/assets/js/modernizr-3.6.0.min.js"></script>
<script src="<?=BASE_URL?>public/assets/js/plugins.js"></script>
<script src="<?=BASE_URL?>public/assets/js/bootstrap.min.js"></script>
<script src="<?=BASE_URL?>public/assets/js/heandline.js"></script>
<script src="<?=BASE_URL?>public/assets/js/isotope.pkgd.min.js"></script>
<script src="<?=BASE_URL?>public/assets/js/magnific-popup.min.js"></script>
<script src="<?=BASE_URL?>public/assets/js/owl.carousel.min.js"></script>
<script src="<?=BASE_URL?>public/assets/js/wow.min.js"></script>
<script src="<?=BASE_URL?>public/assets/js/countdown.min.js"></script>
<script src="<?=BASE_URL?>public/assets/js/odometer.min.js"></script>
<script src="<?=BASE_URL?>public/assets/js/viewport.jquery.js"></script>
<script src="<?=BASE_URL?>public/assets/js/nice-select.js"></script>
<script src="<?=BASE_URL?>public/assets/js/main.js"></script>



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
</script>

<script>
    var today = new Date();

    // Tạo một mảng để lưu trữ 5 ngày gần nhất
    var dates = [];

    // Lặp qua 5 ngày gần nhất và thêm vào mảng
    for (var i = 0; i < 5; i++) {
        var date = new Date(today);
        date.setDate(today.getDate() + i);
        dates.push(date);
    }

    // Lấy phần tử select từ DOM
    var select = document.getElementById("selectDate");

    // Thêm các tùy chọn vào phần tử select
    dates.forEach(function(date) {
        var option = document.createElement("option");
        option.text = formatDate(date);
        option.value = formatDate(date);
        select.add(option);
    });

    // Hàm để định dạng ngày
    function formatDate(date) {
        var dd = String(date.getDate()).padStart(2, '0');
        var mm = String(date.getMonth() + 1).padStart(2, '0'); // Tháng bắt đầu từ 0
        var yyyy = date.getFullYear();
        return yyyy + '-' + mm + '-' + dd;
    }
</script>

<script>
    let selectRoom = document.querySelector("#selectRoom");

    let roomSelectionMessage = document.querySelector("#roomSelectionMessage");
    let showTime = document.querySelector("#showTime");
    if (selectRoom.value == 0) {
        roomSelectionMessage.style.display = "block";
        showTime.style.display = "none";
    } else {
        checkRoom();
    }

    function checkRoom() {
        // console.log(selectRoom.value);
        if (selectRoom.value != 0) {
            showTime.style.display = "";
            showTime.classList.add("d-flex");
            showTime.classList.add("flex-wrap");
            roomSelectionMessage.style.display = "none";
        }
    }
</script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<script>
    $(document).ready(function() {
        // Xử lý sự kiện khi thay đổi ngày
        $('#selectDate').change(function() {
            var selectedDate = $(this).val();
            var selectedRoom = $('#selectRoom').val();
            // Gửi yêu cầu AJAX
            sendAjaxRequest(selectedDate, selectedRoom);
        });

        // Xử lý sự kiện khi thay đổi phòng
        $('#selectRoom').change(function() {
            var selectedDate = $('#selectDate').val();
            var selectedRoom = $(this).val();
            // Gửi yêu cầu AJAX
            sendAjaxRequest(selectedDate, selectedRoom);
        });

        // Hàm gửi yêu cầu AJAX
        function sendAjaxRequest(selectedDate, selectedRoom) {
            $.ajax({
                url: $(this).attr('action'), // Thay đổi thành URL của API
                type: 'POST',
                data: {
                    date: selectedDate,
                    room: selectedRoom
                },
                success: function(response) {
                    console.log(response);
                    let showTime = `
                <div class="d-flex flex-wrap" id="showTime">
                    ${response.map(item => `
                        <div class="item">
                            <a href="" data-bs-toggle="modal" data-bs-target="#mySeat">${item['start_time']}</a>
                        </div>
                    `).join('')}
                </div>`;
                    $('.movie-schedule').html(showTime);
                },
                error: function() {
                    alert('Đã có lỗi xảy ra. Vui lòng thử lại sau.');
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('.ticket-search-form').submit(function(event) {
            event.preventDefault();
            var selectedDate = $('#selectDate').val();
            var selectedRoom = $('#selectRoom').val();
            // console.log(selectedDate);
            // Gửi yêu cầu AJAX
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: {
                    date: selectedDate,
                    room: selectedRoom
                },
                success: function(response) {
                    console.log(response);
                    localStorage.setItem("date", selectedDate);
                    localStorage.setItem("room", selectedRoom);
                    localStorage.setItem("startTime", response[0].start_time);
                    localStorage.setItem("endTime", response[0].end_time);
                    localStorage.setItem("nameRoom", response[0].name_room);
                    localStorage.setItem("nameCinema", response[0].name_cinema);
                    let showTime = `
                    <div class="d-flex flex-wrap" id="showTime">
                        ${response.map(item => `
                            <div class="item">
                                <a href="#" class="itemTime" data-bs-toggle="modal" data-bs-target="#mySeat" data-id="${item.id_showTime}">${item.start_time}</a>
                            </div>
                        `).join('')}
                    </div>`;
                    $('.movie-schedule').html(showTime);
                },
                error: function() {
                    alert('Đã có lỗi xảy ra. Vui lòng thử lại sau.');
                }
            });
        });
        // Sự kiện delegate cho phần tử cha (.movie-schedule) thay vì gán trực tiếp cho các phần tử .itemTime
        $('.movie-schedule').on('click', '.itemTime', function(e) {
            let checkSeats = "";
            e.preventDefault();
            let dataId = $(this).attr('data-id');
            let date = localStorage.getItem("date");
            let room = localStorage.getItem("room");
            let startTime = localStorage.getItem("startTime");
            let endTime = localStorage.getItem("endTime");
            let nameRoom = localStorage.getItem("nameRoom");
            let nameCinema = localStorage.getItem("nameCinema");   

            document.querySelector("#orderRoom").value = room;
            document.querySelector("#orderDate").value = date;
            document.querySelector("#startTime").value = startTime;
            document.querySelector("#endTime").value = endTime;
            document.querySelector("#nameRoom").value = nameRoom;
            document.querySelector("#nameCinema").value = nameCinema;
            document.querySelector("#idShowTime").value = dataId;
        
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: {
                    idShowTime: dataId,
                    date: date,
                    room: room
                },
                success: function(response) {
                    handleResponse(response);
                },
                error: function() {}
            })
        });
    });

    function handleResponse(response) {
        // console.log(response);
        let date = localStorage.getItem("date");
        let room = localStorage.getItem("room"); 

        if (response.length != 0) {
            localStorage.setItem('idShowTime', response[0].id_showTimeFrame);
        }
        // console.log(localStorage.getItem('idShowTime'));


        let seated = response.map(seat => seat.seat_order);
        let checkSeats = seated.join(", ");
        // console.log(checkSeats);
        if (seated.length == 0) {
            checkSeats = "";
        }

        let seat = document.getElementsByClassName('single-seat');
        let hidden_price = document.getElementById('hidden_price');
        let price = document.getElementById('price');
        let quantity = 0;

        for (let i = 0; i < seat.length; i++) {
            seat[i].addEventListener("click", function(event) {
                let target = event.target;
                target.style.backgroundColor = "#fff";
                target.style.color = "#000";
                let span = target.childNodes[3];
                span.tagName = "selected_seats";
                let seatNumber = span.innerHTML;

                
                toggleSeat(seatNumber, target);

            })
        }

        // Gán giá trị chuỗi JSON từ PHP cho biến JavaScript
        var allSeats = <?php echo $allSeats_json; ?>;

        let selectedSeats = [];
        let bookedSeats = checkSeats;
        // console.log(bookedSeats);

        for (let i = 0; i < allSeats.length; i++) {
            if (bookedSeats.includes(allSeats[i])) {
                // console.log(allSeats[i]);
                seat[i].style.backgroundColor = "red";
                seat[i].style['pointer-events'] = "none";
                seat[i].style['box-shadow'] = "none";
            } else {
                seat[i].style.backgroundColor = "";
                seat[i].style['pointer-events'] = "";
                seat[i].style['box-shadow'] = "";
            }

        }

        function checkSeatStatus(allSeats) {
            return bookedSeats.includes(allSeats);
        }


        function toggleSeat(seatNumber, target) {
            if (checkSeatStatus(allSeats)) {

                for (let i = 0; i < seat.length; i++) {
                    seat[i].style.backgroundColor = "red";

                }
                alert('Ghế đã được đặt. Vui lòng chọn ghế khác.');
                return;
            }

            let index = selectedSeats.indexOf(seatNumber);
            if (index !== -1) {
                target.style.backgroundColor = "";
                target.style.color = "#fff";
                selectedSeats.splice(index, 1);
            } else {
                quantity++;
                console.log(quantity);
                let hidden_quantity = document.getElementById('hidden_quantity');
                hidden_quantity.value = quantity;

                selectedSeats.push(seatNumber);
            }
            let select_seat = document.getElementById("select_seat");
            select_seat.value = selectedSeats.join(', ');
            console.log(select_seat.value)
            updateSeatInfo(seatNumber);
        }

        function updateSeatInfo(seatNumber) {
            // Hiển thị thông tin về tất cả các ghế đã chọn
            let titleSeat = document.getElementById('title-seat');
            titleSeat.textContent = `Đã chọn các ghế: ${selectedSeats.join(', ')}`;
            // Cập nhật số ghế đã chọn trên từng ô ghế
            let seats = document.querySelectorAll('.single-seat');
            seats.forEach(seat => {
                seat.classList.toggle('selected', selectedSeats.includes(seatNumber));
            });

            let count_seat = selectedSeats.length;
            let mul = Number(hidden_price.value) * Number(count_seat);
            price.innerText = mul;
            let mul_price = document.getElementById('mul_price');
            mul_price.value = price.innerText;
        }
    }
</script>

</body>


<!-- Mirrored from pixner.net/boleto/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Nov 2023 08:54:55 GMT -->
</html>