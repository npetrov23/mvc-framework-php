<?
class Route {

    public static $instance;
    private $rules;
    private $url;

    public static function get_instance() {
        if(!isset($instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function load_file() {
        foreach($this->rules as $rule) {
            $preg = "#^{$rule["url"]}$#";
            $page = preg_match($preg, $this->url, $matches);
            if($page) {
                require_once $rule["file"];
                return;
            }
        }

        throw new Exception("Page not found", 404);
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

    private function __clone() {}

    public function __wakeup() {
        throw new Exception("Dont serialize", 1);
    }
}