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
	    // $test = [
		// 	"id" => ["type" => Db::T_INT, "null" => "N", "primary" => "Y"],
		// 	"name" => ["type" => Db::T_VARCHAR, "null" => "Y", "primary" => "Y"],
		// 	"age" => ["type" => Db::T_INT, "null" => "Y", "primary" => "Y"],
		// 	"some" => ["type" => Db::T_VARCHAR, "null" => "N", "primary" => "Y"],
		// ];

		// $test["id"]["primary"] = "N";
		// echo $test["id"]["primary"];



		// Db::get_instance()->create_table("test", $columns_test);
		// var_dump(Db::get_instance()->table_exists("table_without_primary"));
		// echo Db::get_instance()->insert("test", $data);
		// print_r(Db::get_instance()->select("test"));

		// new Product;

		// $table_column = [
		// 	"id" => ["type" => Db::T_VARCHAR, "null" => "Y"],
		// 	"name" => ["type" => Db::T_VARCHAR, "null" => "Y"],
		// 	"age" => ["type" => Db::T_INT, "null" => "Y"],
		// 	"some" => ["type" => Db::T_VARCHAR, "null" => "N"],
		// ];
		// echo "<pre>";	
		// print_r(array_keys($table_column));
		
		// echo(in_array("id1", array_keys($table_column)));

		$data = [
			"name" => "Nikita1",
			"ag" => 221,
			"soe" => "Nikita is programmer"
		];

		$table = new Product();
		$table->set($data);
		$table->save();

	?>
	</pre>


</body>
</html>