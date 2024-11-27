<!-- ==========Sign-In-Section========== -->
<section class="account-section bg_img" data-background="<?php echo $path?>/images/account/account-bg.jpg">
    <div class="container">
        <div class="padding-top padding-bottom">
            <div class="account-area">
                <div class="section-header-3">
                    <h2 class="title">Xác nhận mã OTP</h2>
                </div>
                <form class="account-form" method="post">
                    <div class="form-group">
                        <label for="email2">Nhập mã xác nhận<span>*</span></label>
                        <input type="number" placeholder="Nhập mã xác nhận gồm 6 số" name="code" value="">
                        <?php 
                            if (isset($error['code']) && $error['code'] != "") {
                                echo '<p class=error>' . $error['code'] . '</p>';
                            } 
                        ?>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="btn_confirm" value="Xác nhận">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ==========Sign-In-Section========== -->
<?php ob_end_flush();?>
@php
    include "app/views/footer.blade.php";

    @endphp