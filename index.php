<? require_once('bootstrap.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?echo Layout::get_instance()->include_css();?>
	<title>Document</title>
</head>
<body>
	<p>Главная страница</p>

	<? Db::get_instance() ?>
	<!-- <?echo var_dump(Config::get_config("layout", "font"));?>
	<br>
	<?echo var_dump(Config::get_config("layout", "font"));?>
	<br>
	<?echo var_dump(Config::get_config("layout", "font1"));?>
	<br>
	<?echo var_dump(Config::get_config("layout1", "font"));?>
	<br>
	<?echo var_dump(Config::get_config("layout1"));?>
	<br>
	<?var_dump(Config::get_config("layout"));?> -->

</body>
</html>