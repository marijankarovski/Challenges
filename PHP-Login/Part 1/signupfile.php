<?php
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("Location: index.html");
    die();
}

$user = $_POST['username'];
$pass = $_POST['password'];



if ($_POST['username'] == "" || $_POST['password'] == "") {
    header("Location: signup.php");
} else {
    file_put_contents("users.txt", $user . "=" . $pass . PHP_EOL, FILE_APPEND);
    header("Location: welcome.php?user=$user");
}
