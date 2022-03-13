<?

class Db {
    private static $pdo;
    private static $instance;
    const T_INT = "INT";
    const T_VARCHAR = "VARCHAR(255)";
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

    private function build_sql(array $columns) : string {
        $result_sql = "";
        $primary_key = "";
        foreach($columns as $column_name => $column_param) {
            $result_sql .= "$column_name {$column_param['type']} ";
            $column_param["null"] == "Y" ? $result_sql .= self::T_NULL : $result_sql .= self::T_NOT_NULL;
            if($column_param["primary"] == "Y") {
                $result_sql .= " ".self::A_I;
                $primary_key = $column_name;
            }
            $result_sql .= ", ";
        }

        $primary_key == "" ? $result_sql .= "`id`" . self::T_INT . " " . self::A_I . ", PRIMARY KEY (`id`)" : $result_sql .= "PRIMARY KEY ($primary_key)";
        return $result_sql;
    }

    public function table_exists(string $table_name) : bool {
        $sql = "SHOW TABLES LIKE '$table_name'";
        $statement = $this->pdo->query($sql);
        return $statement->fetch() == false ? false : true;
    }

    public function insert(string $table_name, array $table_values){
        $column_name = implode(",", array_keys($table_values));
        // $values = "'" . implode("', '", $table_values) . "'";
        $placeholder = ":" . implode(", :", array_keys($table_values));
        $sql = "INSERT INTO $table_name ($column_name) VALUE ($placeholder)";

        $statement = $this->pdo->prepare($sql);
        $statement->execute($table_values);
        // $values = "'" . implode("', '", $table_value) . "'";
        // $sql = "INSERT INTO $table_name VALUE ($values)";
        // $this->pdo->prepare($sql);
        // return $this->pdo->lastinsertid();
    }

    protected function __construct() {
        $this->connect();
    }
    protected function __clone() {}
    public function __wakeup() {
        throw new Exception("Error call wakeup");
    }

}