<?php 
    namespace App\controllers\user;
    use App\controllers\BaseController;
    use App\models\user\MyTicketModel;

    class TicketController extends BaseController {
        public function myTicket() {
            $id_account = $_SESSION['auth']['id'];
            $obj = new MyTicketModel();
            $usedTicket = $obj -> loadUsedTicket($id_account);
            include "app/views/header.blade.php";
            return $this -> render('user.my_ticket', ['usedTicket' => $usedTicket]);
        }
    }
?>