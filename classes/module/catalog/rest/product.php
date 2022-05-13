<?
namespace module\catalog\rest;

class Product {
    public function action_get() {
        $id = \Route::get_instance()->get_param("id");
        $model = \Model::factory(["name" => "product", "module" => "catalog", "id" => $id]);
        return $model;
    }

    public function action_delete() {
        $id = \Route::get_instance()->get_param("id");
        $model = \Model::factory(["name" => "product", "module" => "catalog", "id" => $id]);
        $model->delete($id);
    }

    public function action_create() {
        $model = \Model::factory(["name" => "product", "module" => "catalog"]);
        $model->set($_POST);
        $model->save();

        header("Location: http://localhost/catalog/view/");
    }
}

