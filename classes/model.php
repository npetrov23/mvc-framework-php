<?
class Model {
    protected $table_name;
    protected $table_column;
    protected $cache_tables = [];
    protected $primary_key = "id";
    protected $properties = [];
    protected $loaded;
    protected $id;

    public function __construct($id = 0) {
        $this->check_table();
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
        if($this->loaded) {
            echo "yes";
        }
        else
        {
            echo "no";
        }
        $this->loaded ? $this->update() : $this->create();
    }

    public function update() {
        //some
    }

    public function create() {
        echo 23;
        $this->loaded = true;
        $this->id = Db::get_instance()->insert($this->table_name, $this->properties);
    }

    public function set($properties) {
        foreach($properties as $column => $value) {
            $this->$column = $value;
        }
    }

    public function __set($name, $value) {
        if(in_array($name, array_keys($this->table_column))) {
            $this->properties[$name] = $value;
        }
    }

    public function __get($name) {
        if(in_array($name, array_keys($this->table_column))) {
            return $this->properties[$name];
        }
    }
}   