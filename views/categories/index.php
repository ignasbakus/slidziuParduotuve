<?php
// include categoriescontroller
include "../../controllers/CategoryController.php";
$categories = CategoryController::getAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                <form class="buttons" action="./create.php" method="post">
                    <button class="buttonCreate btnAll" type="submit">Create</button>
                </form>
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <?php foreach ($categories as $key => $category) { ?>
                    <div class="row mainBodyRow">
                        <div class="col-6 nameAndDescription">
                            <h3 class='skiTypeName'><?= $category->name ?></h3>
                            <p class='skiTypeDescription'><?= $category->description ?></p>
                        </div>
                        <div class="col-4 ">
                            <img class="skiImages" src="<?= $category->photo ?>" alt="">
                        </div>
                        <div class="col-2 buttons borderButtonsCol">
                            <form action="" method="post">
                                <button class="btn1 btnAll" type="submit">Show</button>
                            </form>
                            <form action="" method="post">
                                <button class="btn2 btnAll" type="submit">Edit</button>
                            </form>
                            <form action="" method="post">
                                <button class="btn3 btnAll" type="submit">Delete</button>
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