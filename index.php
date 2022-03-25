<?
require_once('bootstrap.php');
try {
	Route::get_instance()->load_file();
} catch (Exception $e) {
	if(file_exists("errors" .  DIRECTORY_SEPARATOR . "404.php")) {
		require_once "errors" .  DIRECTORY_SEPARATOR . "404.php";
	}
	else
	{
		echo $e;
	}
}