<?
class Layout {
	private static $instance;
	private $relative_path = DIRECTORY_SEPARATOR . "static" . DIRECTORY_SEPARATOR;
	private $static_types = ["styles" => "css", "script" => "js"];
	public $include_css;
	public $include_js;
	public $include_fonts;

	public static function get_instance() {
		self::$instance ?? self::$instance = new self();
		return self::$instance;
	}

	private function get_extension_file(string $filename) : string {
		$info_about_file = pathinfo($filename);
		return $info_about_file["extension"];
	}

	private function get_static_type(string $filename) : string {
		$extension = $this->get_extension_file($filename);
		if(in_array($extension, $this->static_types)) {
			foreach ($this->static_types as $key => $value) {
				if($extension == $value)
					return $key;
			}
		}
	}

	public function get_css(string $filename) {
		$type_static = $this->get_static_type($filename);
		$path = $this->relative_path . "css" . DIRECTORY_SEPARATOR . "$filename";
		if($type_static == "styles")
			$this->include_css = "<link rel='stylesheet' href='{$path}'>";
	}

	public function get_js(string $filename) {
		$type_static = $this->get_static_type($filename);
		$path = $this->relative_path . "js" . DIRECTORY_SEPARATOR . "$filename";
		if($type_static == "script")
			$this->include_js = "<script src='{$path}'></script>";
	}

	public function google_fonts(string $name_font) {
		$this->include_fonts = "<link rel='preconnect' href='https://fonts.googleapis.com'>
		<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
		<link href='https://fonts.googleapis.com/css2?family={$name_font}&display=swap' rel='stylesheet'>";
	}

	protected function __construct() {
		$this->get_css("bootstrap.css");
		$this->get_js("bootstrap.js");
		$this->google_fonts("Source+Sans+Pro");
	}
	protected function __clone() {}
	public function __wakeup() {
		throw new Exception("Error call wakeup", 1);
	}

}