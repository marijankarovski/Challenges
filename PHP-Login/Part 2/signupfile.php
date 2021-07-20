<?php
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("Location: signup.php");
    die();
} else {
    $email = $_POST['email'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $users = explode(PHP_EOL, trim(file_get_contents("users.txt")));
    for ($i = 0; $i < count($users); $i++) {
        $temp[] = explode(",", $users[$i]);
        $user_pass[] = $temp[$i][1];
    }
    foreach ($users as $userEmail) {
        if (strpos($userEmail, $email . ",") === 0) {
            $password = end(explode("=", $userEmail));
            header("Location: signup.php?error=email&pass=$password");
            die();
        }
    }
    foreach ($user_pass as $userPass) {
        if (strpos($userPass, $user . "=") === 0) {
            header("Location: signup.php?error=user&email=$email");
            die();
        }
    }
    if ($_POST['email'] == "" || $_POST['username'] == "" || $_POST['password'] == "") {
        header("Location: signup.php");
    } else {
        file_put_contents("users.txt", $email . "," . $user . "=" . $pass . PHP_EOL, FILE_APPEND);
        header("Location: welcome.php?user=$user");
    }
}
