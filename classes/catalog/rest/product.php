<?
namespace catalog\rest;

class Product {
    public function action_get() {
        $id = \Route::get_instance()->get_param("id");
        $model = new \catalog\model\Product($id);
        return $model->json();
    }

    public function action_delete() {
        $id = \Route::get_instance()->get_param("id");
        $model = new \catalog\model\Product($id);
        $model->delete($id);
        // json_encode($model->delete($id))
    }
}

