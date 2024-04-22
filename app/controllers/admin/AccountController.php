<?php

namespace App\controllers\admin;

use App\controllers\BaseController;
use App\models\admin\AccountModel;

class AccountController extends BaseController
{

    private $objAcc;
    private $error;
    private $hasError;
    private $name;
    private $username;
    private $password;
    private $email;
    private $phone;
    private $role;

    public function __construct()
    {
        $this->objAcc = new AccountModel();
        $this->error = [];
        $this->hasError = false;
    }

    public function getAccount()
    {
        $listAccount = $this->objAcc->getAllAccount();
        include "app/views/admin/header.blade.php";
        include "app/views/admin/aside.blade.php";
        return $this->render('admin.accounts.listAccount', ['listAccount' => $listAccount]);
    }

    public function addAccount()
    {
        if (isset($_POST['btnSubmit']) && $_POST['btnSubmit']) {
            $this->validateAccountData();
            if (!$this->hasError) {
                $this->objAcc->add($this->name, $this->username, $this->password, $this->email, $this->phone, $this->role);
                header("Location: " . route('accountManager'));
            }
        }
        $role = $this->objAcc->getRoleAccount();
        include "app/views/admin/header.blade.php";
        return $this->render('admin.accounts.addAccount', ['error' => $this->error, 'role' => $role]);
        include "app/views/admin/footer.blade.php";
    }

    public function editAccount($id)
    {
        if (isset($_POST['btnSubmit']) && $_POST['btnSubmit']) {
            $id = $_POST['id'];
            $this->validateAccountData();

            if (!$this->hasError) {
                $this->objAcc->update($id, $this->name, $this->username, $this->password, $this->email, $this->phone, $this->role);
                header("Location: " . route('accountManager'));
            }
        }

        $account = $this->objAcc->getOneAccount($id);
        $role = $this->objAcc->getRoleAccount();
        include "app/views/admin/header.blade.php";
        return $this->render('admin.accounts.editAccount', ['error' => $this->error, 'account' => $account, 'role' => $role]);
        include "app/views/admin/footer.blade.php";
    }

    public function deleteAccount($id) {
        if (isset($id) && $id > 0) {
            $this -> objAcc -> delete($id);
            echo "  
                <script>
                    var confirmDelete = confirm('Account deleted successfully.');
                    if (confirmDelete) {
                        window.location.href = '" . route('accountManager') . "';
                    } 
                </script>";
        }
    }

    private function validateAccountData()
    {
        $this->name = $_POST['name'] ?? '';
        $this->username = $_POST['username'] ?? '';
        $this->password = $_POST['password'] ?? '';
        $this->email = $_POST['email'] ?? '';
        $this->phone = $_POST['phone'] ?? '';
        $this->role = $_POST['role'] ?? '';

        if (empty($this->name)) {
            $this->error['name'] = "Warning: Enter name account";
            $this->hasError = true;
        } else {
            $this->error['name'] = "";
        }

        if (empty($_POST['username'])) {
            $this->error['username'] = "Warning: Enter username";
            $this->hasError = true;
        } else {
            $this->error['username'] = "";
        }

        if (empty($_POST['password'])) {
            $this->error['password'] = "Warning: Enter password account";
            $this->hasError = true;
        } else {
            $this->error['password'] = "";
        }

        if (empty($_POST['email'])) {
            $this->error['email'] = "Warning: Enter email";
            $this->hasError = true;
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $this->error['email'] = "Warning: Enter email in wrong format.
                Include @ in the email address";
            $this->hasError = true;
        } else {
            $this->error['email'] = "";
        }

        if (empty($_POST['phone'])) {
            $this->error['phone'] = "Warning: Enter phone";
            $this->hasError = true;
        } else if (!is_numeric($_POST['phone'])) {
            $this->error['phone'] = "Warning: Enter phone is number";
            $this->hasError = true;
        } else {
            $this->error['phone'] = "";
        }

        if ($_POST['role'] == 'luachon') {
            $this->error['role'] = "Warning: Select role account";
            $this->hasError = true;
        } else {
            $this->error['role'] = "";
        }
    }
}
