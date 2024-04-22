<?php 
    namespace App\controllers\auth;
    use App\controllers\BaseController;
    use App\models\auth\LoginModel;

    class LoginController extends BaseController {
        public function login() {
            include "app/views/header.blade.php";
            return $this -> render("auth.login");
        }

        public function loginAuth() {
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
                    $account = $objAuth -> checkAccount($username, $password);
                    if (is_array($account)) {
                        $_SESSION['auth'] = $account;
                        // echo "<pre>";
                        // print_r($_SESSION['auth']);
                        // die();
                        header("Location: " . BASE_URL . "home");
                        exit();
                    } else {
                        $error['authentication'] = "Tài khoản hoặc mật khẩu không đúng.";
                    }
                }
            }
            include "app/views/header.blade.php";
            return $this -> render("auth.login", ['error' => $error]);
        }
    }
?>