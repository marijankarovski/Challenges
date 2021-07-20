<?php
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("Location: login.html");
    die();
}
$users = explode(PHP_EOL, trim(file_get_contents("users.txt")));
$user = $_POST['user'];
$pass = $_POST['pass'];
$userFound = false;

for ($i = 0; $i < count($users); $i++) {
    $temp[] = explode(",", $users[$i]);
    $user_email[] = $temp[$i][0];
    $user_pass[] = $temp[$i][1];
}
foreach ($user_pass as $person) {
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
