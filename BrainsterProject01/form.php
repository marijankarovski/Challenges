<?php

$conn = new mysqli('127.0.0.1', 'root', '', 'brainster_project01');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['error']) && $_GET['error'] == 'name') {
    $errorName = "style='outline: 2px solid red'";
    $nameFix = 'Името и презимето не можат да содржат бројки и знаци';
} else {
    $errorName = '';
    $nameFix = '';
}
if (isset($_GET['error']) && $_GET['error'] == 'phone') {
    $phoneFix = "Внеси валиден телефонски број";
    $errorPhone = "style='outline: 2px solid red'";
} else {
    $phoneFix = "";
    $errorPhone = "";
}
if (isset($_GET['error']) && $_GET['error'] == 'mail') {
    $mailFix = "Внеси валидна емаил адреса";
    $errorMail = "style='outline: 2px solid red'";
} else {
    $mailFix = "";
    $errorMail = "";
}
if (isset($_GET['error']) && $_GET['error'] == 'fields') {
    $errorFields = "Сите полиња се задолжителни";
    $fields = "style='outline: 2px solid red'";
} else {
    $errorFields = "";
    $fields = "";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Form</title>

</head>

<body>
    <div class="nav-bar">
        <div class="begin-logo row" id="logo">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <a href="index.html"><img src="Images/Logo.svg" alt="Brainster Logo"></a>
            </div>
        </div>
        <div id="lizgacDIV" class="begin">
            <a href="#" id="click">
                <i id="testhamb" class="fas fa-times fa-2x"></i>
            </a>
            <a class="nav-link" href="https://marketpreneurs.brainster.co/" target="_blank">
                <h6 class="font-weight-bold">Академија за маркетинг</h6>
            </a>
            <a class="nav-link" href="https://codepreneurs.brainster.co/" target="_blank">
                <h6 class="font-weight-bold">Академија за програмирање</h6>
            </a>
            <a class="nav-link" href="https://datascience.brainster.co/" target="_blank">
                <h6 class="font-weight-bold">Академија за data science</h6>
            </a>
            <a class="nav-link" href="https://design.brainster.co/" target="_blank">
                <h6 class="font-weight-bold">Академија за дизајн</h6>
            </a>
            <a href="form.php"><button class="btn btn-color-red navbtn font-weight-bold my-3">Вработи наш
                    студент</button></a>
        </div>

        <a href="#" id="click2">
            <i id="testhamb" class="fas fa-bars fa-2x"></i>
        </a>
    </div>
    <div class="container-fluid">
        <div class="jumbotron jumbotronform">
            <h1 class="display-4 display-md-3 font-weight-bold text-center mb-5">Вработи студенти</h1>
        </div>
    </div>
    <div class="container">
        <form action="submit.php" method="POST" id="form" autocomplete="off">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="imeiprezime" class="font-weight-bold">Име и презиме</label>
                        <input type="text" name="name" class="form-control p-4" id="imeiprezime" placeholder="Вашето име и презиме" <?= $errorName ?> <?= $fields ?>>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="kompanija" class="font-weight-bold">Име на компанија</label>
                        <input type="text" name="namekompanija" class="form-control p-4" id="kompanija" placeholder="Име на Вашата компанија" <?= $fields ?>>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="email" class="font-weight-bold">Контакт имејл</label>
                        <input type="text" name="email" class="form-control p-4" id="email" placeholder="Контакт емајл на Вашата компанија" <?= $errorMail ?> <?= $fields ?>>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="tel" class="font-weight-bold">Контакт телефон</label>
                        <input type="tel" name="telefon" class="form-control p-4" id="tel" placeholder="Контакт телефон на Вашата компанија" <?= $errorPhone ?> <?= $fields ?>>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="tip" class="font-weight-bold">Тип на студенти</label>
                        <select class="form-control" id="tip" name="academy_id" <?= $fields ?>>
                            <option disabled selected hidden value="">Изберете тип на студент</option>
                            <?php
                            $sql = mysqli_query($conn, "SELECT * FROM academy");
                            while ($row = $sql->fetch_assoc()) {
                            ?>
                                <option class="mt-3" value="<?php echo $row['id']; ?>" class="py-3" name="academy_id">
                                    <?php echo "Студенти од " . $row['name'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <label for="btn" class="invisible">.</label>
                    <button type="submit" class="btn btn-block btn-danger" id="btn">ИСПРАТИ</button>
                </div>
            </div>

        </form>
        <?php
        if (isset($_GET['redirect'])) {
            echo "<div>Ви благодариме.</div>";
        }
        if (isset($_GET['error']) && $_GET['error'] == 'fields') {
            echo "<div style='color: red'>{$errorFields}</div>";
        } elseif (isset($_GET['error']) && $_GET['error'] == 'name') {
            echo "<div style='color: red'>{$nameFix}</div>";
        } elseif (isset($_GET['error']) && $_GET['error'] == 'phone') {
            echo "<div style='color: red'>{$phoneFix}</div>";
        } elseif (isset($_GET['error']) && $_GET['error'] == 'mail') {
            echo "<div style='color: red'>{$mailFix}</div>";
        }
        ?>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div id="footer" class="col-12 py-3 bg-dark text-white d-flex justify-content-center">Изработено со ❤️ од
                студент
                на
                Brainster</divs>
            </div>
        </div>
        <script>
            $("#form")[0].reset();
        </script>
        <script>
            document.querySelector("#click2").addEventListener("click", testtoggle);
            document.querySelector("#click").addEventListener("click", testtoggle);


            function testtoggle() {
                if (document.querySelector("#lizgacDIV").classList.contains("begin")) {
                    document.querySelector("#lizgacDIV").classList.replace("begin", "show");

                } else if (document.querySelector("#lizgacDIV").classList.contains("show")) {
                    document.querySelector("#lizgacDIV").classList.replace("show", "hide");
                } else if (document.querySelector("#lizgacDIV").classList.contains("hide")) {
                    document.querySelector("#lizgacDIV").classList.replace("hide", "show");
                }

            }
        </script>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/280db70b77.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</body>

</html>