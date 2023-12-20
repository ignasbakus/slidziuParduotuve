<?php

include "../../controllers/CategoryController.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    CategoryController::store();
    header("location: ./index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="./create.php" method="post">
                <div class="createInputs">
                    <label for="name">Kategorijos pavadinimas: </label>
                    <input type="text" class="createCategoryInputs" name="name" placeholder="Įveskite kategorijos pavadinimą">
                </div>
                <div class="createInputs">
                    <label for="description">Kategorijos aprašymas: </label>
                    <input type="text" class="createCategoryInputs" name="description" placeholder="Įveskite kategorijos aprašymą">
                </div>
                <div class="createInputs">
                    <label for="photo">Nuotraukos URL: </label>
                    <input type="text" class="createCategoryInputs" name="photo" placeholder="Įveskite nuotraukos URL">
                </div>
                <button type="submit" name="">Pateikti</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>






</body>

</html>