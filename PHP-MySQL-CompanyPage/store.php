<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: form.php");
    die();
}

require_once __DIR__ . "/Classes/Company.php";

//Osnovna validacija za formata
$required = [
    'coverImage', 'mainTitle', 'subtitle', 'about', 'telephone', 'location', 'service_id', 'imgUrl1',
    'descUrl1', 'imgUrl2', 'descUrl2', 'imgUrl3', 'descUrl3', 'description', 'LinkedIn', 'facebook', 'twitter', 'google'
];
$found = false;
foreach ($required as $value) {
    if ($_POST[$value] == '') {
        $found = true;
        break;
    }
}
if ($found) {
    header("Location: form.php?error=fields");
    die();
}


$data = new Company;
$id = $data->addToDB($_POST); //ovde se izvrsuva metodot za zapisuvanje vo baza i vo $id se zapisuva return vrednosta na ovoj metod. Vo slucajov vrakja ID.
if ($id) {
    header("Location: company.php?id={$id}");
    die();
} else {
    header("Location: form.php");
}
