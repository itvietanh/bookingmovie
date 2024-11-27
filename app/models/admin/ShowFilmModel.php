<?php

namespace App\models\admin;

use App\models\BaseModel;

class ShowFilmModel extends BaseModel
{
    public function addShowFilm()
    {
        // Số lượng khung giờ chiếu trong một ngày
        $numTimeSlots = 5;

        // Số lượng phòng chiếu
        $numRooms = 5;

        // Lấy ngày hôm sau
        $currentDate = date("Y-m-d");
        // $newDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));

        // Lấy danh sách phim
        $sql = "SELECT id FROM film";
        $cinema = 1; // 1 rạp 
        $films = $this->getAllData($sql);

        // Lặp qua từng bộ phim
        foreach ($films as $film) {
            $filmId = $film['id'];
            for ($i = 1; $i <= $numRooms; $i++) {
                for ($j = 1; $j <= $numTimeSlots; $j++) {
                    $roomId = $i;
                    $idShowFilm = $j;
                    // Thêm lịch chiếu mới vào cơ sở dữ liệu
                    $sqlInsert = "INSERT INTO `show_film` (`show_date`, `id_film`, `id_showTimeFrame`, `id_cinema`, `id_room`) 
                        VALUES ('$currentDate', '$filmId', '$idShowFilm', '$cinema', '$roomId')";
                    $this->getRowData($sqlInsert);
                }
            }
        }
    }
}
