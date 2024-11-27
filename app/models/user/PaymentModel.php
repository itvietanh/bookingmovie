<?php

namespace App\models\user;

use App\models\BaseModel;

class PaymentModel extends BaseModel
{
    public function paymentTicket($seatSelected, $idAccount, $orderDate, $idShowTime, $totalPrice, $idFilm, $ticketQuantity, $methodPayment, $orderRoom, $cinema, $qrcode, $orderId)
    {
        if ($methodPayment == "paymentCash") {
            $sql = "INSERT INTO `order_ticket` (`id_account`, `seat_order`, `order_date`, `id_showTimeFrame`, `id_film`, `id_room`, `id_cinema`, `price`, `quantity`, `qr_code`, `order_id`, `status`)
          VALUES ('$idAccount', '$seatSelected', '$orderDate', '$idShowTime', '$idFilm', '$orderRoom', '$cinema', '$totalPrice', '$ticketQuantity', '$qrcode', '$orderId', 'Chờ thanh toán');";
          return $this -> getRowData($sql);
        } else if ($methodPayment == "paymentMomo") {
            $sql = "INSERT INTO `order_ticket` (`id_account`, `seat_order`, `order_date`, `id_showTimeFrame`, `id_film`, `id_room`, `id_cinema`, `price`, `quantity`, `qr_code`, `order_id`, `status`)
          VALUES ('$idAccount', '$seatSelected', '$orderDate', '$idShowTime', '$idFilm', '$orderRoom', '$cinema', '$totalPrice', '$ticketQuantity', '$qrcode', '$orderId', 'Đã thanh toán');";
            return $this -> getRowData($sql);
        }
    }

    public function paymentMomo($partnerCode, $orderId, $amount, $orderInfo, $orderType, $transId, $payType) {
      $sql = "INSERT INTO `payment_momo` (`partner_code`, `order_id`, `amount`, `order_info`, `order_type`, `trans_id`, `pay_type`) 
      VALUES ('$partnerCode', '$orderId', '$amount', '$orderInfo', '$orderType', '$transId', '$payType');";
      return $this -> getRowData($sql);
  }
}
