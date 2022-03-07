<?
class Db {
    private static $pdo;
    private static $instance;

    public static function get_instance() {
		if(!isset(self::$instance)) {
            self::$instance = new self();
        }
        
		return self::$instance;
	}

    public function connect() {
        $user = Config::get_config("db", "user");
        $password = Config::get_config("db", "password");
        $dsn = $this->get_dsn();

        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new PDO($dsn, $user, $password, $opt);
    }

    private function get_dsn() {
        $host = Config::get_config("db", "host");
        $db_name = Config::get_config("db", "db_name");
        $charset = Config::get_config("db", "charset");

        return "mysql:host=$host;dbname=$db_name;charset=$charset";
    }

    protected function __construct() {
        $this->connect();
    }
    protected function __clone() {}
    public function __wakeup() {
        throw new Exception("Error call wakeup");
    }

}