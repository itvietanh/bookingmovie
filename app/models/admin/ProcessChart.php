<?php

namespace App\models\admin;
use App\models\BaseModel;

class ProcessChart extends BaseModel
{
    public function getData()
    {
        $sql = "SELECT order_date, (price * count(price)) as 'doanhthu' FROM `order_ticket`
            GROUP BY order_date limit 30";
        $result = $this->getAllData($sql);

        // Chuyển đổi dữ liệu thành một mảng đối tượng
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }

        // Trả về dữ liệu dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
