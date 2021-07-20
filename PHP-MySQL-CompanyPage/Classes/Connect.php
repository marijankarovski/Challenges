<?php


require_once __DIR__ . "/../const.php";

class Connect
{
    public $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSER, DBPASS);
        } catch (PDOException $e) {
            echo "Cannot connect to database";
            die();
        }
    }
}
