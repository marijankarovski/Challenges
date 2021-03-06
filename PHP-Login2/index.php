<?php

include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                checkAndPrintSuccessMessage();
                checkAndPrintErrorMessage();
                ?>
            </div>
            <div class="col-md-6">
                <h1>Login</h1>
                <form method="POST" action="login.php">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" placeholder="Enter username" name="username" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" placeholder="Enter password" name="password" />
                    </div>

                    <button type="submit" class="btn btn-secondary">Login</button>
                </form>
                <div class="row">
                    <div class="col-6">
                        <a href="resetPassword.php">Forgot Password?</a>
                    </div>
                    <div class="col">
                        <a href="changePassword.php">Change your Password</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h1>Register</h1>
                <form method="POST" action="register.php">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" placeholder="Enter username" name="username" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" placeholder="Enter password" name="password" />
                    </div>
                    <div class="form-group">
                        <label for="password">Telephone:</label>
                        <input type="text" class="form-control" placeholder="Enter your phone number" name="phone" />
                    </div>
                    <button type="submit" class="btn btn-secondary">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>