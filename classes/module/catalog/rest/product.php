<?
namespace module\catalog\rest;

class Product {
    public function action_get() {
        $id = \Route::get_instance()->get_param("id");
        // $model = new module\catalog\model\Product($id);
        
        $model = \Model::factory(["name" => "product", "module" => "catalog", "id" => $id]);
        return $model->json();
    }

    public function action_delete() {
        $id = \Route::get_instance()->get_param("id");
        // $model = new \catalog\model\Product($id);
        $model = \Model::factory(["name" => "product", "module" => "catalog"]);
        $model->delete($id);
        // json_encode($model->delete($id))
    }
}

