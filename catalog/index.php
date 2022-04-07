<?
$products = [
	["title" => "Товар1",
	 "description" => "Описание товара 1",
	 "price" => 10],
	["title" => "Товар 2",
	 "description" => "Описание товара 2",
	 "price" => 20],
	["title" => "Товар 3",
	 "description" => "Описание товара 3",
	 "price" => 30],
	["title" => "Товар 4",
	 "description" => "Описание товара 4",
	 "price" => 40],
];

// foreach($products as $product) {
// 	$table = new Product();
// 	$table->set($product);
// 	$table->save();
// }

$model_products = new Product();
$products = $model_products->find_all();


?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?echo Layout::get_instance()->get_static("grid.css");?>
	<?echo Layout::get_instance()->include_css();?>
	<title>Каталог</title>
</head>
<body>
	<div class="catalog">
		<?foreach($products as $product) {?>
			<div class="catalog__product">
				<div class="catalog__title"><a href="<?$product->id?>"><?$product->title?></a></div>
				<div class="catalog__description"><?$product->description?></div>
				<div class="catalog__price"><?$product->price?>р</div>
			</div>
		<?}?>
	</div>

	<?echo Layout::get_instance()->include_js();?>
</body>
</html>


