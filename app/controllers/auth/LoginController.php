<?php

namespace App\controllers\auth;

use App\controllers\BaseController;
use App\models\auth\LoginModel;

class LoginController extends BaseController
{
    public function login()
    {
        include "app/views/header.blade.php";
        return $this->render("auth.login");
    }

    public function loginAuth()
    {
        $objAuth = new LoginModel();
        $error = [];
        $hasError = false;
        if (isset($_POST['btnSubmit']) && $_POST['btnSubmit']) {
            if (empty($_POST['username_or_email'])) {
                $error['username'] = "Bạn phải nhập Username hoặc Email";
                $hasError = true;
            } elseif (preg_match('/[\'"\/\\;()$&*~`!<>|=#{}]/', $_POST['username_or_email'])) {
                $error['username_or_email'] = "Không được chứa các kí tự đặc biệt";
                $hasError = true;
            } else {
                $error['username'] = "";
                $username = $_POST['username_or_email'];
            }

            if (empty($_POST['password'])) {
                $error['password'] = "Bạn phải nhập password";
                $hasError = true;
            } elseif (preg_match('/[\'"\/\\;()$&*~`!<>|=#{}]/', $_POST['password'])) {
                $error['password'] = "Không được chứa các kí tự đặc biệt";
                $hasError = true;
            } else {
                $error['password'] = "";
                $password = $_POST['password'];
            }

            if (!$hasError) {
                $account = $objAuth->checkAccount($username, $password);
                if (is_array($account)) {
                    session_start();
                    $_SESSION['auth'] = $account;
                    if (isset($_SESSION['redirect_url']) && $_SESSION['redirect_url']) {
                        $redirectUrl = $_SESSION['redirect_url'];
                        header("Location: " . $redirectUrl);
                        exit();
                    } else {
                        header("Location: " . BASE_URL . "home");
                        exit();
                    }
                } else {
                    $error['authentication'] = "Tài khoản hoặc mật khẩu không đúng.";
                }
            }
        }
        include "app/views/header.blade.php";
        return $this->render("auth.login", ['error' => $error]);
    }

    public function logout()
    {
        unset($_SESSION['auth']);
        unset($_SESSION['redirect_url']);
        header("Location: " . BASE_URL . "home");
    }

    public function signup()
    {
        $objAuth = new LoginModel();
        $error = [];
        $hasError = false;

        if (isset($_POST['btnSubmit']) && $_POST['btnSubmit']) {

            if (empty($_POST['username'])) {
                $error['username'] = "Bạn phải nhập Username";
                $hasError = true;
            } else {
                $error['username'] = "";
                $username = $_POST['username'];
            }

            if (empty($_POST['name'])) {
                $error['name'] = "Bạn phải nhập name";
                $hasError = true;
            } else if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['name'])) {
                $error['name'] = "Tên không được chưa kí tự";
                $hasError = true;
            } else {
                $error['name'] = "";
                $name = $_POST['name'];
            }

            if (empty($_POST['email'])) {
                $error['email_signUp'] = "Bạn phải nhập email";
                $hasError = true;
            } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error['email_signUp'] = "Bạn nhập email chưa đúng định dạng";
                $hasError = true;
            } else if ($objAuth->checkEmail($_POST['email'])) {
                $error['email_signUp'] = "Email đã được đăng ký";
                $hasError = true;
            }
            else {
                $error['email_signUp'] = "";
                $email = $_POST['email'];
            }

            if (empty($_POST['password'])) {
                $error['password_signUp'] = "Bạn phải nhập password";
                $hasError = true;
            } else {
                $error['password_signUp'] = "";
                $password = $_POST['password'];
            }

            if (empty($_POST['phone'])) {
                $error['phone'] = "Bạn phải nhập số điện thoại";
                $hasError = true;
            } else if (is_numeric($_POST['phone'] == false) && $_POST['phone'] == "") {
                $error['phone'] = "Bạn phải nhập số điện thoại là số!";
                $hasError = true;
            } else if ($_POST['phone'] < 0 && $_POST['phone'] < 11) {
                $error['phone'] = "Số điện thoại không tồn tại";
                $hasError = true;
            } else {
                $error['phone'] = "";
                $phone = $_POST['phone'];
            }

            if (!$hasError) {
                $objAuth->signUP($username, $password, $name, $email, $phone);
                header("Location: " . route("login"));
            }
        }
        include "app/views/header.blade.php";
        return $this->render("auth.signup", ['error' => $error]);
    }

    public function forgotPass()
    {
        $objAuth = new LoginModel();
        $error = [];
        $hasError = false;

        if (isset($_POST['btn_forgot'])) {
            if (empty($_POST['email'])) {
                $error['email_forGot'] = "Bạn phải nhập email";
                $hasError = true;

            } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error['email_forGot'] = "Bạn nhập email chưa đúng định dạng";
                $hasError = true;

            } else {
                $email = $_POST['email'];
            }

            if (!$hasError) {
                $account = $objAuth -> checkEmail($email);
                if ($account != false) {
                    $rand = rand(0, 999999);
                    $email = $account['email'];
                    $infoCode = [$rand, $email];
                    $_SESSION['code_forgot'] = $infoCode;
                    $objAuth -> sendConfirmationAccount($rand, $email);
                    header("Location: " . route("confirm_code"));
                }
            }
        }
        include "app/views/header.blade.php";
        return $this->render("auth.forgot_password", ['error' => $error]);
    }

    public function confirmCode() {
        $objAuth = new LoginModel();
        $error = [];
        $hasError = false;
        if (isset($_POST['btn_confirm'])) {
            if (empty($_POST['code'])) {
                $error['code'] = "Không được để trống";
                $hasError = true;

            } else if (is_numeric($_POST['code'] == false) && $_POST['code'] == "") {
                $error['code'] = "Bạn phải nhập số code là số!";
                $hasError = true;

            } else if ($_POST['code'] != $_SESSION['code_forgot'][0]) {
                $error['code'] = "Mã xác nhận không trùng khớp";
                $hasError = true;

            } else {
                $code = $_POST['code'];
            }

            if (!$hasError) {
                unset($_SESSION['error']);
                header("Location: change_password");
            }
        }
        include "app/views/header.blade.php";
        return $this->render("auth.confirm_code", ['error' => $error]);
    }

    public function change_password() {
        $objAuth = new LoginModel();
        $error = [];
        $hasError = false;
        if (isset($_POST['btn_change'])) {
            if (empty($_POST['password'])) {
                $hasError = true;
                $error['password_new'] = "Mật khẩu không được bỏ trống";
            } else {
                $password = $_POST['password'];
                $email = $_SESSION['code_forgot'][1];
            }

            if (!$hasError) {
                $objAuth -> setPassNew($password, $email);
                header("Location: " . route("login"));
            }
        }

        include "app/views/header.blade.php";
        return $this->render("auth.change_password", ['error' => $error]);
    }
}
