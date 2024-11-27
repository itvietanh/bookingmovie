<?php
    namespace App\controllers\admin;
    use App\controllers\BaseController;
    use App\models\admin\FilmModel;

    class GenreController extends BaseController {
        public function getGenre() {
            $objFilm = new FilmModel();
            $listGenre = $objFilm -> getAllGenre();
            include "app/views/admin/header.blade.php";
            include "app/views/admin/aside.blade.php";
            return $this -> render('admin.genres.listGenre', ['listGenre' => $listGenre]);
        }

        public function addGenre() {
            $objFilm = new FilmModel();
            $error = [];
            $hasError = false;
            if (isset($_POST['btnSubmit']) && $_POST['btnSubmit']) {

                if (empty($_POST['name'])) {
                    $error['name'] = "Warning: Enter genre";
                    $hasError = true;
                } else if (is_numeric($_POST['name'])) {
                    $error['name'] = "Warning: Enter genre is text not number";
                    $hasError = true;
                } else {
                    $error['name'] = "";
                    $name = $_POST['name'];
                }

                if (!$hasError) {
                    $objFilm -> addGenre($name);
                    header("Location: " . route('home'));
                }

                
            }
            include "app/views/admin/header.blade.php";
            include "app/views/admin/aside.blade.php";
            return $this -> render('admin.genres.addGenre', ['error' => $error]);
        }
    }
?>