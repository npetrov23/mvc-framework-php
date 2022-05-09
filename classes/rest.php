<?
class Rest {
    private static $matches;
    public static function dispatch() {
        
        self::$matches = \Route::get_instance()->get_param();
        $class = '\\module\\' . self::$matches["module"] . "\\" . 'rest' . "\\" . self::$matches["rest"];
        $action = "action_" . self::$matches["action"];
        if(class_exists($class)) {
            $rest = new $class;
            $json = $rest->$action();
        }
        else
        {
            
            throw new Exception("Page not found", 404);
        }


        echo $json;
    }
}