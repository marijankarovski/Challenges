<?php
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("Location: login.html");
    die();
}
$users = explode(PHP_EOL, trim(file_get_contents("users.txt")));
$user = $_POST['user'];
$pass = $_POST['pass'];

for ($i = 0; $i < count($users); $i++) {
    $temp = explode(",", $users[$i]);
    if ($temp[1] == $user . "=" . $pass) {
        header("Location: welcome.php?user=$user");
        die();
    }
}
header("Location: login.php?error=true");
die();
