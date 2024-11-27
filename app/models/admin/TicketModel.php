<?php

namespace App\models\admin;

use App\models\BaseModel;

class TicketModel extends BaseModel
{
    public function getAllTickets()
    {
        $sql = "SELECT ticket.id as 'id', ticket.price as 'price', film.name as 'fname' FROM `ticket`
            JOIN `film` on film.id = ticket.id_film";
        return $this->getAllData($sql);
    }

    // Order Ticket Model

    public function getAllOrderTicket($kyw = "")
    {
        if ($kyw == "") {
            $sql = "select order_ticket.id as 'id_order', account.name as 'username', film.name as 'name_film', show_time_frame.start_time as 'start_time',
                    show_time_frame.end_time as 'end_time', room.name as 'name_room', cinema.name as 'name_cinema', 
                    order_ticket.seat_order as 'seat_order', order_ticket.order_date as 'order_date',
                    order_ticket.quantity as 'quantity', order_ticket.price as 'price', order_ticket.order_id as 'order_id', order_ticket.status as 'status' from order_ticket
                    join film on order_ticket.id_film = film.id
                    join show_time_frame on order_ticket.id_showTimeFrame = show_time_frame.id
                    join room on order_ticket.id_room = room.id
                    join cinema on order_ticket.id_cinema = cinema.id
                    join account on order_ticket.id_account = account.id ORDER BY order_date desc";
            return $this->getAllData($sql);
        }

        if ($kyw != "") {
            $sql = "select order_ticket.id as 'id_order', account.name as 'username', film.name as 'name_film', show_time_frame.start_time as 'start_time',
                    show_time_frame.end_time as 'end_time', room.name as 'name_room', cinema.name as 'name_cinema', 
                    order_ticket.seat_order as 'seat_order', order_ticket.order_date as 'order_date',
                    order_ticket.quantity as 'quantity', order_ticket.price as 'price', order_ticket.order_id as 'order_id', order_ticket.status as 'status' from order_ticket
                    join film on order_ticket.id_film = film.id
                    join show_time_frame on order_ticket.id_showTimeFrame = show_time_frame.id
                    join room on order_ticket.id_room = room.id
                    join cinema on order_ticket.id_cinema = cinema.id
                    join account on order_ticket.id_account = account.id 
                    where order_id like '%$kyw%'
                    ORDER BY order_date desc";
            return $this->getAllData($sql);
        }
    }

    public function confirmTicket($id) {
        $sql = "UPDATE `order_ticket` SET `status` = 'Đã thanh toán' WHERE `order_ticket`.`id` = $id";
        return $this->getRowData($sql);
    }

    public function getTicketOrder($id) {
        $sql = "select order_ticket.id as 'id_order', account.name as 'username', film.name as 'name_film', show_time_frame.start_time as 'start_time', film.image,
            show_time_frame.end_time as 'end_time', room.name as 'name_room', cinema.name as 'name_cinema', 
            order_ticket.seat_order as 'seat_order', order_ticket.order_date as 'order_date',
            order_ticket.quantity as 'quantity', order_ticket.price as 'price', order_ticket.order_id as 'order_id', order_ticket.status as 'status', order_ticket.qr_code as 'qr_code' from order_ticket
            join film on order_ticket.id_film = film.id
            join show_time_frame on order_ticket.id_showTimeFrame = show_time_frame.id
            join room on order_ticket.id_room = room.id
            join cinema on order_ticket.id_cinema = cinema.id
            join account on order_ticket.id_account = account.id 
            where order_ticket.id = $id";
            return $this->getRowData($sql);
    }

    public function confirmPrintTicket($id) {
        $sql = "UPDATE `order_ticket` SET `status` = 'Vé đã được in' WHERE `order_ticket`.`id` = $id";
        return $this->getRowData($sql);
    }
}
