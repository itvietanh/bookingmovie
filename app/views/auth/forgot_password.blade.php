<!-- ==========Sign-In-Section========== -->
<section class="account-section bg_img" data-background="<?php echo $path?>/images/account/account-bg.jpg">
    <div class="container">
        <div class="padding-top padding-bottom">
            <div class="account-area">
                <div class="section-header-3">
                    <h2 class="title">Quên mật khẩu</h2>
                </div>
                <form class="account-form" method="post">
                    <div class="form-group">
                        <label for="email2">Email<span>*</span></label>
                        <input type="email" placeholder="Nhập địa chỉ email" name="email">
                        <?php 
                            if (isset($error['email_forGot']) && $error['email_forGot'] != "") {
                                echo '<p class=error>' . $error['email_forGot'] . '</p>';
                            } 
                        ?>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="btn_forgot" value="Gửi">
                    </div>
                </form>
                <div class="option">
                    Bạn chưa có tài khoản? <a href="<?=BASE_URL?>sign_up">đăng ký ngay</a>
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