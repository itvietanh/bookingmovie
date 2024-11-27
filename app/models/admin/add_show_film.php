<?php

require 'app/models/admin/ShowFilmModel.php'; // Đặt đúng đường dẫn tới file ShowFilmModel.php

// Tạo một instance của ShowFilmModel
$showFilmModel = new \App\models\admin\ShowFilmModel();

// Gọi phương thức để thêm lịch chiếu vào ngày hôm sau
$showFilmModel->addShowFilm();

echo "Thêm lịch chiếu vào ngày hôm sau thành công!";
?>
