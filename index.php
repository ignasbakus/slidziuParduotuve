<?php
header("Location: ./views/categories");
die;



?>







<!-- <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_mokymai_shop";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<h1>Slidžių tipai</h1>

<?php

while ($row = $result->fetch_assoc()) {
    echo "<h1 class = 'skiTypes'>" . $row["name"] . "</h1>" . "<h3 class = 'description'>" . $row["description"] . "</h3>";
}

$conn->close();
?>
</body>

</html> -->