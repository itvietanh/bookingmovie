<?php 
    namespace App\controllers\admin;
    use App\controllers\BaseController;
    use App\models\admin\StatisticalModel;
    use App\models\admin\ProcessChart;

    class StatisticalController extends BaseController {
        public function filmStatiscal() {
            $obj = new StatisticalModel();
            $filmStatistical = $obj -> filmStatiscal();
            include "app/views/admin/header.blade.php";
            include "app/views/admin/aside.blade.php";
            return $this -> render('admin.statistical.filmStatistical', ['filmStatistical' => $filmStatistical]);
        }

        public function commentStatistical() {
            $obj = new StatisticalModel();
            $commentStatistical = $obj -> commentStatistical();
            include "app/views/admin/header.blade.php";
            include "app/views/admin/aside.blade.php";
            return $this -> render('admin.statistical.commentStatistical', ['commentStatistical' => $commentStatistical]);
        }

        public function revenueStatistical() {
            $obj = new StatisticalModel();
            $revenueStatistical = $obj -> revenueStatistical();
            include "app/views/admin/header.blade.php";
            include "app/views/admin/aside.blade.php";
            return $this -> render('admin.statistical.statisticalRevenue', ['revenueStatistical' => $revenueStatistical]);
        }

        public function genreStatistical() {
            $obj = new StatisticalModel();
            $genreStatistical = $obj -> genreStatistical();
            include "app/views/admin/header.blade.php";
            include "app/views/admin/aside.blade.php";
            return $this -> render('admin.statistical.genreStatistical', ['genreStatistical' => $genreStatistical]);
        }

        public function ProcessChart() {
            $obj = new ProcessChart();
            $obj -> getData();
        }
        // public function revenue() {
        //     $obj = new StatisticalModel();
        //     $data = $obj -> getRevenue($kyw = "");
        //     // Xuất dữ liệu dưới dạng JSON
        //     echo json_encode($data);
        //     die();
        //     return $this -> render("admin.home");
        // }
    }
?>