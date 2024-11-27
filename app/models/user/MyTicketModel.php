<?php

namespace App\models\user;

use App\models\BaseModel;

class MyTicketModel extends BaseModel
{
    public function loadUsedTicket($id_account)
    {
        $sql = "select order_ticket.id as 'id_order', account.name as 'username', film.name as 'name_film', show_time_frame.start_time as 'start_time',
        show_time_frame.end_time as 'end_time', room.name as 'name_room', cinema.name as 'name_cinema', 
        order_ticket.seat_order as 'seat_order', order_ticket.order_date as 'order_date',
        order_ticket.quantity as 'quantity', order_ticket.price as 'price', order_ticket.status as 'status' from order_ticket
        join film on order_ticket.id_film = film.id
        join show_time_frame on order_ticket.id_showTimeFrame = show_time_frame.id
        join room on order_ticket.id_room = room.id
        join cinema on order_ticket.id_cinema = cinema.id
        join account on order_ticket.id_account = account.id
        where account.id = $id_account and order_ticket.status not like '%Vé đã được in%' 
        order by order_ticket.id desc;";
        return $this -> getAllData($sql);
    }
}
