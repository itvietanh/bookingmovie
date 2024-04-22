<?php 
    namespace App\models\user;
    use App\models\BaseModel;

    class ProcessComment extends BaseModel {
        public function sendComment($acc, $idFilm, $comment, $date) {
            $sql = "INSERT INTO `comment` (`id_account`, `id_film`, `content`, `date_comment`) 
            VALUES ('$acc', '$idFilm', '$comment', '$date');";
            return $this -> getRowData($sql);
        }
    }

    
?>