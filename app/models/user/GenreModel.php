<?php 
    namespace App\models\user;
    use App\models\BaseModel;

    class GenreModel extends BaseModel {
        public function getAllGenre() {
            $sql = "SELECT * FROM `genre`";
            return $this -> getAllData($sql);
        }
    }
?>