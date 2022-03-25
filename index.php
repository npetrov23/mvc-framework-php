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
	<? 
			try {
				Route::get_instance()->load_file();
			} catch (Exception $e) {
				echo $e;
			}
	?>

</body>
</html>