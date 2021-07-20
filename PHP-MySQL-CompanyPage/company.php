<?php

require_once __DIR__ . "/Classes/Company.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}

$db = new Company;
$data = $db->getData($id);

//Proverka dali voopsto ima setirano ID.
if (!isset($_GET['id'])) {
    echo "Vnesi ID vo format - company.php?id=(id broj) -";
    die();
}

//Proverka dali ima zapisano podatoci so toa ID
if (!isset($data['id'])) {
    echo "Vnesi validen ID";
    die();
}

//nekakov feedback od kontakt formata
if (isset($_GET['contact'])) {
    echo '<script>';
    echo 'alert("Thank you for the contact")';
    echo '</script>';
} else {
    echo "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/styleCompany.css">
    <title>Challenge15</title>
    <style>
        .coverImage {
            background-image: url("<?= $data['coverImage'] ?>");
            background-size: cover;
            height: 60vh;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Marijan Karovski</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#about">About Us</a>
                </li>
                <li class="nav-item active">
                    <!-- (. "s") e dodadeno na mestata kade sto treba da bide mnozina -->
                    <a class="nav-link" href="#service"><?= $data['provider'] . "s" ?></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Back to index page</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col coverImage">
                <div class="row height align-items-center">
                    <div class="col">
                        <div class="text-center">
                            <h1 class="text-white text display-3"><?= $data['mainTitle'] ?></h1>
                        </div>
                    </div>
                </div>
                <div class="row height align-items-center">
                    <div class="col">
                        <div class="text-center">
                            <h3 class="text-white text display-4"><?= $data['subtitle'] ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-4 text-center" id="about">
                <h3 class="m-3">About Us</h3>
                <p><?= $data['about'] ?></p>
                <hr>
                <h6>Tel: <?= $data['telephone'] ?></h6>
                <h6>Location: <?= $data['location'] ?></h6>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col" id="service">
                <h3><?= $data['provider'] . "s" ?></h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card bg-dark">
                    <img class="card-img-top" src="<?= $data['imgUrl1'] ?>">
                    <div class="card-body">
                        <h4 class="card-text text-white"><?= $data['provider'] ?> One Description</h4>
                        <p class="card-text text-white"><?= $data['descUrl1'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-dark">
                    <img class="card-img-top" src="<?= $data['imgUrl2'] ?>">
                    <div class="card-body">
                        <h4 class="card-text text-white"><?= $data['provider'] ?> Two Description</h4>
                        <p class="card-text text-white"><?= $data['descUrl2'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-dark">
                    <img class="card-img-top" src="<?= $data['imgUrl3'] ?>">
                    <div class="card-body">
                        <h4 class="card-text text-white"><?= $data['provider'] ?> Three Description</h4>
                        <p class="card-text text-white"><?= $data['descUrl3'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6" id="contact">
                <div>
                    <h3>Contact</h3>
                </div>
                <div>
                    <p>
                        <?= $data['description'] ?>
                    </p>
                </div>
            </div>
            <div class="col-6">
                <form action="storeContact.php" method="POST">
                    <div class="form-group">
                        <input type="text" hidden name="company_id" value="<?= $id ?>">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Your Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter Your Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" placeholder="Your Message" class="form-control"></textarea>
                    </div>
                    <div>
                        <button class="btn btn-dark text-center my-3">Send</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row bg-dark">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <div class="text-white my-3">Copyright By Marijan Karovski &commat; Brainster</div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-center mb-3">
                    <a href="<?= $data['facebook'] ?>" target="_blank" class="text-white"><i class="fab fa-facebook fa-2x m-3"></i></a>
                    <a href="<?= $data['LinkedIn'] ?>" target="_blank" class="text-white"><i class=" fab fa-linkedin fa-2x m-3"></i></a>
                    <a href="<?= $data['twitter'] ?>" target="_blank" class="text-white"><i class=" fab fa-twitter fa-2x m-3"></i></a>
                    <a href="<?= $data['google'] ?>" target="_blank" class="text-white"><i class=" fab fa-google-plus fa-2x m-3"></i></a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/280db70b77.js" crossorigin="anonymous"></script>
</body>

</html>