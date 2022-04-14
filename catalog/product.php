<? $id = Route::get_instance()->get_param("product_id");
$product = new \catalog\model\Product($id);?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?echo $product->title?></title>
</head>
<body>

    <div id="info">
		<product product_id=<?echo $id?>></product>
	</div>
    <?echo Layout::get_instance()->get_static("product.js");?>
	<?echo Layout::get_instance()->include_js();?>
</body>
</html>