<?php 
// Cấu hình file kết nối csdl
    const DBNAME = "filmbookingdb";
    const DBUSER = "root";
    const DBPASS = "";
    const DBHOST = "localhost";
    const DBCHARSET = "utf8";

    const BASE_URL = "http://localhost/Personal_Project/";

    function route($url) {
        return BASE_URL.$url;
    }

    function redirect($key, $msg, $url){
        $_SESSION[$key] = $msg;
        switch($key){
            case 'errors':
                unset($_SESSION['success']);
                break;
            case 'success':
                unset($_SESSION['errors']);
                break;
        }
        header('location: '.BASE_URL.$url."?msg=".$key);die;
    }
?>