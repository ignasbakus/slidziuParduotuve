<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
if (!isset($_GET["id"])) {
    header("location: ./index.php");
}

include "../../controllers/CategoryController.php";
$category = CategoryController::find($_GET["id"]);
?>



<body>
    <div class="container">
        <div class="createInputs">
            <label for="name">Name:</label>
            <input type="text" class="createCategoryInputs" id="name" placeholder="Enter category's name" value="<?= $category-> name ?>">
        </div>
        <div class="createInputs">
            <label for="description">Description:</label>
            <input type="text" class="createCategoryInputs" id="description" placeholder="Enter category's description">
        </div>
        <div class="createInputs">
            <label for="photo">Photo:</label>
            <input type="text" class="createCategoryInputs" id="photo" placeholder="Enter photo url">
        </div>
    </div>
</body>

</html>