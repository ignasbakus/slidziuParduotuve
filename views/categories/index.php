<?php
// include categoriescontroller
include "../../controllers/CategoryController.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    CategoryController::destroy($_POST['id']);
    header("location: ./index.php");
}

$categories = CategoryController::getAll();

include_once "../components/header.php"

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

<body class="mainBody">
    <div class="container1">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 heading">
                <h1 id="skiTypes">Slidžių tipai</h1>
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <form class="buttons" action="./create.php" method="get">
                    <button class="buttonCreate btnAll" type="submit">Sukurti</button>
                </form>
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <?php foreach ($categories as $key => $category) { ?>
                    <div class="row mainBodyRow">
                        <div class="col-5 nameAndDescription">
                            <h2 class='skiTypeName'><?= $category->name ?></h2>
                            <!-- <p class='skiTypeDescription'><?= $category->description ?></p> -->
                        </div>
                        <div class="col-5 ">
                            <img class="skiImages" src="<?= $category->photo ?>" alt="">
                        </div>
                        <div class="col-2 buttons borderButtonsCol">
                            <form action="./show.php?id=<?= $category->id ?>" method="post">
                                <button class="btn1 btnAll" type="submit">Rodyti</button>
                            </form>
                            <form action="./edit.php" method="get">
                                <input type="hidden" name="id" value="<?= $category->id ?>">
                                <button class="btn2 btnAll" type="submit">Taisyti</button>
                            </form>
                            <form action="./index.php" method="post">
                                <input type="hidden" name="id" value="<?= $category->id ?>">
                                <button class="btn3 btnAll" type="submit">Ištrinti</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</body>


</html>