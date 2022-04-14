<?
class Route {

    private static $instance;
    private $rules;
    private $url;
    private $param = [];

    public static function get_instance() {
		self::$instance ?? self::$instance = new self();
		return self::$instance;
    }

    public function load_file() {
        foreach($this->rules as $rule) {
            $preg = "#^{$rule["url"]}$#";
            $page = preg_match($preg, $this->url, $matches);
            if($page) {
                $this->set_param($matches);
                if(array_key_exists("controller", $rule)) {
                    $this->controller_func_execute($rule["controller"]);
                    return;
                }
                if(array_key_exists("file", $rule)) {
                    require_once $rule["file"];
                    return;
                }
            }
        }

        throw new Exception("Page not found", 404);
    }

    private function controller_func_execute(string $function) {
        // if(function_exists($function)) {
             call_user_func($function);
        // }
        // else {
        //     echo "dont exists";
        // }
    }

    private function __construct() {
        $this->get_rules();
        $this->get_url();
    }

    private function get_rules() {
        $this->rules = Config::get_config("route");
    }

    private function get_url() {
        $this->url = $_SERVER['REQUEST_URI']; 
    }

    private function set_param(array $matches) {
        foreach($matches as $index => $id) {
            if(!is_numeric($index)) {
                $this->param[$index] = $id;
            }
        }
    }

    public function get_param(string $key_param = "") {
        if($key_param) {
            if(isset($this->param[$key_param])) {
                return $this->param[$key_param];
            }
        }
        else
        {
            return $this->param;
        }
        
    }

    private function __clone() {}

    public function __wakeup() {
        throw new Exception("Dont serialize", 1);
    }
}