<?php

require_once __DIR__ . "/Connect.php";

class Company
{
    private $conn;

    public function __construct()
    {
        $db = new Connect;
        $this->conn = $db->pdo;
    }

    public function addToDB($data)
    {
        $sql = "INSERT INTO company (coverImage, mainTitle, subtitle, about, telephone, location, service_id, imgUrl1, descUrl1, imgUrl2, descUrl2, imgUrl3, descUrl3, description, LinkedIn, facebook, twitter, google) 
        VALUES (:coverImage, :mainTitle, :subtitle, :about, :telephone, :location, :service_id, :imgUrl1, :descUrl1, :imgUrl2, :descUrl2, :imgUrl3, :descUrl3, :description, :LinkedIn, :facebook, :twitter, :google)";

        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute($data)) {
            return $this->conn->lastInsertId();
        }
        return 0;
    }
    public function getData($id)
    {
        $sql = "SELECT company.*, provide.provider FROM company 
                JOIN provide ON provide.id = company.service_id 
                WHERE company.id={$id}";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
