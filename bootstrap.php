<?

function layout($class_name) {
	$filename = __DIR__ . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR . strtolower($class_name) . ".php";
	require_once($filename);
}

spl_autoload_register("layout");
$obj = layout::get_instance();