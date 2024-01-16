<?php
include_once "../components/header.php";

if (!isset($_GET["id"])) {
    header("location: ./index.php");
}

include "../../controllers/ItemController.php";
// include "../../controllers/CategoryController.php";
$item = ItemController::find($_GET["id"]);
$categories = CategoryController::getAll();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/main.css">
    <title>Document</title>
</head>

<body>
    <div class="itemShowContainer">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="row">
                    <div class="col-4">
                        <img id="showItem" src="<?= $item->photo ?>" alt="">
                    </div>
                    <div class="col-8 itemShowRightSide">
                        <h2><?= $item->title ?></h2>
                        <h3><?= $item->price ?>€</h3>
                        <p><?= $item->description ?></p>
                        <a href="./index.php">Rodyti visas slides</a>
                        <br>
                        <a href="../categories/show.php?id=<?= $item->category_id ?>">Į slidžių kategorija</a>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>

</html>