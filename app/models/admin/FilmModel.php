<?php 
    namespace App\models\admin;
    use App\models\BaseModel;

    class FilmModel extends BaseModel {
        public function getAllFilm() {
            $sql = "SELECT film.id, film.name,  film.rel_date, film.id_genre, film.image,
            genre.id as 'genre_id', genre.name as 'genre_name' FROM `film` 
            JOIN `genre` on film.id_genre = genre.id";
            return $this -> getAllData($sql);
        }

        public function getAllGenre() {
            $sql = "SELECT * FROM `genre`";
            return $this -> getAllData($sql);
        }

        public function addGenre($name) {
            $sql = "INSERT INTO `genre` (`name`)
            VALUES ('$name');";
            return $this -> getRowData($sql);
        }

        public function add($nameFilm, $relDate, $genreFilm, $imageFilm) {
            $sql = "INSERT INTO `film` (`name`, `rel_date`, `id_genre`, `image`) 
            VALUES ('$nameFilm', '$relDate', '$genreFilm', '$imageFilm');";
            return $this -> getRowData($sql);
        }

        public function getOneFilm($id) {
            $sql = "SELECT film.id, film.name,  film.rel_date, film.id_genre, film.image,
            genre.id as 'genre_id', genre.name as 'genre_name' FROM `film` 
            JOIN `genre` on film.id_genre = genre.id WHERE film.id = $id";
            return $this -> getRowData($sql);
        }

        public function update($id, $nameFilm, $relDate, $genreFilm, $fileUpload) {
            $sql = "UPDATE `film` SET `name` = '$nameFilm', `rel_date` = '$relDate', `id_genre` = '$genreFilm', `image` = '$fileUpload' WHERE `film`.`id` = $id;";
            return $this -> getRowData($sql);
        }

        public function delete($id) {
            $sql = "DELETE FROM film where film.id = $id";
            return $this -> getRowData($sql);
        }
    }
?>