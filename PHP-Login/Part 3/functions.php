<?php
function checkIfEmpty()
{
    if ($_POST['email'] == "" || $_POST['username'] == "" || $_POST['password'] == "") {
        return true;
    }
    return false;
}

function usernameEmptySpace()
{

    if (count(explode(" ", $_POST['username'])) > 1) {
        return true;
    }
    return false;
}

function emailLength()
{
    $lenght = explode("@", $_POST['email']);
    if (count($lenght) == 1) { //proverka dali emailot ima @ 
        return true;
    } elseif (strlen($lenght[0]) <= 5) {
        return true;
    }
    return false;
}

function passwordValidation()
{
    if (preg_match("#.*^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $_POST['password'])) {
        return false;
    }
    return true;
}
