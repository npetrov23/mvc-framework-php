<?
class Model {
    protected $table_name;
    protected $table_column;
    protected $cache_tables;
    protected $primary_key = "id";

    public function __construct() {
        $this->create_table();
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
        if(in_array($this->table_name, $this->cache_tables)) {
            
        }
    }
}   