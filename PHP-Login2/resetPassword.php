<?php

include 'constants.php';
include 'functions.php';

if (isset($_POST['userReset']) && isset($_POST['phoneReset'])) {
    $username = $_POST['userReset'];
    $phone = $_POST['phoneReset'];
} else {
    $username = '';
    $phone = '';
}

$data = file_get_contents("users.txt");
$users = explode(PHP_EOL, trim($data));

//Tuka go fakjame userot koj gi vnel podatocite vo variabla
foreach ($users as $user) {
    $temp = explode("|", $user);
    $userReset[] = $temp[0];
    if ($temp[0] == $username) {
        $old = $user;
    }
}


//Tuka gi vadime telefonskite broevi od site users
foreach ($users as $user) {
    $temp = explode("#", $user);
    $numberReset[] = $temp[1];
}

//Tuka gi stavam vo nizi USERNAME i PHONE NUMBER
for ($i = 0; $i < count($users); $i++) {
    $nizaUser[] = $userReset[$i];
    $nizaNumb[] = $numberReset[$i];
}


//Tuka proveruvame dali vnesenite podatoci odgovaraat so nekoj USER
$correct = false;
for ($i = 0; $i < count($users); $i++) {
    if ($nizaUser[$i] == $username && $nizaNumb[$i] == $phone) {
        $correct = true;
        break;
    }
}

//Dokolku USERot e pronajden, generirame random string, go kreirame USERot so noviot password i mu pravime replace vo fajlot.
if ($correct) {
    $newPass = randomStrGenerator();
    $new = $username . "|" . md5($newPass) . "#" . $phone;
    replacePassword($new, $old);
    redirect(INDEX_PAGE, "success=passChange&pass=$newPass");
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
                <h1>Reset Password</h1>
            </div>
        </div>
        <div class="col-4">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" placeholder="Enter username" name="userReset" />
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="text" class="form-control" placeholder="Enter phone number" name="phoneReset" />
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