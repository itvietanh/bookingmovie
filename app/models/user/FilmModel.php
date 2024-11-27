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
                    WHERE id_film = $id ORDER BY comment.id DESC limit 3";
            return $this -> getAllData($sql);
        }

        public function getAllSeatOrder($id_film, $idShowTime, $date, $room) {
            $sql = "SELECT distinct order_ticket.seat_order as 'seat_order', order_ticket.order_date, order_ticket.id_showTimeFrame, 
            order_ticket.id_film FROM `order_ticket` 
            WHERE order_ticket.order_date = '$date' AND order_ticket.id_showTimeFrame = $idShowTime AND order_ticket.id_film = $id_film and order_ticket.id_room = $room";
            return $this -> getAllData($sql);
        }

        public function getPriceOfFilm($id) {
            $sql = "SELECT * FROM `ticket` WHERE id_film = $id";
            return $this -> getRowData($sql);
        }

        public function loadAllFilm($kyw = "")
        {
            $sql = "SELECT film.id as 'id', film.name as 'name', film.rel_date as 'rel_date', genre.name as 'id_genre', film.image as 'image'
                FROM `film` 
                JOIN genre on film.id_genre = genre.id";
            if ($kyw != "") {
                $sql .= " where film.name like '%" . $kyw . "%' limit 12";
            }
            return $this -> getAllData($sql);
        }

        public function loadAllByGenre($id)
        {
            $sql = "select genre.id as 'id', film.id as 'id', genre.name as 'genre', film.name as 'name_film', film.image as 'image',
                    film.rel_date as 'rel_date' from film
                    join genre on film.id_genre = genre.id
                    WHERE genre.id = $id
                    group by genre.name, film.name";
        return $this -> getAllData($sql);
        }
    }
?>