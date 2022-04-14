<?

function layout($class_name) {
	$path = str_replace('\\', '/', strtolower($class_name) );
	$filename = __DIR__ . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR . $path . ".php";
	require_once($filename);
}

spl_autoload_register("layout");