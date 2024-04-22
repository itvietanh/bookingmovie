<?php 
    namespace App\models\auth;
    use App\models\BaseModel;

    class LoginModel extends BaseModel {
        public function checkAccount($username, $password) {
            $sql = "SELECT * FROM account WHERE (username = '$username' OR email = '$username') AND password = '$password'
                    ";
            return $this -> getRowData($sql);
        }
    }
?>