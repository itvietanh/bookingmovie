<!-- ==========Sign-In-Section========== -->
<section class="account-section bg_img" data-background="<?php echo $path?>/images/account/account-bg.jpg">
    <div class="container">
        <div class="padding-top padding-bottom">
            <div class="account-area">
                <div class="section-header-3">
                    <span class="cate">welcome</span>
                    <h2 class="title">to Boleto </h2>
                </div>
                <form class="account-form" action="signup" method="post">
                    <div class="form-group">
                        <label for="email1">Username<span>*</span></label>
                        <input type="text" placeholder="Enter Your Username" name="username">
                        @if (isset($error['username']) && $error['username'] != "")
                            <p class="text-danger mt-3">{{$error['username']}}</p>
                        @endif 
                    </div>
                    <div class="form-group">
                        <label for="email1">Name<span>*</span></label>
                        <input type="text" placeholder="Enter Your Name" name="name">
                        @if (isset($error['name']) && $error['name'] != "")
                            <p class="text-danger mt-3">{{$error['name']}}</p>
                        @endif 
                    </div>
                    <div class="form-group">
                        <label for="email1">Email<span>*</span></label>
                        <input type="email" placeholder="Enter Your Email" name="email">
                        @if (isset($error['email_signUp']) && $error['email_signUp'] != "")
                            <p class="text-danger mt-3">{{$error['email_signUp']}}</p>
                        @endif 
                    </div>
                    <div class="form-group">
                        <label for="pass2">Phone<span>*</span></label>
                        <input type="number" placeholder="Phone" name="phone">
                        @if (isset($error['phone']) && $error['phone'] != "")
                            <p class="text-danger mt-3">{{$error['phone']}}</p>
                        @endif 
                    </div>
                    <div class="form-group">
                        <label for="pass1">Password<span>*</span></label>
                        <input type="password" placeholder="Password" name="password">
                        @if (isset($error['password_signUp']) && $error['password_signUp'] != "")
                            <p class="text-danger mt-3">{{$error['password_signUp']}}</p>
                        @endif 
                    </div>
      
                    <div class="form-group text-center">
                        <input type="submit" value="Sign Up" name="btnSubmit">
                    </div>
                </form>
                <div class="option">
                    Already have an account? <a href="login">Login</a>
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
@php
include "app/views/footer.blade.php";
@endphp