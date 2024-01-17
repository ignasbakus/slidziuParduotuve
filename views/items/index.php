<?php
// include itemscontroller
include_once "../components/header.php";

// include "../../controllers/CategoryController.php";
include "../../controllers/ItemController.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    ItemController::destroy($_POST['id']);
    header("location: ./index.php");
}

$items = ItemController::getAll();
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
    <div class="container1">
        <div class="row">
            <div class="col coverPhoto">
                <img id="coverPhoto" src="../../images/maarten-duineveld-pmfJcN7RGiw-unsplash.jpg" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 heading">
                <h1 id="skiTypes">Visos slidės</h1>
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-5">
                <form class="buttonAboveMainBody" action="./create.php" method="get">
                    <button id="leftButtonAboveMainBody" class="btnAll btnUpper" type="submit">Sukurti naują prekę</button>
                </form>
            </div>
            <div class="col-5">
                <form class="buttonAboveMainBody" action="../categories/index.php" method="get">
                    <button id="rightButtonAboveMainBody" class="btnAll btnUpper" type="submit">Grįšti į kategorijas</button>
                </form>
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="row mainBodyRow">
                    <?php foreach ($items as $key => $item) { ?>
                        <div class="col-3 d-flex justify-content-center mt-3">
                            <div class="card border-info border-2" style="width: 26rem;">
                                <a id="itemLink" href="./show.php?id=<?= $item->id ?>">
                                    <img src="<?= $item->photo ?>" id="itemImages" class="card-img-top itemImages" alt="...">
                                    <div class="card-body cardBodyItem d-flex flex-column text-bg-light ">
                                        <h2 class="card-title itemCardTitle"><?= $item->title ?></h2>
                                        <h3 class="card-title"><?= $item->price ?>€</h3>
                                        <p class="card-text itemCardDescription"><?= $item->description ?></p>
                                        <div class="buttonsCol">
                                            <form action="./show.php?id=<?= $item->id ?>" method="post">
                                                <button class="btn1 btnAll" type="submit">Rodyti</button>
                                            </form>
                                            <form action="./edit.php" method="get">
                                                <input type="hidden" name="id" value="<?= $item->id ?>">
                                                <button class="btn2 btnAll" type="submit">Taisyti</button>
                                            </form>
                                            <form action="./index.php" method="post">
                                                <input type="hidden" name="id" value="<?= $item->id ?>">
                                                <button class="btn3 btnAll" type="submit">Ištrinti</button>
                                            </form>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
include_once "../components/footer.php";
?>

</html>