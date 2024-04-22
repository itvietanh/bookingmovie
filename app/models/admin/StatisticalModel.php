<?php 
    namespace App\models\admin;
    use App\models\BaseModel;

    class StatisticalModel extends BaseModel {
        public function getRevenue($kyw = "") {
            if ($kyw == "") {
                $sql = "SELECT order_date, (price * count(price)) as 'revenue' FROM `order_ticket`
                GROUP BY order_date limit 30";
                return $this -> getAllData($sql);
              }
              if ($kyw != "") {
                $sql = "SELECT order_date, (price * count(price)) as 'revenue' FROM `order_ticket`
                GROUP BY order_date having order_date = date_format($kyw, 'Y/m')";
                return $this -> getAllData($sql);
              }
        }
    }
?>