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

        public function confirmPayment($id) {
            $obj = new TicketModel();
            $obj -> confirmTicket($id);
            header("Location: " .route("orderTicketManager"));
        }

        public function printTicket($id) {
            $obj = new TicketModel();
            $ticketOrder = $obj -> getTicketOrder($id);
            // var_dump($ticketOrder);
            include "app/views/admin/header.blade.php";
            include "app/views/admin/aside.blade.php";
            return $this -> render('admin.ticket.printTicket', ['ticketOrder' => $ticketOrder]);
        }

        public function confirmTicket($id) {
            $obj = new TicketModel();
            if (isset($id) && $id > 0) {
                $obj -> confirmPrintTicket($id);
                echo "<script>alert('In Vé Thành Công')</script>";
                header("Location: " .route("orderTicketManager"));
            }
        }

        
    }
?>