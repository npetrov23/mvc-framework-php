<?
class Product extends Model {
    protected $table_name = "products1";    
    protected $table_column = [
        "id" => ["type" => Db::T_VARCHAR, "null" => "Y"],
        "name" => ["type" => Db::T_VARCHAR, "null" => "Y"],
        "age" => ["type" => Db::T_INT, "null" => "Y"],
        "some" => ["type" => Db::T_VARCHAR, "null" => "Y"],
    ];

    
}