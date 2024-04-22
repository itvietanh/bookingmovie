<?php 
    namespace App\controllers\user;
    use App\controllers\BaseController;
    use App\models\user\GenreModel;
    use App\models\user\FilmModel;

    class HomeController extends BaseController {
        public function home() {
            $objGenre = new GenreModel();
            $objFilm = new FilmModel();
            $listGenre = $objGenre -> getAllGenre();
            $filmCartoon = $objFilm -> getFilmCartoon();
            $filmRomantic = $objFilm ->getFilmRomantic();
            
            include "app/views/header.blade.php";
            return $this -> render("user.home", ['listGenre' => $listGenre, 'filmCartoon' => $filmCartoon, 'filmRomantic' => $filmRomantic]);
        }


        public function checkLogin() {
            include "app/views/header.blade.php";
            return $this -> render("auth.login");
        }

        public function login() {
            $error = [];
            $hasError = false;
            $objCheckAcc = new Login();

            if (isset($_POST['btnSubmit']) && $_POST['btnSubmit']) {
                if (empty($_POST['email'])) {
                    $error['email'] = "Chú ý: Nhập địa chỉ email";
                    $hasError = true;
                } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $error['email'] = "Chú ý: Nhập địa chỉ email chưa đúng định dạng";
                    $hasError = true;
                } else {
                    $error['email'] = "";
                    $email = $_POST['email'];
                }

                if (empty($_POST['password'])) {
                    $error['password'] = "Chú ý: Nhập password";
                    $hasError = true;
                } else {
                    $error['password'] = "";
                    $password = $_POST['password'];
                }

                if (!$hasError) {
                    $checkLogin = $objCheckAcc -> checkAccount($email, $password);
                    if (is_array($checkLogin)) {
                        $_SESSION['account'] = $checkLogin;
                        unset($_SESSION['error']);
                        header("Location: home");
                    }
                } 
            }
        }
    }
?>