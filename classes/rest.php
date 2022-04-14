<?
class Rest {
    private static $matches;
    public static function dispatch() {
        self::$matches = \Route::get_instance()->get_param();
        $class = self::$matches["module"] . "\\" . 'rest' . "\\" . self::$matches["rest"];
        $action = "action_" . self::$matches["action"];
        $rest = new $class;
        $json = $rest->$action(self::$matches["id"]);

        echo $json;
    }
}