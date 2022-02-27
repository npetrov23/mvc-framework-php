<?
class Config {
    private static $config_cache = "";

    public static function get_config(string $config_name, string $config_key = "") {
        return self::include_config($config_name, $config_key);
    }

    public static function include_config(string $config_name, string $config_key = "") {
        $path = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "configs" . DIRECTORY_SEPARATOR . $config_name . ".php";
        if(self::$config_cache == "") {
            if(file_exists($path)) {
                self::$config_cache = include_once($path);
                return array_key_exists($config_key, self::$config_cache) ? self::$config_cache[$config_key] : self::$config_cache;
            }
        }
        else {
            return self::$config_cache;
        }
    }
}