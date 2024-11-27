<?php

namespace App\controllers\user;

use App\controllers\BaseController;
use App\models\user\FilmModel;
use App\models\user\GenreModel;
use App\models\user\ProcessComment;
use App\models\user\RoomModel;
use App\models\user\ShowTimeModel;
use App\models\user\ProcessMail;
use App\models\user\PaymentModel;

class FilmController extends BaseController
{
    public function getFilmDetails($id)
    {
        // Object 
        $objFilm = new FilmModel();
        $objGenre = new GenreModel();
        $objRoom = new RoomModel();
        $objShowTime = new ShowTimeModel();

        //Call Function
        $listGenre = $objGenre->getAllGenre();
        $filmDetails = $objFilm->getFilmDetails($id);
        $comment = $objFilm->getCommentOfFilm($id);
        $room = $objRoom->getAllRoom();
        $showTime = $objShowTime->getAllShowTime();
        $ticketPrice = $objFilm->getPriceOfFilm($id);

        $selectedDate = '';
        $selectedRoom = '';

        if (isset($_POST['idShowTime']) &&  $_POST['idShowTime'] > 0) {
            $idShowTime = $_POST['idShowTime'];
            $date = $_POST['date'];
            $room = $_POST['room'];
            $listOrderSeat = $objFilm->getAllSeatOrder($id, $idShowTime, $date, $room);
            // var_dump($listOrderSeat);
            header('Content-Type: application/json');
            echo json_encode($listOrderSeat);
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $selectedDate = $_POST['date'];
            $selectedRoom = $_POST['room'];
            $time = $objShowTime->getTimeOfDay($id, $selectedDate, $selectedRoom);
            header('Content-Type: application/json');
            echo json_encode($time);
            exit;
        }


        include "app/views/header.blade.php";
        return $this->render(
            "user.film_details",
            [
                'filmDetails' => $filmDetails,
                'listGenre' => $listGenre,
                'comment' => $comment,
                'room' => $room,
                'showTime' => $showTime,
                'ticketPrice' => $ticketPrice
            ]
        );
    }

    public function film() {
        if (isset($_POST['btnSubmit']) && $_POST['btnSubmit'] != "") {
            $kyw = $_POST['kyw'];
        } else {
            $kyw = "";
        }
        $objFilm = new FilmModel();
        $listFilm = $objFilm -> loadAllFilm($kyw);
        $objGenre = new GenreModel();
        $listGenre = $objGenre -> getAllGenre();
        include "app/views/header.blade.php";
        return $this -> render('user.film', ['listFilm' => $listFilm, 'listGenre' => $listGenre]);
    }

    public function filmByGenre($id) {
        $objFilm = new FilmModel();
        $objGenre = new GenreModel();
        $filmByGenre = $objFilm -> loadAllByGenre($id);
        // var_dump($filmByGenre);
        $listGenre = $objGenre -> getAllGenre();
        include "app/views/header.blade.php";
        return $this -> render('user.filmByGenre', ['filmByGenre' => $filmByGenre, 'listGenre' => $listGenre]);
    }

    public function postComment($id)
    {
        // Object 
        $objFilm = new FilmModel();
        $objComment = new ProcessComment();

        //Validation
        $error = [];
        $hasError = false;
        // Process comment submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST['comment'])) {
                $error['comment'] = "Bạn phải nhập bình luận";
                $hasError = true;
            } else if (preg_match('/[\'"\/\\;()$&*~`!<>|=#{}]/', $_POST['comment'])) {
                $error['comment'] = "Bình luận không được chứa các kí tự đặc biệt";
                $hasError = true;
            } else {
                $error['comment'] = "";
                $comment = $_POST['comment'];
                $acc = $_SESSION['auth']['id'];
                $date = date("Y-m-d");
            }

