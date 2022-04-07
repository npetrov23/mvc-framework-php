<?
class Layout {
	private static $instance;
	private $relative_path = DIRECTORY_SEPARATOR . "static" . DIRECTORY_SEPARATOR;
	private $static_types = ["styles" => ["css"], "scripts" => ["js"]];
	public $static_files = [];
	private $default_type = "";

	public static function get_instance() {
		self::$instance ?? self::$instance = new self();
		return self::$instance;
	}

	public function get_extension_file(string $filename) : string {
		$info_about_file = pathinfo($filename);
		return $info_about_file["extension"];
   }

   public function get_static(string $filename) : string {
	   $extension = $this->get_extension_file($filename);
	   foreach($this->static_types as $key => $list_extension) {
		   if (in_array($extension, $list_extension)) {	
			   $this->static_files[$key][] = $filename;
		   }
	   }

	   return $this->default_type;
   }

	public function include_css() {
		foreach($this->static_files as $type => $files) {
			if($type == "styles") {
				foreach(array_unique($files) as $filename){
					echo "<link rel='stylesheet' href='" . $this->relative_path . "css" . DIRECTORY_SEPARATOR . $filename . "'>";
				}
			}
		}
	}

	public function include_js() {
		foreach($this->static_files as $type => $files) {
			if($type == "scripts") {
				foreach(array_unique($files) as $filename){
					echo "<script src='" . $this->relative_path . "js" . DIRECTORY_SEPARATOR . $filename . "'></script>";
				}
			}
		}
	}
	
	
	public function google_fonts() {
		$font = Config::get_config("layout", "font") ?? 'Arial';
		$font_format = trim(str_replace(" ", "+", Config::get_config("layout", "font") ?? 'Arial'));
		echo "<link rel='preconnect' href='https://fonts.googleapis.com'>
		<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
		<link href='https://fonts.googleapis.com/css2?family={$font_format}&display=swap' rel='stylesheet'>
		
		<style>
		:root{
			font-family: $font, sans-serif;
		}
		</style>
		";
	}

	protected function __construct() {
		$this->get_static("bootstrap.css");
		$this->get_static("vue.js");
		$this->google_fonts();
	}
	protected function __clone() {}
	public function __wakeup() {
		throw new Exception("Error call wakeup", 1);
	}

}