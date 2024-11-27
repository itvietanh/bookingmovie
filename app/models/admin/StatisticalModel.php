<?php

namespace App\models\admin;

use App\models\BaseModel;

class StatisticalModel extends BaseModel
{
    public function filmStatiscal()
    {
        $sql = "SELECT order_ticket.id as 'id',film.name as 'name_film', COUNT(order_ticket.id_film) as 'quantity' FROM `order_ticket`
                JOIN film ON order_ticket.id_film = film.id                                                                  
                GROUP BY film.name;";
        return $this->getAllData($sql);
    }
    public function commentStatistical()
    {
        $sql = "SELECT film.name as 'name_film', COUNT(comment.id) as 'quantity' FROM comment
                JOIN film ON comment.id_film = film.id
                GROUP BY film.name";
        return $this->getAllData($sql);
    }

    public function revenueStatistical($kyw = "")
    {
        if ($kyw == "") {
            $sql = "SELECT order_date, (price * count(price)) as 'doanhthu' FROM `order_ticket`
            GROUP BY order_date limit 30";
            return $this->getAllData($sql);
        }
        if ($kyw != "") {
            $sql = "SELECT order_date, (price * count(price)) as 'doanhthu' FROM `order_ticket`
            GROUP BY order_date having order_date = date_format($kyw, 'Y/m')";
            return $this->getAllData($sql);
        }
    }

    public function genreStatistical() {
        $sql = "SELECT film.name as 'filmName', genre.name as 'genreName', COUNT(film.id) as 'quantity' FROM `film`
        JOIN genre on film.id_genre = genre.id
        GROUP BY genre.id";
        return $this->getAllData($sql);
    }
}
