<?php
// include authors
include "../../models/Category.php";
class CategoryController {

public static function getAll() {
    $categories = Category::all();
    return $categories;
}




}


?>