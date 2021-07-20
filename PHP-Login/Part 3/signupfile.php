<?php

include_once("functions.php");
//Varijablive se gore za errorot vo passwordValidation
$email = $_POST['email'];
$user = $_POST['username'];
$pass = $_POST['password'];

//Proverki pred da se izvrsi kodot. 
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("Location: signup.php");
    die();
} elseif (checkIfEmpty()) {
    header("Location: signup.php?error=empty");
    die();
} elseif (emailLength()) {
    header("Location: signup.php?error=emailLenght");
    die();
} elseif (usernameEmptySpace()) {
    header("Location: signup.php?error=username&email=$email");
    die();
} elseif (passwordValidation()) {
    header("Location: signup.php?error=password&email=$email&user=$user"); //Dokolku pominat prethodnite proverki a ovaa ne, vo poleto Email i Username ostanuvaat vnesenite podatoci.
    die();
}

$users = explode(PHP_EOL, trim(file_get_contents("users.txt")));

foreach ($users as $userEmail) {
    if (strpos($userEmail, $email . ",") === 0) {
        $password = end(explode("=", $userEmail));
        header("Location: signup.php?error=email&pass=$password");
        die();
    }
}
foreach ($users as $people) {
    $temp = explode(",", $people);
    if (strpos($temp[1], $user . "=") === 0) {
        header("Location: signup.php?error=user&email=$email");
        die();
    }
}

file_put_contents("users.txt", $email . "," . $user . "=" . $pass . PHP_EOL, FILE_APPEND);
header("Location: welcome.php?user=$user");
die();
