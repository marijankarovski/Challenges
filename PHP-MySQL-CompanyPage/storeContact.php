<?php

require_once __DIR__ . "/Classes/Connect.php";
$conn = new Connect;

$sql = "INSERT INTO contact (company_id, name, email, message) VALUES (:company_id, :name, :email, :message)";

$stmt = $conn->pdo->prepare($sql);

if ($stmt->execute($_POST)) {
    header("Location: company.php?id={$_POST['company_id']}&contact=1");
    die();
};

header("Location: company.php?id={$_POST['company_id']}&status=error");
