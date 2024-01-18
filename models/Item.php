<?php
// include database
class Item
{
    public $id;
    public $title;
    public $price;
    public $description;
    public $photo;
    public $category_id;

    public function __construct($id = 0, $title = "", $price = 0, $description = "", $photo = "", $category_id = 0)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
        $this->photo = $photo;
        $this->category_id = $category_id;
    }

    public static function all()
    {
        $items = [];
        $db = new mysqli("localhost", "root", "", "web_mokymai_shop");
        $sql = "SELECT * FROM items";
        if (isset($_GET['orderBy'])) {
            switch ($_GET['orderBy']) {
                case 'id':
                    $sql .= " ORDER BY id";
                    break;
                case 'title':
                    $sql .= " ORDER BY title";
                    break;
                case 'price':
                    $sql .= " ORDER BY price";
                    break;
                case 'description':
                    $sql .= " ORDER BY description";
                    break;
                case 'photo':
                    $sql .= " ORDER BY photo";
                    break;
                case 'category_id':
                    $sql .= " ORDER BY category_id";
                    break;
                default:
                    break;
            }
        }
        if (isset($_GET['order']) && $_GET['order'] == 'desc'){
            $sql .= " desc;";
        }
            $result = $db->query($sql);
        while ($row = $result->fetch_assoc()) {
            $items[] = new Item($row['id'], $row['title'], $row['price'], $row['description'], $row['photo'], $row['category_id']);
        }
        $db->close();
        return $items;
    }

    public static function find($id)
    {
        $item = new Item();
        $db = new mysqli("localhost", "root", "", "web_mokymai_shop");
        $sql = "SELECT * from items WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $item = new Item($row['id'], $row['title'], $row['price'], $row['description'], $row['photo'], $row['category_id']);
        }
        $db->close();
        return $item;
    }

    public function save()
    {
        $db = new mysqli("localhost", "root", "", "web_mokymai_shop");
        $sql = "INSERT INTO `items`(`title`, `price`, `description`, `photo`, `category_id`) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("sissi", $this->title, $this->price, $this->description, $this->photo, $this->category_id);
        $stmt->execute();
        $db->close();
    }

    public function update()
    {
        $db = new mysqli("localhost", "root", "", "web_mokymai_shop");
        $sql = "UPDATE `items` SET `title`=?, `price`=?, `description`=?,`photo`=?, `category_id`=? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("sissii", $this->title, $this->price, $this->description, $this->photo, $this->category_id, $this->id);
        $stmt->execute();
        $db->close();
    }

    public static function destroy($id)
    {
        $db = new mysqli("localhost", "root", "", "web_mokymai_shop");
        $sql = "DELETE FROM `items` WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $db->close();
    }
}
