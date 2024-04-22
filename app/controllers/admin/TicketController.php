<?php
    namespace App\controllers\admin;
    use App\controllers\BaseController;
    use App\models\admin\TicketModel;

    class TicketController extends BaseController {
        public function getTickets() {
            $obj = new TicketModel();
            $ticket = $obj -> getAllTickets();
            // var_dump($ticket);
            // die();
            include "app/views/admin/header.blade.php";
            include "app/views/admin/aside.blade.php";
            return $this -> render("admin.ticket.listTicket", ['ticket' => $ticket]);
        }

        public function getOrderTicket() {
            $obj = new TicketModel();
            $kyw = "";
            if (isset($_POST['btnSearch']) && $_POST['btnSearch']) {
               $kyw = $_POST['kyw'];
            }
            $orderTicket = $obj -> getAllOrderTicket($kyw);
            include "app/views/admin/header.blade.php";
            include "app/views/admin/aside.blade.php";
            return $this -> render("admin.ticket.orderTicket", ['orderTicket' => $orderTicket]);
        }
    }
?>