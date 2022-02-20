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
	<?echo $obj->include_js?>
	<?echo $obj->include_css?>
	<?echo $obj->include_fonts?>
	<link rel="stylesheet" href="\static\css\grid.css">
	<title>Каталог</title>
</head>
<body>
	<div class="catalog">
		<div class="catalog__product">
			<div class="catalog__title"><b><?echo $products[0]["title"]?></b></div>
			<div class="catalog__description"><?echo $products[0]["description"]?></div>
			<div class="catalog__price"><?echo $products[0]["price"]?>р</div>
		</div>
		<div class="catalog__product">
			<div class="catalog__title"><b><?echo $products[1]["title"]?></b></div>
			<div class="catalog__description"><?echo $products[1]["description"]?></div>
			<div class="catalog__price"><?echo $products[1]["price"]?>р</div>
		</div>
		<div class="catalog__product">
			<div class="catalog__title"><b><?echo $products[2]["title"]?></b></div>
			<div class="catalog__description"><?echo $products[2]["description"]?></div>
			<div class="catalog__price"><?echo $products[2]["price"]?>р</div>
		</div>
		<div class="catalog__product">
			<div class="catalog__title"><b><?echo $products[3]["title"]?></b></div>
			<div class="catalog__description"><?echo $products[3]["description"]?></div>
			<div class="catalog__price"><?echo $products[3]["price"]?>р</div>
		</div>
	</div>
</body>
</html>