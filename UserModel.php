<?php

require "Database.php";
require "User.php";

class UserModel
{
    private $dbTable;

    private $dbConnection;

    /**
     * StudentModel constructor.
     */
    public function __construct()
    {
        $this->dbTable = "users";
        $this->dbConnection = new Database();
    }

    public function getUsers()
    {
        $statement = $this->dbConnection->getConnection()->prepare("SELECT id, email, status FROM " . $this->dbTable);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);

        $result = $statement->fetchAll();

        $users = [];
        foreach ($result as $item) {
            $user = new User();
            $user->setId($item['id']);
            $user->setEmail($item['email']);
            $user->setStatus($item['status']);

            $users[] = $user;
        }

        return $user;
    }

    public function changeStatus($id, $status)
    {
        $statement = $this->dbConnection->getConnection()->prepare("UPDATE " . $this->dbTable . "SET status='" . $status . "' WHERE id=" . $id);
        $statement->execute();
    }

    public function addUser(User $user) {
        $email = $user->getEmail();
        $status = 0;

        $statement = $this->dbConnection->getConnection()->prepare("INSERT INTO " . $this->dbTable . "(email, status) VALUES ('".$email."', '".$status."')");
        $statement->execute();
    }
}