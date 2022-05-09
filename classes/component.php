<?
class Component {
    protected static $params = [];

    public static function factory(array $info_about_component, array $params = []) {
        if(!array_key_exists("name", $info_about_component)) {
            throw new Exception("name dont exists", 500);
        }

        $name = $info_about_component["name"];
        $namespace = "\\component\\$name\\main";
        return new $namespace($params);
    }

    public function __construct($params) {
        self::$params = $params;
    }

    public static function get_target() {
        if(array_key_exists("target", self::$params)) {
            $model = Model::factory(self::$params["target"]);
            return $model;
        }
    }

    public function render() {
        View::include("index", "", "form");
    }
}