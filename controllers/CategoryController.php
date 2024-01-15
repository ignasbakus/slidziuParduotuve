    <?php
    // include authors
    include "../../models/Category.php";
    class CategoryController
    {

        public static function getAll()
        {
            $categories = Category::all();
            return $categories;
        }

        public static function find($id)
        {
            $category = Category::find($id);
            return $category;
        }

        public static function store()
        {
            if (strlen($_POST['name']) == 0) {
                $errors[] = " Pavadinimas per trumpas";
            }

            if (strlen($_POST['description']) == 0) {
                $errors[] = " Aprašymas per trumpas";
            }

            if (strlen($_POST['photo']) == 0) {
                $errors[] = " Nuotraukos URL per trumpas";
            }

            if ($errors) {
                $_SESSION['alert'] = $errors;
                return false;
            }
            $category = new Category();
            $category->name = $_POST['name'];
            $category->description = $_POST['description'];
            $category->photo = $_POST['photo'];
            // print_r($category);die;
            $category->save();
            return true;
        }

        public static function update($id)
        {
            $category = Category::find($id);
            $category->name = $_POST['name'];
            $category->description = $_POST['description'];
            $category->photo = $_POST['photo'];
            $category->update();
        }

        public static function destroy($id)
        {
            Category::destroy($id);
        }
    }
