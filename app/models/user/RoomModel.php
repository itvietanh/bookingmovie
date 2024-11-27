<?php
    namespace App\models\user;
    use App\models\BaseModel;

    class RoomModel extends BaseModel {
        public function getAllRoom() {
            $sql = "SELECT * FROM `room`";
            return $this -> getAllData($sql);
        }
    }
?>