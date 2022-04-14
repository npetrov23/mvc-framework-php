<?
namespace catalog\rest;

class Product {
    public function action_get($id) {
        $model = new \catalog\model\Product($id);
        return $model->json();
    }
}
