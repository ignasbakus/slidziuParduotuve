<?php
if (!isset($_GET["id"])) {
    header("location: ./index.php");
}

include "../../controllers/CategoryController.php";
$category = CategoryController::find($_GET["id"]);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Kategorija</h1>
    <h2>Kategorijos id yra <?= $_GET['id'] ?></h2>
    <div class="categoryCard">
        <img src="../../images/photo-1551524559-8af4e6624178.avif" class="categoryCardImage" alt="">
        <div class="categoryCardBody">
            <h3 class="categoryCardTitle"><?= $category->name ?></h3>
            <p class="categoryCardDescription"><?= $category->description ?></p>
        </div>
        <div class="CategoryItems">
            <a class="CategoryItem" href="">Slides pirmos</a>
            <a class="CategoryItem" href="">Slides antros</a>
            <a class="CategoryItem" href="">Slides trecios</a>
        </div>
        <div>
            <a href="./index.php">Rodyti visas slidžių kategorijas</a>
        </div>
    </div>
</body>

</html>