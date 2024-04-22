<?php 
    namespace App\models\user;
    use App\models\BaseModel;

    class Login extends BaseModel {
        public function checkAccount($email, $password) {
            $sql = "SELECT * FROM `account`
                    WHERE account.email = '$email' and account.password = '$password'
            ";
            return $this -> getRowData($sql);
        }
    }
?>