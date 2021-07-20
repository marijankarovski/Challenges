<?php

$user = $_GET['user'];

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
            height: 20vh;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row space"></div>
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-success pb-5">Welcome, <?= $user ?></h1>
            </div>
            <div class="col-12 text-white">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus recusandae illum quo illo, perspiciatis aspernatur quis nesciunt consequatur nam harum modi iure nemo nostrum deleniti enim quidem provident possimus itaque! Totam ex amet reiciendis quos, porro exercitationem veritatis! Non porro, velit consequatur praesentium eaque assumenda asperiores dolorem omnis voluptas veritatis quis ad similique nemo. Quasi ab dolor animi laudantium! Rem praesentium reprehenderit pariatur asperiores? Repellendus, rem veniam laboriosam ullam commodi hic dolor nobis maxime numquam voluptas, aliquid ipsa iure voluptatibus vitae velit. Deleniti accusamus quasi delectus sit voluptate deserunt quam ratione et, laudantium ullam fugit doloribus, quos veniam est quae, voluptatibus odio officiis harum. Doloremque ullam suscipit, qui ea, debitis tempore esse asperiores aut omnis sed excepturi quod non a adipisci autem repellendus quis similique ducimus explicabo est? Cum, perspiciatis sunt dolores pariatur ipsa tempore earum dolore rem ullam dignissimos eius quo officiis molestiae non beatae natus adipisci perferendis magni!</div>
        </div>
        <div class="col-12 text-center pt-5">
            <a href="index.html" class="btn btn-light">Logout</a>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/280db70b77.js" crossorigin="anonymous"></script>
</body>

</html>