<?php

if (isset($_GET['error']) && $_GET['error'] == "user") {
    $user = "block";
} else {
    $user = "none";
}
if (isset($_GET['error']) && $_GET['error'] == "email") {
    $email = "block";
} else {
    $email = "none";
}
$value_email = "";
if (isset($_GET['email'])) {
    $value_email = $_GET['email'];
}
if (isset($_GET['pass'])) {
    $pass = $_GET['pass'];
} else {
    $pass = "";
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
    <style>
        body {
            background-image: url("https://img.rawpixel.com/s3fs-private/rawpixel_images/website_content/v462-n-130-textureidea_1.jpg?w=1300&dpr=1&fit=default&crop=default&q=80&vib=3&con=3&usm=15&bg=F4F4F3&ixlib=js-2.2.1&s=1ba69b5c4ae053e9c312677688c2c4a2");
            background-size: cover;
        }

        .space {
            height: 30vh;
        }

        .error {
            color: red;
            display: <?php echo $user ?>;
        }

        .errorEmail {
            color: yellow;
            display: <?php echo $email ?>;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row space">
            <div class="col-12 text-center text-white">
                <h1><a href="index.html" class="text-white">Part 2</a></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-white pb-5">SignUp Form</h1>
            </div>
            <div class="col-6 offset-3">
                <form action="signupfile.php" method="POST">
                    <div class="form-group">
                        <label for="email" class="text-white">Email: <span class="errorEmail">* You are already registered – your password is <?php echo $pass ?>.</span></label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email" value="<?php echo $value_email ?>">
                    </div>
                    <div class="form-group">
                        <label for="username" class="text-white">Username: <span class="error">* Username taken.</span></label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-white">Password:</label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="Enter Password">
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-light mt-5">Signup</button><a href="login.php" class="btn btn-light mt-5">Go to Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/280db70b77.js" crossorigin="anonymous"></script>
</body>

</html>