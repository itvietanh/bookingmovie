<?php

namespace App\models\auth;

use App\models\BaseModel;

class LoginModel extends BaseModel
{
    public function checkAccount($username, $password)
    {
        $sql = "SELECT * FROM account WHERE (username = '$username' OR email = '$username') AND password = '$password'
                    ";
        return $this->getRowData($sql);
    }

    public function signUP($username, $password, $name, $email, $phone)
    {
        $sql = "insert into `account` (`username`, `password`, `name`, `email`, `phone`) 
            VALUES ('$username', '$password','$name','$email','$phone')";
        return $this->getRowData($sql);
    }

    public function checkEmail($email)
    {
        $sql = "select * from account where email = '" . $email . "'";
        return $this->getRowData($sql);
    }

    public function sendConfirmationAccount($rand, $email)
    {
        // Sử dụng PHPMailer
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';
        require 'PHPMailer/src/Exception.php';

        $mail = new \PHPMailer\PHPMailer\PHPMailer();
        try {

            $mail->IsSMTP(); // enable SMTP
            $mail->CharSet = "UTF-8";
            $mail->IsHTML(true);
            $mail->SMTPDebug = 0; // gỡ lỗi: 0 = không hiển thị, 1 = hiển thị lỗi và tin nhắn, 2 = chỉ hiển thị tin nhắn
            $mail->SMTPAuth = true; // xác thực SMTP
            $mail->SMTPSecure = 'tls'; // kết nối an toàn SMTP: tls hoặc ssl
            $mail->Host = "sandbox.smtp.mailtrap.io"; // địa chỉ máy chủ SMTP của bạn
            $mail->Port = 587; // cổng SMTP của bạn
            $mail->Username = "1acd448205393b"; // tài khoản SMTP của bạn
            $mail->Password = "30004f6b7bcc70"; // mật khẩu SMTP của bạn
            $mail->SetFrom("vuvietanh591@gmail.com"); // địa chỉ email người gửi
            $mail->Subject = "Mã đặt lại mật khẩu"; // chủ đề email 
            $mail->Body = 'Mã đặt lại mật khẩu của bạn là: ' . "$rand"; // nội dung email
            $mail->AddAddress($email); // địa chỉ email người nhận

            if (!$mail->Send()) {
                return false; // Gửi email thất bại
            } else {
                return true; // Gửi email thành công
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function setPassNew($password, $email) {
        $sql = "UPDATE `account` SET `password` = '$password' WHERE `account`.`email` = '".$email."';";
        return $this->getRowData($sql);
    }
}
