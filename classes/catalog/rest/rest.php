<?
$id = Route::get_instance()->get_param("product_id");
$model = new Product($id);
echo $model->json();