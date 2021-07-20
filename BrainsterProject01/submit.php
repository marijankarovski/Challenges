<?php

require_once __DIR__ . '/functions.php';

$conn = new mysqli('127.0.0.1', 'root', '', 'brainster_project01');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: form.php");
    die();
}

$required = ['name', 'namekompanija', 'email', 'telefon', 'academy_id'];

foreach ($required as $key) {
    if ($_POST[$key] == '') {
        header("Location: form.php?error=fields");
        die();
    }
}

if (validateString($_POST['name'])) {
    header("Location: form.php?error=name");
    die();
}

$mail = $_POST['email'];
if (!validateMail($mail)) {
    header("Location: form.php?error=mail");
    die();
}

$regNumber = '/^[0-9\.\-\/]+$/';

if (!preg_match($regNumber, $_POST['telefon'])) {
    header("Location: form.php?error=phone");
    die();
}



$imeiprezime = mysqli_real_escape_string($conn, $_POST['name']);
$imekompanija = mysqli_real_escape_string($conn, $_POST['namekompanija']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$telefon = mysqli_real_escape_string($conn, $_POST['telefon']);
$academy_id = mysqli_real_escape_string($conn, $_REQUEST['academy_id']);
$sql = "INSERT INTO informacii(imeiprezime, imekompanija, email, telefon, academy_id) 
        VALUES ('$imeiprezime', '$imekompanija', '$email', '$telefon', '$academy_id')";

if (mysqli_query($conn, $sql)) {
    $result = true;
}
header('Location:form.php?redirect=true');
die();