            if (!$hasError) {
                $objComment->sendComment($acc, $id, $comment, $date);
                // $comment = $_POST['comment'];
                // Phản hồi trả về cho client (giả sử)
                $filmDetails = $objFilm->getFilmDetails($id);
                $latestComment = $objFilm->getCommentOfFilm($id);
                // Trả về dữ liệu bình luận mới nhất dưới dạng JSON
                header('Content-Type: application/json');
                echo json_encode($latestComment);
                // Kết thúc việc xử lý
                exit;
            }
        } else {
            // Invalid request method
            http_response_code(405);
            echo "Phương thức yêu cầu không hợp lệ!";
        }
    }

    public function checkOut()
    {
        // require "libs/phpqrcode/qrlib.php";
        $objFilm = new FilmModel();

        if (isset($_POST['btnSubmit']) && $_POST['btnSubmit']) {
            $nameFilm = $_POST['nameFilm'];
            $idFilm = $_POST['idFilm'];
            $seatSelected = $_POST['selected_seats'];
            $totalPrice = $_POST['price'];
            $ticketQuantity = $_POST['hidden_quantity'];
            $orderDate = $_POST['orderDate'];
            $orderRoom = $_POST['orderRoom'];
            $startTime = $_POST['startTime'];
            $endTime = $_POST['endTime'];
            $nameRoom = $_POST['nameRoom'];
            $nameCinema = $_POST['nameCinema'];
            $ticketPrice = $objFilm->getPriceOfFilm($idFilm);
            $idShowTime = $_POST['idShowTime'];

            $_SESSION['infoOrderTicket'] = [
                'idFilm' => $idFilm,
                'nameFilm' => $nameFilm,
                'seatSelected' => $seatSelected,
                'totalPrice' => $totalPrice,
                'ticketQuantity' => $ticketQuantity,
                'orderDate' => $orderDate,
                'orderRoom' => $orderRoom,
                'startTime' => $startTime,
                'endTime' => $endTime,
                'nameRoom' => $nameRoom,
                'nameCinema' => $nameCinema,
                'ticketPrice' => $ticketPrice,
                'idShowTime' => $idShowTime
            ];
        }

        include "app/views/header.blade.php";
        return $this->render("user.checkout", [
            'seatSelected' => $seatSelected,
            'totalPrice' => $totalPrice,
            'ticketQuantity' => $ticketQuantity,
            'ticketPrice' => $ticketPrice,
            'orderDate' => $orderDate,
            'orderRoom' => $orderRoom,
            'startTime' => $startTime,
            'endTime' => $endTime,
            'nameRoom' => $nameRoom,
            'nameCinema' => $nameCinema,
            'nameFilm' => $nameFilm
        ]);
    }
 
    public function payment()
    {
        $objMail = new ProcessMail();
        $objPayment = new PaymentModel();

        if (isset($_POST['btnSubmit']) && $_POST['btnSubmit']) {
            if (isset($_SESSION['infoOrderTicket']) && $_SESSION['infoOrderTicket']) {
                $nameFilm = $_SESSION['infoOrderTicket']['nameFilm'];
                $idFilm = $_SESSION['infoOrderTicket']['idFilm'];
                $seatSelected = $_SESSION['infoOrderTicket']['seatSelected'];
                $totalPrice = $_SESSION['infoOrderTicket']['totalPrice'];
                $ticketQuantity = $_SESSION['infoOrderTicket']['ticketQuantity'];
                $orderDate = $_SESSION['infoOrderTicket']['orderDate'];
                $orderRoom = $_SESSION['infoOrderTicket']['orderRoom'];
                $startTime = $_SESSION['infoOrderTicket']['startTime'];
                $endTime = $_SESSION['infoOrderTicket']['endTime'];
                $nameRoom = $_SESSION['infoOrderTicket']['nameRoom'];
                $nameCinema = $_SESSION['infoOrderTicket']['nameCinema'];
                $idAccount = $_SESSION['auth']['id'];
                $username = $_SESSION['auth']['name'];
                $email = $_SESSION['auth']['email'];
                $idShowTime = $_SESSION['infoOrderTicket']['idShowTime'];
                $cinema = 1; // Website chỉ chiếu 1 rạp;
                $methodPayment = $_POST['methodPayment'];
                if ($methodPayment == 'paymentCash') {
                    $orderId = time() . "";
                    $pathQR = "./qr_code/";
                    $qrcode = $pathQR . time() . ".png";
                    \QRcode::png("$username " . "$email " . "$nameFilm " . "$nameRoom " . "$nameCinema " . "$orderDate " . "$totalPrice " . "$seatSelected ", $qrcode, 'H', 3, 3);
                    $objPayment->paymentTicket($seatSelected, $idAccount, $orderDate, $idShowTime, $totalPrice, $idFilm, $ticketQuantity, $methodPayment, $orderRoom, $cinema, $qrcode, $orderId);
                    $objMail->sendConfirmationEmail($username, $email, $seatSelected, $nameFilm, $startTime, $endTime, $totalPrice, $ticketQuantity, $orderDate, $nameRoom, $nameCinema, $qrcode, $orderId);
                    unset($_SESSION['infoOrderTicket']);
                    header("Location: " . route('thank'));
                } else if ($methodPayment == 'paymentMomo') {
                    header("Location: " .route('paymentMomo'));
                }
            }
        }
    }

    public function paymentMomo()
    {

        require "app/views/user/payment_momo.blade.php";
    }

    public function thank()
    {
        
        $objGenre = new GenreModel();
        $listGenre = $objGenre -> getAllGenre();
        // var_dump($_GET);
        $objMail = new ProcessMail();
        $objPayment = new PaymentModel();
        if (isset($_GET['partnerCode']) && $_GET['partnerCode']) {
            if (isset($_SESSION['infoOrderTicket']) && $_SESSION['infoOrderTicket']) { 
                // Thông tin thanh toán
                $partnerCode = $_GET['partnerCode'];
                $orderId = $_GET['orderId'];
                $amount = $_GET['amount'];
                $orderInfo = $_GET['orderInfo'];
                $orderType = $_GET['orderType'];
                $transId = $_GET['transId'];
                $payType = $_GET['payType'];
                
                $nameFilm = $_SESSION['infoOrderTicket']['nameFilm'];
                $idFilm = $_SESSION['infoOrderTicket']['idFilm'];
                $seatSelected = $_SESSION['infoOrderTicket']['seatSelected'];
                $totalPrice = $_SESSION['infoOrderTicket']['totalPrice'];
                $ticketQuantity = $_SESSION['infoOrderTicket']['ticketQuantity'];
                $orderDate = $_SESSION['infoOrderTicket']['orderDate'];
                $orderRoom = $_SESSION['infoOrderTicket']['orderRoom'];
                $startTime = $_SESSION['infoOrderTicket']['startTime'];
                $endTime = $_SESSION['infoOrderTicket']['endTime'];
                $nameRoom = $_SESSION['infoOrderTicket']['nameRoom'];
                $nameCinema = $_SESSION['infoOrderTicket']['nameCinema'];
                $idAccount = $_SESSION['auth']['id'];
                $username = $_SESSION['auth']['name'];
                $email = $_SESSION['auth']['email'];
                $idShowTime = $_SESSION['infoOrderTicket']['idShowTime'];
                $cinema = 1; // Website chỉ chiếu 1 rạp;
                $methodPayment = "paymentMomo";
                //Insert thông tin vé đặt
                $orderId = time() . "";
                $pathQR = "./qr_code/";
                $qrcode = $pathQR . time() . ".png";
                \QRcode::png("$username " . "$email " . "$nameFilm " . "$nameRoom " . "$nameCinema " . "$orderDate " . "$totalPrice " . "$seatSelected ", $qrcode, 'H', 3, 3);
                // die();
                $objPayment -> paymentTicket($seatSelected, $idAccount, $orderDate, $idShowTime, $totalPrice, $idFilm, $ticketQuantity, $methodPayment, $orderRoom, $cinema, $qrcode, $orderId);
                $objMail -> sendConfirmationEmail($username, $email, $seatSelected, $nameFilm, $startTime, $endTime, $totalPrice, $ticketQuantity, $orderDate, $nameRoom, $nameCinema, $qrcode, $orderId);
                // Insert thông tin thanh toán
                $objPayment -> paymentMomo($partnerCode, $orderId, $amount, $orderInfo, $orderType, $transId, $payType);
                // unset($_SESSION['infoOrderTicket']);
                header("Location: " . route("thank"));
                unset($_SESSION['infoOrderTicket']);

            }
        }
        include "app/views/header.blade.php";
        return $this->render("user.thank", ['listGenre' => $listGenre]);
    }
}
