<? require_once('../bootstrap.php');
$products = [
	["title" => "Товар1",
	 "description" => "Описание товара 2",
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?echo $obj->include_css?>
	<?echo $obj->include_fonts?>
	<title>Каталог</title>
</head>
<body>
	<div class="catalog">
	<?foreach($products as $number_product => $product) {?>
		<div class="catalog__product">
			<div class="catalog__title"><b><?echo $products[$number_product]["title"]?></b></div>
			<div class="catalog__description"><?echo $products[$number_product]["description"]?></div>
			<div class="catalog__price"><?echo $products[$number_product]["price"]?>р</div>
		</div>
	<?}?>
	</div>

	<?echo $obj->include_js?>
</body>
</html>