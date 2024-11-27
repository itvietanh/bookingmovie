@php
include "public/global.php"
@endphp

<!-- ==========Sign-In-Section========== -->
<section class="account-section bg_img" data-background="<?php echo $path?>/images/account/account-bg.jpg">
    <div class="container">
        <div class="padding-top padding-bottom">
            <div class="account-area">
                <div class="section-header-3">
                    <span class="cate">hello</span>
                    <h2 class="title">welcome back</h2>
                </div>
                <form class="account-form" action="loginAuth" method="post">
                    <div class="form-group">
                        <label for="email2">Username / Email<span>*</span></label>
                        <input type="text" placeholder="Nhập username hoặc địa chỉ email" name="username_or_email" id="email2" value="">
                        @if (isset($error['username']) && $error['username'] != "")
                            <p class="text-danger mt-3">{{$error['username']}}</p>
                        @endif 
                    </div>
                    <div class="form-group">
                        <label for="pass3">Password<span>*</span></label>
                        <input type="password" placeholder="Nhập mật khẩu" name="password" id="pass3" value="">
                        @if (isset($error['password']) && $error['password'] != "")
                            <p class="text-danger mt-3">{{$error['password']}}</p>
                        @endif 
                    </div>
                    @if (isset($error['authentication']) && $error['authentication'] != "")
                            <p class="text-danger mt-3">{{$error['authentication']}}</p>
                    @endif 
                    <div class="form-group checkgroup">
                        <a href="<?=BASE_URL?>forgot_password" class="forget-pass">Quên mật khẩu?</a>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="btnSubmit" value="Đăng nhập">
                    </div>
                </form>
                <div class="option">
                    Bạn chưa có tài khoản? <a href="<?=BASE_URL?>signup">đăng ký ngay</a>
                </div>
                <div class="or"><span>Or</span></div>
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
                            <i class="fab fa-google"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- ==========Sign-In-Section========== -->
<?php ob_end_flush();?>
@php
    include "app/views/footer.blade.php";

    @endphp