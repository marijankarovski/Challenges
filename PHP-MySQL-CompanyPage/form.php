<?php

require_once __DIR__ . "/Classes/Connect.php";

$db = new Connect;
$sql = "SELECT * FROM provide";
$stmt = $db->pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$error = "";
if (isset($_GET['error']) && $_GET['error'] == 'fields') {
    $error = "* All Fields are required.";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/style.css">
    <title>Challenge15</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col text-center text-white py-3">
                <h2 class="text">You are one step away from your webpage</h2>

            </div>
        </div>
        <form action="store.php" method="POST">
            <div class="row">
                <div class="col-4">
                    <div class="formInner p-3">
                        <div class="form-group">
                            <label for="coverImage">Cover Image URL</label>
                            <input type="text" class="form-control" id="coverImage" name="coverImage">
                        </div>
                        <div class="form-group">
                            <label for="mainTitle">Main Title of Page</label>
                            <input type="text" class="form-control" id="mainTitle" name="mainTitle">
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Subtitle of Page</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle">
                        </div>
                        <div class="form-group">
                            <label for="about">Something about you</label>
                            <textarea name="about" class="form-control" id="about" cols="30" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="telephone">Your telephone number</label>
                            <input type="text" class="form-control" id="telephone" name="telephone">
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location">
                        </div>
                    </div>
                    <div class="formInner mt-5 p-3 ">
                        <label for="service">Do you provide services or products?</label>
                        <select class="form-control" name="service_id" id="service">
                            <?php

                            foreach ($data as $service) {
                                echo "<option value='{$service['id']}'>{$service['provider']}</option>";
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="formInner p-3">
                        <div>
                            <h5>Provide url for an image and description of your service/product</h5>
                        </div>
                        <div class="form-group">
                            <label for="imgUrl1">Image URL</label>
                            <input type="text" class="form-control" id="imgUrl1" name="imgUrl1">
                        </div>
                        <div class="form-group">
                            <label for="descUrl1">Description of service/product</label>
                            <textarea name="descUrl1" id="descUrl1" class="form-control" cols="30" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="imgUrl2">Image URL</label>
                            <input type="text" class="form-control" id="imgUrl2" name="imgUrl2">
                        </div>
                        <div class="form-group">
                            <label for="descUrl2">Description of service/product</label>
                            <textarea name="descUrl2" id="descUrl2" class="form-control" cols="30" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="imgUrl3">Image URL</label>
                            <input type="text" class="form-control" id="imgUrl3" name="imgUrl3">
                        </div>
                        <div class="form-group">
                            <label for="descUrl3">Description of service/product</label>
                            <textarea name="descUrl3" id="descUrl3" class="form-control" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="formInner p-3">
                        <div class="form-group">
                            <label for="description">Provide a description of your company, something people should be
                                aware
                                of
                                before they contact you:</label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="2"></textarea>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="linkedIn">LinkedIn</label>
                            <input type="text" class="form-control" id="LinkedIn" name="LinkedIn">
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" class="form-control" id="facebook" name="facebook">
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" class="form-control" id="twitter" name="twitter">
                        </div>
                        <div class="form-group">
                            <label for="google">Google +</label>
                            <input type="text" class="form-control" id="google" name="google">
                        </div>
                    </div>
                    <div class="error">
                        <h3 class="pt-5"><?php echo $error ?></h3>
                    </div>
                </div>
                <div class="col-6 offset-3">
                    <button class="btn btn-light btn-lg btn-block mt-5">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/280db70b77.js" crossorigin="anonymous"></script>
</body>

</html>