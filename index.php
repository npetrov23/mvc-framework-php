<? require_once('bootstrap.php');?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?echo Layout::get_instance()->include_css();?>
	<title>Document</title>
</head>
<body>
	<p>Главная страница</p>

	<? 
	    $columns_test = [
			"name" => ["type" => Db::T_VARCHAR, "null" => "Y", "primary" => "N"],
			"age" => ["type" => Db::T_INT, "null" => "Y", "primary" => "N"],
			"id" => ["type" => Db::T_INT, "null" => "N", "primary" => "Y"],
		];

	Db::get_instance()->create_table("test23", $columns_test);

	?>


</body>
</html>