<?php

function validateString($data)
{
    $reg = '/^[a-zA-Z ]*$/';
    if (preg_match($reg, $data)) {
        return false;
    }
    return true;
}

function validateMail($mail)
{
    $user = explode("@", $mail);
    $dot = explode(".", $user[1]);
    if (strlen($user[0]) < 4) {
        return false;
    }
    if (!isset($user[1])) {
        return false;
    }
    if (!isset($dot[1])) {
        return false;
    }
    return true;
}
