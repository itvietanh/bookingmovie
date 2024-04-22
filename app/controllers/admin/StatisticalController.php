<?php 
    namespace App\controllers\admin;
    use App\controllers\BaseController;
    use App\models\admin\StatisticalModel;

    class StatisticalController extends BaseController {
        public function revenue() {
            $obj = new StatisticalModel();
            $data = $obj -> getRevenue($kyw = "");
            // Xuất dữ liệu dưới dạng JSON
            echo json_encode($data);
            die();
            return $this -> render("admin.home");
        }
    }
?>