<?php
// include database
class Category
{
    public $id;
    public $name;
    public $description;
    public $photo;

    public function __construct($id = 0, $name = "", $description = "", $photo = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->photo = $photo;
    }

    public static function all()
    {
        $categories = [];
        $db = new mysqli("localhost", "root", "", "web_mokymai_shop");
        $result = $db->query("SELECT * from categories");
        while ($row = $result->fetch_assoc()) {
            $categories[] = new Category($row['id'], $row['name'], $row['description'], $row['photo']);
        }
        return $categories;
    }

    public static function find($id)
    {
        $category = new Category();
        $db = new mysqli("localhost", "root", "", "web_mokymai_shop");
        $sql = "SELECT * from categories WHERE id =" . $id;
        $result = $db->query($sql);
        while ($row = $result->fetch_assoc()) {
            $category = new Category($row['id'], $row['name'], $row['description'], $row['photo']);
        }
        return $category;
    }
}
