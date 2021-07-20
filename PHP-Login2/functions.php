<?php

function checkRequest()
{
    if ($_SERVER['REQUEST_METHOD'] != "POST") {
        redirect(INDEX_PAGE);
    }
}

function checkUsernameMinLength($username, $minLenght = 4)
{
    if (strlen($username) < $minLenght) {
        redirect(INDEX_PAGE, 'error=usernametooshort');
    }
}

function checkPasswordMinLength($password, $minLenght = 6)
{
    if (strlen($password) < $minLenght) {
        redirect(INDEX_PAGE, "error=passwordtooshort");
    }
}

function checkPasswordStrength($password)
{
    if (
        !preg_match('/[a-z]+/', $password)
        || !preg_match('/[A-Z]+/', $password)
        || !preg_match('/[0-9]+/', $password)
        || !preg_match('/[!@#\$%\^&\*]+/', $password)
    ) {
        redirect(INDEX_PAGE, "error=passwordnotvalid");
    }
}

function checkUsernameUnique($username)
{
    $data = file_get_contents('users.txt');
    $users = explode(PHP_EOL, $data);
    //['john|john123', 'jane|jane123']
    foreach ($users as $user) {
        $userData = explode("|", $user);
        //['john', 'john123']
        //['jane', 'jane123']
        if (strtolower($userData[0]) == strtolower($username)) {
            redirect(INDEX_PAGE, "error=usernametaken");
        }
    }
}

function checkAndPrintErrorMessage()
{
    $errorMsg = [
        'usernametooshort' => 'Username must be at least 4 characters.',
        'passwordtooshort' => 'Password must be at least 6 characters.',
        'notfound' => 'User not found.',
        'passwordnotvalid' => 'Password must contain at least 1 lowercase, uppercase, number and special character.',
        'general' => 'An error occured. Please try again later.',
        'usernametaken' => 'Username taken, choose another one.'
    ];

    if (isset($_GET['error'])) {
        echo '<p class="alert alert-danger">' . $errorMsg[$_GET['error']]  . '</p>';
    }
}

function checkAndPrintSuccessMessage()
{
    if (isset($_GET['pass'])) {
        $newPass = $_GET['pass'];
    } else {
        $newPass = '';
    }
    $successMsg = [
        'login' => 'Successful login.',
        'register' => 'Successful registration. You can login now.',
        'passChange' => "You succesfully changed your password. Your new password is {$newPass}",
        'passwordChange' => "You changed yor password. You can login now."


    ];
    if (isset($_GET['success'])) {
        echo '<p class="alert alert-success">' . $successMsg[$_GET['success']] . '</p>';
    }
}

function redirect($url, $queryString = '')
{
    if ($queryString != '') {
        $url .= "?$queryString";
    }

    header("Location:" . $url);
    die();
}

function randomStrGenerator($length = 8)
{
    $numbers = '0123456789';
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $signs = '!@\$%\^\*+';
    $charactersLength = strlen($characters);
    $numbersLength = strlen($numbers);
    $signsLength = strlen($signs);
    $randomString = '';
    $randomChar = '';
    $randomNumb = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength)];
    }
    for ($i = 0; $i < 2; $i++) {
        $randomChar .= $signs[rand(0, $signsLength)];
        $randomNumb .= $numbers[rand(0, $numbersLength)];
    }
    return $randomString . $randomChar . $randomNumb;
}

function replacePassword($new, $old)
{
    $data = file_get_contents("users.txt");
    file_put_contents("users.txt", str_replace($old, $new, $data));
}
