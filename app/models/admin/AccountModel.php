<?php
    namespace App\models\admin;
    use App\models\BaseModel;

    class AccountModel extends BaseModel {
        public function getAllAccount() {
            $sql = "SELECT * FROM `account`";
            return $this -> getAllData($sql);
        }

        public function getRoleAccount() {
            $sql = "SELECT DISTINCT account.role FROM account";
            return $this -> getAllData($sql);
        }

        public function add($name, $username, $password, $email, $phone, $role) {
            $sql = "INSERT INTO `account` (`username`, `password`, `name`, `email`, `phone`, `role`)
             VALUES ('$username', '$password', '$name', '$email', '$phone', '$role');";
            return $this -> getRowData($sql);
        }

        public function getOneAccount($id) {
            $sql = "SELECT * FROM `account` where account.id = $id";
            return $this -> getRowData($sql);
        }

        public function update($id, $name, $username, $password, $email, $phone, $role) {
            $sql = "UPDATE `account` SET `username` = '$username', `password` = '$password', `name` = '$name', `email` = '$email', `phone` = '$phone', `role` = '$role' WHERE `account`.`id` = $id;";
            return $this -> getRowData($sql);
        }

        public function delete($id) {
            $sql = "DELETE FROM `account` where account.id = $id";
            return $this -> getRowData($sql);
        }

    }
?>