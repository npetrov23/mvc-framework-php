<? $id = Route::get_instance()->get_param("id");
// $product = new \catalog\model\Product($id);
$product = Model::factory(["name" => "product", "module" => "catalog"]);
View::get_instance()->title = "Товар";?>

<div id="info">
	<product product_id=<?echo $id?>></product>
</div>
<?echo Layout::get_instance()->get_static("product.js");?>