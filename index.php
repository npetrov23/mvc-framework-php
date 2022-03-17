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
	<pre>
	<? 
	    $columns_test = [
			"id" => ["type" => Db::T_INT, "null" => "N", "primary" => "Y"],
			"name" => ["type" => Db::T_VARCHAR, "null" => "Y", "primary" => "N"],
			"age" => ["type" => Db::T_INT, "null" => "Y", "primary" => "N"],
			"some" => ["type" => Db::T_VARCHAR, "null" => "N", "primary" => "N"],
			
		];

		$data = [
			"id" => 2,
			"name" => "Nikita1",
			"age" => 221,
			"some" => "Nikita is programmer1"
		];

		// Db::get_instance()->create_table("test", $columns_test);
		// var_dump(Db::get_instance()->table_exists("table_without_primary"));
		// echo Db::get_instance()->insert("test", $data);
		print_r(Db::get_instance()->select("test"));

	?>
	</pre>


</body>
</html>