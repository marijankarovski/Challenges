<?php
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("Location: index.html");
    die();
}
$users = explode(PHP_EOL, trim(file_get_contents("users.txt")));
$user = $_POST['user'];
$pass = $_POST['pass'];
$userFound = false;
foreach ($users as $person) {
    if ($person == $user . "=" . $pass) {
        $userFound = true;
        break;
    }
}
if ($userFound === true) {
    header("Location: welcome.php?user=$user");
    die();
} else {
    header("Location: login.php?error=true");
    die();
}
