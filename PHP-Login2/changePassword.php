<?php

include "functions.php";
include "constants.php";

if (isset($_POST['changeUser']) && isset($_POST['changeOldPass']) && isset($_POST['changeNewPass'])) {
    $username = $_POST['changeUser'];
    $passwordOld = $_POST['changeOldPass'];
    $passwordNew = $_POST['changeNewPass'];
} else {
    $username = '';
    $passwordOld = '';
    $passwordNew = '';
}


// USER|PASS#NUMBER

$data = file_get_contents("users.txt");
$users = explode(PHP_EOL, trim($data));

//Tuka ja vadime USERNAME PASSWORD kombinacijata
foreach ($users as $user) {
    $temp = explode("#", $user);
    $user_pass[] = $temp[0];
}

//Tuka proveruvame dali vnesenite podatoci odgovaraat so nekoj USER
$correct = false;
foreach ($user_pass as $user) {
    if ($user == $username . "|" . md5($passwordOld)) {
        $correct = true;
        break;
    }
}

//Tuka go fakjame userot koj gi vnel podatocite vo variabla
$old = "#";
foreach ($users as $user) {
    $temp = explode("|", $user);
    if ($temp[0] == $username) {
        $old = $user;
    }
}
// Tuka go fakjame telefonskiot broj
$phoneNumber = explode("#", $old);
$phoneNumber = $phoneNumber[1];

//Dokolku userot e pronajden i noviot password e dobar, mu pravime replace na celiot USER vo fajlot. 
if ($correct && !checkPasswordStrength($passwordNew)) {
    $new = $username . "|" . md5($passwordNew) . "#" . $phoneNumber;
    replacePassword($new, $old);
    redirect(INDEX_PAGE, "success=passwordChange");
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-4">
                <h1>Change Password</h1>
            </div>
        </div>
        <div class="col-4">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" placeholder="Enter your username" name="changeUser" />
                </div>
                <div class="form-group">
                    <label for="oldPass">Old Password:</label>
                    <input type="text" class="form-control" placeholder="Old Password" name="changeOldPass" />
                </div>
                <div class="form-group">
                    <label for="phone">New Password:</label>
                    <input type="text" class="form-control" placeholder="New Password" name="changeNewPass" />
                </div>
                <button type="submit" class="btn btn-secondary">Submit</button>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/280db70b77.js" crossorigin="anonymous"></script>
</body>

</html>