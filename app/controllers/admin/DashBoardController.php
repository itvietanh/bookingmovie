<?php 
    namespace App\controllers\admin;
    use App\controllers\BaseController;

    class DashBoardController extends BaseController {
        public function home() {
            include "app/views/admin/header.blade.php";
            include "app/views/admin/aside.blade.php";
            return $this -> render("admin.home");
        }

        
    }
?>