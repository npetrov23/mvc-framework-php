<?
class Model {
    protected $table_name = "";    
    protected $table_column = [];
    protected $cache_tables = [];
    protected $primary_key = "id";
    protected $properties = [];
    protected $loaded = false;
    //protected $id;

    public function __construct($id = 0) {
        $this->check_table();
        if($id) {
            $this->get($id);
        }
    }
    
    public function create_table() {
        if(in_array($this->primary_key, $this->table_column)) {
            $this->table_column[$this->primary_key]["primary"] = "Y";
        }
        else
        {
            $this->table_column[$this->primary_key] = ["type" => Db::T_INT, "null" => "N", "primary" => "Y"];
        }

        DB::get_instance()->create_table($this->table_name, $this->table_column);    
    }

    public function check_table() {
        if(!in_array($this->table_name, $this->cache_tables)) {
            $this->cache_tables[] = $this->table_name;
            if(!Db::get_instance()->table_exists($this->table_name)) {
                $this->create_table();
            }
        }
    }

    public function save() {
        $this->loaded ? $this->update() : $this->create();
        
    }

    public function update() {
        echo "its update query";
    }

    public function create() {
        $this->loaded = true;
        $this->id = Db::get_instance()->insert($this->table_name, $this->properties);
    }

    public function set($properties) {
        foreach($properties as $name => $value) {
            
            $this->$name = $value;
        }
    }

    protected function get($id) {
        $statement = Db::get_instance()->select($this->table_name, "id = {$id}", 1);
        $row = $statement->fetch();
        if($row) {
            $this->set($row);
        }
    }

    public function find_all($where = "", $limit = 0) {
        $statement = Db::get_instance()->select($this->table_name, $where, $limit);

        $models = [];
        while($row = $statement->fetch())
        {
            $models[] = new $this($row["id"]);
        }

        return $models;
    }

    public function find($where = "") {
        $statement = Db::get_instance()->select($this->table_name, $where, 1);
        $row = $statement->fetch();
        $models = [];
        $models[] = new $this($row["id"]);
        return $models;
    }

    public function json() {
        return json_encode($this->properties);
    }

    public function delete(int $id) {
        return Db::get_instance()->delete($this->table_name, $id);
    }

    public function __set($name, $value) {
        if(in_array($name, array_keys($this->table_column))) {
            $this->properties[$name] = $value;
        }
    }

    public function __get($name) {
        if(in_array($name, array_keys($this->table_column))) {
            echo $this->properties[$name];
        }
    }
} 