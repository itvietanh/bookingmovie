<?php 
    namespace App\models\user;
    use App\models\BaseModel;

    class FilmModel extends BaseModel {
        public function getAllFilm() {

        }

        public function getFilmCartoon() {
            $sql = "SELECT film.id, film.name, film.rel_date, film.id_genre, film.image,
                    genre.id as 'genre_id', genre.name as 'genre_name' FROM `film`
                    JOIN `genre` on genre.id = film.id_genre
                    where genre.name like '%Phim hoạt hình%'
            ";
            return $this -> getAllData($sql);
        }

        public function getFilmRomantic() {
            $sql = "SELECT film.id, film.name, film.rel_date, film.id_genre, film.image,
                    genre.id as 'genre_id', genre.name as 'genre_name' FROM `film`
                    JOIN `genre` on genre.id = film.id_genre
                    where genre.name like '%Hài%'
            ";
            return $this -> getAllData($sql);
        }

        public function getFilmDetails($id) {
            $sql = "SELECT film.id as 'id_film', film.name as 'name_film', film.rel_date, film.id_genre, film.image,
                    genre.id as 'genre_id', genre.name as 'genre_name' FROM `film`
                    JOIN `genre` on genre.id = film.id_genre
                    WHERE film.id = $id";
            return $this -> getRowData($sql);
        }

        public function getCommentOfFilm($id) {
            $sql = "SELECT *, film.name as 'name_film', account.name FROM `comment` 
                    JOIN account on account.id = comment.id_account
                    JOIN film on film.id = comment.id_film
                    WHERE id_film = $id ORDER BY comment.id DESC";
            return $this -> getAllData($sql);
        }
    }
?>