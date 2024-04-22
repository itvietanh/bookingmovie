<?php 
    namespace App\controllers\user;
    use App\controllers\BaseController;
    use App\models\user\FilmModel;
    use App\models\user\GenreModel;
    use App\models\user\ProcessComment;

    class FilmController extends BaseController {
        public function getFilmDetails($id) {
            $objFilm = new FilmModel();
            $objGenre = new GenreModel();
            $listGenre = $objGenre -> getAllGenre();
            $filmDetails = $objFilm -> getFilmDetails($id);
            $comment = $objFilm -> getCommentOfFilm($id);
            include "app/views/header.blade.php";
            return $this -> render("user.film_details", ['filmDetails' => $filmDetails, 'listGenre' => $listGenre, 'comment' => $comment]);
        }

        public function postComment($id) {
            $objFilm = new FilmModel();
            $objComment = new ProcessComment();
            $error = [];
            $hasError = false;
            // Process comment submission
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                if (empty($_POST['comment'])) {
                    $error['comment'] = "Bạn phải nhập bình luận";
                    $hasError = true;
                } else if (preg_match('/[\'"\/\\;()$&*~`!<>|=#{}]/', $_POST['comment'])) {
                    $error['comment'] = "Bình luận không được chứa các kí tự đặc biệt";
                    $hasError = true;
                } else {
                    $error['comment'] = "";
                    $comment = $_POST['comment'];
                    $acc = $_SESSION['auth']['id'];
                    $date = date("Y-m-d");
                }
                
                if (!$hasError) {
                    $objComment -> sendComment($acc, $id, $comment, $date);
                    // $comment = $_POST['comment'];
                     // Phản hồi trả về cho client (giả sử)
                    $filmDetails = $objFilm -> getFilmDetails($id);
                    $latestComment = $objFilm-> getCommentOfFilm($id);
                    // Trả về dữ liệu bình luận mới nhất dưới dạng JSON
                    header('Content-Type: application/json');
                    echo json_encode($latestComment);
                    // Kết thúc việc xử lý
                    exit;

                }
            } else {
                // Invalid request method
                http_response_code(405);
                echo "Phương thức yêu cầu không hợp lệ!";
            }
            
        }
    }
?>