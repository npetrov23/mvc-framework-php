<?
class View {
    private static $instance;
    private static $path_main_template;
    private static $path_view;
    private static $param = [];

    public static function get_instance() {
		self::$instance ?? self::$instance = new self();
		return self::$instance;
	}

    public static function dispatch() {
        $matches = \Route::get_instance()->get_param();
        $root = self::get_url();
        self::$path_main_template = $root . DIRECTORY_SEPARATOR . "view" . DIRECTORY_SEPARATOR . "template.php";
        self::$path_view = $root;
        
        if(array_key_exists("module", $matches)) {
            if(file_exists(self::$path_view . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR . "module" . DIRECTORY_SEPARATOR . $matches["module"])){
                self::$path_view .= DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR . "module" . DIRECTORY_SEPARATOR . $matches["module"];
            }
            else
            {
                throw new Exception("Page not found", 404);
            }
        }
        if(array_key_exists("name", $matches)) {
            if(file_exists(self::$path_view . DIRECTORY_SEPARATOR . "view" . DIRECTORY_SEPARATOR . $matches["name"] . ".php")){
                self::$path_view .= DIRECTORY_SEPARATOR . "view" . DIRECTORY_SEPARATOR . $matches["name"] . ".php";
            }
            else
            {
                throw new Exception("Page not found", 404);
            }
        }
        else
        {
            self::$path_view .= DIRECTORY_SEPARATOR . "view" . DIRECTORY_SEPARATOR . "index.php";
        }

        self::render();
    }

    public static function render() {
        self::$param["content"] = self::include();
        include self::$path_main_template;
    }

    public static function include() {
        ob_start();
        include self::$path_view;
        return ob_get_clean();
    }

    public static function get_url() {
        return $_SERVER["DOCUMENT_ROOT"];
    }

    public function __get($name) {
        if(in_array($name, array_keys(self::$param))){
            return self::$param[$name];
        }
    }

    public function __set($name, $value) {
        return self::$param[$name] = $value;
    }

    protected function __construct() {}
	protected function __clone() {}
	public function __wakeup() {
		throw new Exception("Error call wakeup", 1);
	}
}