<?

class Db {
    private static $pdo;
    private static $instance;
    const T_INT = "INT";
    const T_VARCHAR = "VARCHAR(255)"; //не очень понятно как через константы задавать значения, например 255 для varchar
    const T_NOT_NULL = "NOT NULL";
    const T_NULL = "NULL";
    const A_I = "AUTO_INCREMENT";


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

    public function create_table(string $name, array $columns) {
        $param_table = $this->build_sql($columns);
        $db_name = Config::get_config("db", "db_name");
        $sql = "CREATE TABLE IF NOT EXISTS $db_name.$name ($param_table) ENGINE = InnoDB;";
        
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
    }


    // пример создания таблицы
    // $columns_test = [
    //     "name" => ["type" => Db::T_VARCHAR, "null" => "Y", "primary" => "N"],
    //     "age" => ["type" => Db::T_INT, "null" => "Y", "primary" => "N"],
    //     "id23" => ["type" => Db::T_INT, "null" => "N", "primary" => "Y"],
    // ];
    // Db::get_instance()->create_table("test", $columns_test);

    private function build_sql(array $columns) : string {
        $result_sql = "";
        foreach($columns as $column_name => $column_param) {
            $result_sql .= "$column_name {$column_param['type']} ";
            $column_param["null"] == "Y" ? $result_sql .= self::T_NULL : $result_sql .= self::T_NOT_NULL;
            $column_param["primary"] == "Y" ? $result_sql .= " ".self::A_I : "";
            $result_sql .= ", ";
            $column_param["primary"] == "Y" ? $result_sql .= " PRIMARY KEY ({$column_name})" : "";
        }

        return $result_sql;
    }

    protected function __construct() {
        $this->connect();
    }
    protected function __clone() {}
    public function __wakeup() {
        throw new Exception("Error call wakeup");
    }

}