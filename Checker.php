<?php

require_once "UserModel.php";

$userModel = new UserModel();

$users = $userModel->getUsers();

foreach ($users as $user) {
    if ($user->getStatus() == 0) {
        $address = $user->getEmail();
        mail($address,"Custom subject","Thx for registering.");

        $userModel->changeStatus($user->getId(), 1);
    }
}