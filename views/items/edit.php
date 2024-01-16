<?php
include_once "../components/header.php";

include "../../controllers/ItemController.php";
// include "../../controllers/CategoryController.php";

$categories = CategoryController::getAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    ItemController::update($_POST['id']);
    header("location: ./index.php");
}

if (!isset($_GET["id"])) {
    header("location: ./index.php");
}

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
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="./edit.php" method="post">
                <div class="createInputs">
                    <label for="title">Daikto pavadinimas: </label>
                    <input type="text" class="createCategoryInputs" name="title" placeholder="Įveskite daikto pavadinimą" value="<?= $item->title ?>">
                </div>
                <div class="createInputs">
                    <label for="price">Kaina: </label>
                    <input type="text" class="createCategoryInputs" name="price" placeholder="Įveskite daikto kainą €" value="<?= $item->price ?>">
                </div>
                <div class="createInputs">
                    <label for="description">Kategorijos aprašymas: </label>
                    <input type="text" class="createCategoryInputs" name="description" placeholder="Įveskite kategorijos aprašymą" value="<?= $item->description ?>">
                </div>
                <div class="createInputs">
                    <label for="photo">Nuotraukos URL: </label>
                    <input type="text" class="createCategoryInputs" name="photo" placeholder="Įveskite nuotraukos URL" value="<?= $item->photo ?>">
                </div>
                <div class="createInputs">
                    <label for="category_id">Pasirinkite kategoriją: </label>
                    <select name="category_id" id="categories">
                        <?php
                        foreach ($categories as $category) { ?>
                            <option <?= ($item->category_id == $category->id) ? "selected" : "" ?> value='<?= $category->id ?>'><?= $category->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="createInputs">
                    <p>Jei norite, <a href="../categories/create.php">čia</a> galite susikurti naują kategoriją</p>
                </div>
                <div class="createInputs">
                    <input type="hidden" name="id" value="<?= $item->id ?>">
                    <button type="submit" name="">Pateikti</button>
                </div>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</body>

</html>