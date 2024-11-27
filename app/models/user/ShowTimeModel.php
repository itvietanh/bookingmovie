<?php

namespace App\models\user;

use App\models\BaseModel;

class ShowTimeModel extends BaseModel
{
    public function getAllShowTime()
    {
        $sql = "SELECT * FROM `show_time_frame`";
        return $this->getAllData($sql);
    }

    public function getTimeOfDay($id, $today, $idRoom)
    {
        $sql = "SELECT film.id, film.name, room.name, show_film.show_date, show_time_frame.start_time, show_time_frame.end_time, room.name as 'name_room', cinema.name as 'name_cinema',
            show_time_frame.id as 'id_showTime', show_film.id_cinema
            FROM film JOIN show_film
            ON show_film.id_film = film.id
            JOIN room ON room.id = show_film.id_room
            JOIN show_time_frame on show_time_frame.id = show_film.id_showTimeFrame
            JOIN cinema on show_film.id_cinema = cinema.id
            WHERE film.id = '$id' and room.id = '$idRoom'
            and show_film.show_date = '$today' ORDER BY show_film.id_showTimeFrame asc";
        return $this->getAllData($sql);
    }
}
