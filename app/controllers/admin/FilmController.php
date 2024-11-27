<?php 
    namespace App\controllers\admin;
    use App\controllers\BaseController;
    use App\models\admin\FilmModel;
    use App\models\admin\ShowFilmModel;

    class FilmController extends BaseController {
        public function getFilm() {
            $objFilm = new FilmModel();
            $film = $objFilm -> getAllFilm();
            // var_dump($film);
            include "app/views/admin/header.blade.php";
            include "app/views/admin/aside.blade.php";
            return $this -> render('admin.films.index', ['film' => $film]);
        }

        public function addFilm() {
            $error = [];
            $hasError = false;
            $objFilm = new FilmModel();
            if (isset($_POST['btnSubmit']) && $_POST['btnSubmit']) {

                if (empty($_POST['name'])) {
                    $error['name'] = "Warning: Enter Name Film";
                    $hasError = true;
                } else {
                    $error['name'] = "";
                    $nameFilm = $_POST['name'];
                }

                $relDate = date("Y-m-d");

                if (empty($_POST['genre'])) {
                    $error['genre'] = "Warning: Enter Genre Film";
                    $hasError = true;
                } else {
                    $error['genre'] = "";
                    $genreFilm = $_POST['genre'];
                }

                if (!is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $error['image'] = "Warning: Enter image Film";
                    $hasError = true;
                } else {
                    require "config.php";
                    $error['image'] = "";
                    $fileName = basename($_FILES['image']['name']);
                    $fileUpload = $uploads . $fileName;
                    
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $fileUpload)) {
                        echo "Upload file successfully";
                    } else {
                        echo "Upload file failed";
                    }
                }

                if (!$hasError) {
                    $objFilm -> add($nameFilm, $relDate, $genreFilm, $fileUpload);
                    header("Location: " . route('home'));
                }
            }
            
            $genre = $objFilm -> getAllGenre();
            include "app/views/admin/header.blade.php";
            include "app/views/admin/aside.blade.php";
            return $this -> render('admin.films.addFilm', ['genre' => $genre, 'error' => $error]);
        }

        public function editFilm($id) {
            $objFilm = new FilmModel();
            $film = $objFilm -> getOneFilm($id);
            $error = [];
            $hasError = false;
            
            if (isset($_POST['btnSubmit']) && $_POST['btnSubmit']) {
                $id = $_POST['id'];
                if (empty($_POST['name'])) {
                    $error['name'] = "Warning: Enter Name Film";
                    $hasError = true;
                } else {
                    $error['name'] = "";
                    $nameFilm = $_POST['name'];
                }

                $relDate = date("Y-m-d");

                if (empty($_POST['genre'])) {
                    $error['genre'] = "Warning: Enter Genre Film";
                    $hasError = true;
                } else {
                    $error['genre'] = "";
                    $genreFilm = $_POST['genre'];
                }

                if (!is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $fileUpload = $film['image'];
                    // $hasError = true;
                } else {
                    require "config.php";
                    $error['image'] = "";
                    $fileName = basename($_FILES['image']['name']);
                    $fileUpload = $uploads . $fileName;
                    
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $fileUpload)) {
                        echo "Upload file successfully";
                        // $fileUpload = $uploads . $fileName;
                    } else {
                        echo "Upload file failed";
                    }
                }

                if (!$hasError) {
                    $objFilm -> update($id, $nameFilm, $relDate, $genreFilm, $fileUpload);
                    header("Location: " . route('home'));
                }
            }

            if (isset($id) && $id > 0) {
                $genre = $objFilm -> getAllGenre();
                include "app/views/admin/header.blade.php";
                include "app/views/admin/aside.blade.php";
                return $this -> render('admin.films.editFilm', ['film' => $film, 'genre' => $genre]);
            }
        }

        public function deleteFilm($id) {
            if (isset($id) && $id > 0) {
                $objFilm = new FilmModel();
                $objFilm -> delete($id);
                header("Location: " . route('home'));
            }
        }

        public function addShowFilm() {
            $objShowFilm = new ShowFilmModel();
            $objShowFilm -> addShowFilm();
            echo "<script>alert('Thêm Lịch Chiếu Ngày Mới Thành Công');</script>";
            header("Location: " .route("filmManager"));
        }

    }
?>