<?php

include "../../controllers/CategoryController.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    CategoryController::store();
    header("location: ./index.php");
}

$categories = CategoryController::getAll();

include_once "../components/header.php";

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
    <div class="categoryCreateContainer">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 backgroundCreateAndEdit">
                <form action="./create.php" method="post">
                    <h2 class="headingCreateAndEdit" >Sukurti naują kategoriją</h2>
                    <div class="createInputs">
                        <label class="labelCreateAndEdit" for="name">Kategorijos pavadinimas: </label><br>
                        <input type="text" class="createCategoryInputs" name="name" placeholder="Įveskite kategorijos pavadinimą">
                    </div>
                    <div class="createInputs">
                        <label class="labelCreateAndEdit" for="description">Kategorijos aprašymas: </label><br>
                        <input type="text" class="createCategoryInputs" name="description" placeholder="Įveskite kategorijos aprašymą">
                    </div>
                    <div class="createInputs">
                        <label class="labelCreateAndEdit" for="photo">Nuotraukos URL: </label><br>
                        <input type="text" class="createCategoryInputs" name="photo" placeholder="Įveskite nuotraukos URL">
                    </div>
                    <button class="createAndEditSubmitButton" type="submit" name="">Pateikti</button>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</body>

</html>