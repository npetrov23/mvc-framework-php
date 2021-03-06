
<?
class View {
    private static $instance;
    private static $path_main_template;
    private static $path_view;
    private static $param = [];
    private static $root;

    public static function get_instance() {
		self::$instance ?? self::$instance = new self();
		return self::$instance;
	}

    public static function dispatch() {
        $matches = \Route::get_instance()->get_param();
        self::$root = self::get_url();
        self::$path_main_template = self::$root . DIRECTORY_SEPARATOR . "view" . DIRECTORY_SEPARATOR . "template.php";
        $name = "";
        $module = "";
        $info = "";

        if(array_key_exists("module", $matches)) {
            $module = $matches["module"];
        }

        if(array_key_exists("info", $matches)) {
            $info = $matches["info"];
        }

        if(array_key_exists("name", $matches)) {
            $name = $matches["name"]; 
        }
        else
        {
            $name = "index"; 
        }
        
        self::render($name, $module);
    }

    public static function render($name, $module = "", $component = "", $param = "") {
        self::$param["content"] = self::include($name, $module, $component, $param);
        include self::$path_main_template;
    }

    public static function include($name, $module = "", $component = "", $param = "") {
        if($module) {
            self::$path_view = self::$root . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR . "module"  . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR . "view" . DIRECTORY_SEPARATOR . $name . ".php";
        }
        if($component) {
            self::$path_view = self::$root . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR . "component"  . DIRECTORY_SEPARATOR . $component . DIRECTORY_SEPARATOR . "view" . DIRECTORY_SEPARATOR . $name . ".php";
        }
        if($param) {
            self::$param["param"] = $param;
        }

        if(file_exists(self::$path_view)){
            ob_start();
            include self::$path_view;
            return ob_get_clean();
        }
        else
        {
            throw new Exception("Page not found", 404);
        }

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