
<!-- ==========Movie-Section========== -->
<div class="movie-facility padding-bottom padding-top">
    <div class="container">
        <div class="checkout-widget checkout-card mb-0">
            <h6 class="subtitle" style="margin: 0 0 40px 0">Thông Tin Khách Hàng</h6>
            <form class="payment-card-form" action="{{BASE_URL}}payment" method="post" enctype="application/x-www-form-urlencoded">
                <div class="box_left" style="width: 50%;">
                    <div class="form-group w-100">
                        <label for="card1">Tên Khách Hàng</label>
                        <input type="text" id="card1" placeholder="Nhập tên người nhận" value="<?php echo $_SESSION['auth']['name']?>">
                    </div>
                    <div class="form-group">
                        <label for="card3">Email</label>
                        <input type="email" id="card3" placeholder="Nhập email" value="<?php echo $_SESSION['auth']['email']?>">
                    </div>
                    <div class="form-group">
                        <label for="card4">Số Điện Thoại</label>
                        <input type="text" id="card4" placeholder="Nhập số điện thoại" value="<?php echo $_SESSION['auth']['phone']?>">
                    </div>
                    <div class="form-group w-100">
                        <h5 class="title" style="margin: 40px 0 0 0">Phương Thức Thanh Toán </h5> <br>
                        <select class="nice-select" name="methodPayment" style="background-color: unset;" required>
                            <div class="option">
                            <option style="background-color: #777;" value="0">--- Lựa Chọn ---</option>
                            </div>
                            
                            <option style="background-color: #777;" value="paymentCash" selected>Thanh toán tại quầy</option>
                            <option style="background-color: #777;" value="paymentMomo">Thanh toán qua Momo</option>
                        </select>

                        @if (!empty($error['methodPayment'])) 
                            <p class="text-danger">{{$error['methodPayment']}}</p>
                        @endif

                    </div>
                </div>

                <div class="box_right">
                    <div class="col-lg-4" style="max-width: 100%;">
                        <div class="booking-summery bg-one">
                            <h4 class="title">Thông Tin Vé Đặt</h4>
                            <ul>
                                <li>
                                    <h6 class="subtitle">Tên Phim</h6>
                                    <span class="info"><?=$nameFilm?></span>
                                </li>
                                <li>
                                    <h6 class="subtitle"><span>Lịch Chiếu</span><span>Số Vé</span></h6>
                                    <div class="info"><span><?=$startTime . " - " . $endTime;?></span> <span><?=$ticketQuantity?></span></div>
                                </li>
                                <li>
                                    <h6 class="subtitle"><span>Phòng</span><span>Rạp Chiếu</span></h6>
                                    <div class="info"><span><?=$nameRoom?></span> <span><?=$nameCinema?></span></div>
                                </li>
                                <li>
                                    <h6 class="subtitle">Ghế Ngồi</h6>
                                    <span class="info"><?=$seatSelected?></span>
                                </li>
                                <li>
                                    <h6 class="subtitle mb-0"><span>Giá Vé</span><span><?=$ticketPrice['price']?></span></h6>
                                </li>
                            </ul>
                        </div>
                        <div class="proceed-area  text-center">
                            <h6 class="subtitle"><span>Tổng Tiền</span><span><?=$totalPrice?></span></h6>
                            <input type="submit" class="custom-button back-button" name="btnSubmit" value="Thanh toán">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-8">
        </div>
        <div class="row">
        </div>
    </div>
</div>
<!-- ==========Movie-Section========== -->

<script>
    let payment = Array.from(document.querySelectorAll('.button_payment'));
    payment.forEach(target => {
        target.addEventListener("click", function (event) {
            console.log(target)
        })
    })
    console.log(payment)
</script>