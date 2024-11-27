<?php
    $img_path = "../uploads/";
    $path = "http://localhost/Personal_Project/";
    $path_image = "http://localhost/Personal_Project";

    $seat = [
        "A"=> [1,2,3,4,5,6,7,8,9,10],
        "B"=> [1,2,3,4,5,6,7,8,9,10],
        "C"=> [1,2,3,4,5,6,7,8,9,10],
        "D"=> [1,2,3,4,5,6,7,8,9,10],
    ];

    // Tạo một mảng mới chứa 40 index ghế
    $allSeats = [];
    foreach ($seat as $row => $seats) {
        foreach ($seats as $number) {
            $allSeats[] = $row . $number;
        }
    }

    // Chuyển đổi mảng thành chuỗi JSON
    $allSeats_json = json_encode($allSeats);
?>

