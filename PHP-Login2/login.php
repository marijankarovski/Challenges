<?php
include 'constants.php';
include 'functions.php';

checkRequest();

$username = $_POST['username'];
$password = $_POST['password'];

checkUsernameMinLength($username);
checkPasswordMinLength($password);
checkPasswordStrength($password);

$data = file_get_contents("users.txt");
$users = explode(PHP_EOL, trim($data));
//['john|123456', 'jane|jane123#35468435']

foreach ($users as $user) {
    $temp = explode("#", $user);
    $user_pass[] = $temp[0];
}


$password = md5($password);

foreach ($user_pass as $user) {
    if ($user == "$username|$password") {
        redirect(INDEX_PAGE, "success=login");
    }
}

redirect(INDEX_PAGE, "error=notfound");
