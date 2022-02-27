<?
class Config {
    private $config_cache = "";
    private $config_path =  DIRECTORY_SEPARATOR . "configs" . DIRECTORY_SEPARATOR;

    public static function get_config(string $config_name, string $config_key = "") {
        return $this->include_config($config_name, $config_key);
    }

    public function include_config(string $config_name, string $config_key = "") {
        if($this->config_cache == "") {
            if(file_exists($this->config_path . $config_name . ".php")) {
                $this->config_cache = include_once($this->config_path . $config_name . ".php");
                return array_key_exists($config_key, $this->config_cache) ? $this->config_cache[$config_key] : $this->config_cache;
            }
        }
        else {
            return $this->config_cache;
        }
    }
    // public static function get_config(string $config_name, string $config_key = "") {
    //     $path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "configs" . DIRECTORY_SEPARATOR . $config_name . ".php";
    //     if (self::$config_cache == "") {
    //         if (file_exists($path)) {
    //             self::$config_cache = include_once($path);
    //             if ($config_key == "") {
    //                 return self::$config_cache;
    //             }
    //             else
    //             {
    //                 return array_key_exists($config_key, self::$config_cache) ? self::$config_cache[$config_key] : null;
    //             }
    //         }
    //     }
    //     else
    //     {
    //         return self::$config_cache[$config_key];
    //     }
    // }
}