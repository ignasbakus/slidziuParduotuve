<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo 'atejom su postu';
    print_r($_POST);die;
    // header("location: ./edit.php");
}

if (!isset($_GET["id"])) {
    header("location: ./index.php");
}

include "../../controllers/CategoryController.php";
$category = CategoryController::find($_GET["id"]);
// print_r($category);die;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/main.css">
    <title>Document</title>
</head>
<body>
    <form action="./edit.php" method="post">
        <div class="container">
            <div class="createInputs">
                <label for="name">Name:</label>
                <input type="text" class="createCategoryInputs" name="name" placeholder="Enter category's name" value="<?= $category->name ?>">
            </div>
            <div class="createInputs">
                <label for="description">Description:</label>
                <input type="text" class="createCategoryInputs" name="description" placeholder="Enter category's description" value="<?= $category->description ?>">
            </div>
            <div class="createInputs">
                <label for="photo">Photo:</label>
                <input type="text" class="createCategoryInputs" name="photo" placeholder="Enter photo url" value="<?= $category->photo ?>">
            </div>
            <input type="hidden" name="id" value="<?= $category->id ?>">
            <button type="submit" class="btnAll">Submit</button>
        </div>
    </form>
</body>

</html>