<?php

namespace App\models\admin;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\models\BaseModel;

class Export extends BaseModel
{
    function remove_duplicates($array) {
        return array_values(array_unique($array));
    }

    public function export()
    {
        $sql = "select account.name as 'username', film.name as 'name_film', room.name as 'name_room', cinema.name as 'name_cinema', order_ticket.order_date as 'order_date',
        CONCAT(show_time_frame.start_time, ' - ', show_time_frame.end_time) AS combined_time, 
        order_ticket.seat_order as 'seat_order', film.rel_date, order_ticket.quantity as 'quantity', order_ticket.status as 'status', order_ticket.order_id as 'order_id', order_ticket.price as 'price'
        from order_ticket
        join film on order_ticket.id_film = film.id
        join show_time_frame on order_ticket.id_showTimeFrame = show_time_frame.id
        join room on order_ticket.id_room = room.id
        join cinema on order_ticket.id_cinema = cinema.id
        join account on order_ticket.id_account = account.id ORDER BY order_date desc";

        $dataOrder = $this->getAllData($sql);
        $indexedData = array_map('array_values', $dataOrder);
        $uniqueIndexedData = array_map(function($item) {
            return $this->remove_duplicates($item);
        }, $indexedData);
        $data = $uniqueIndexedData;

        $filteredData = array_filter($data, function ($entry) {
            return $entry[9] === 'Đã thanh toán';
        });

        // echo "<pre>";
        // print_r($data);
        // die();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the header
        $header = ['Tên Người Dùng', 'Tên Phim', 'Phòng Chiếu', 'Rạp Chiếu', 'Ngày Chiếu', 'Khung Giờ Chiếu', 'Ghế Ngồi', 'Ngày Đặt', 'Số Lượng Vé', 'Trạng Thái', 'Mã Vé', 'Tổng Giá'];
        $sheet->fromArray($header, NULL, 'A1');

        // Fill the spreadsheet with filtered data
        $sheet->fromArray($filteredData, NULL, 'A2');

        // Create a writer and save the file to a temporary location
        $writer = new Xlsx($spreadsheet);
        $filename = 've_dat.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $filename);
        $writer->save($temp_file);

        // Force download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        readfile($temp_file);

        // Delete temporary file
        unlink($temp_file);
        exit();
    }
}
