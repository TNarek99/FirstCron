<?php

class Database
{
    const HOST = "localhost";
    const DATABASE = "crone";
    const USERNAME = "root";
    const PASSWORD = "qrtmnkl1205";

    /**
     * @var PDO
     */
    private $connection;

    /**
     * DbConnection constructor.
     */
    public function __construct()
    {
        $conn = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DATABASE, self::USERNAME, self::PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->connection = $conn;
    }

    /**
     * @return PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }
}