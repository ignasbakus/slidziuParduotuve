<?php
session_start();

include "../../controllers/CategoryController.php";

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
    <div class="headerMain">
        <div class="headerMenuLeft">
            <div class="logoAndImage">
                <a id="shopName" href="../categories/index.php">
                    Ski Shop
                    <img id="logoImage" src="../../images/b9a9bce831a3d22332cd90232f73af0c.jpg" alt="">
                </a>
            </div>
            <form action="../categories/index.php" class="dropdown headerMenuLeftButtons">
                <button type="submit" class="btnHeaderLeft">Kategorijos</button>
                <div class="dropdown-content">
                    <?php foreach ($categories as $key => $category) { ?>
                        <a href="../categories/show.php?id=<?= $category->id ?>"><?= $category->name ?></a>
                    <?php } ?>
                </div>
            </form>
            <div class="headerMenuLeftButtons">
                <button class="btnHeaderLeft">Apie mus</button>
            </div>
            <div class="headerMenuLeftButtons">
                <button class="btnHeaderLeft">Aksesuarai</button>
            </div>
        </div>
        <div class="headerMenuRight">
            <div class="headerMenuRightButtons">
                <button class="btnHeaderRight">Krepšelis</button>
            </div>
            <div class="headerMenuRightButtons">
                <button class="btnHeaderRight">Prisijungti</button>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success text-center" role="alert">
            <?= $_SESSION["success"] ?>
        </div>
    <?php }
    unset($_SESSION['success']);
    ?>
    <?php if (isset($_SESSION['alert'])) {
        foreach ($_SESSION['alert'] as $alert) { ?>
            <div class="alert alert-danger text-center" role="alert">
                <?= $alert ?>
            </div>
    <?php }
    }
    unset($_SESSION['alert']);
    ?>
</body>

</html>