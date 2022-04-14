<?
namespace catalog\model;

class Product extends \Model {
    protected $table_name = "products";    
    protected $table_column = [
        "id" => ["type" => \Db::T_INT],
        "title" => ["type" => \Db::T_VARCHAR, "null" => "Y"],
        "description" => ["type" => \Db::T_VARCHAR, "null" => "Y"],
        "price" => ["type" => \Db::T_INT, "null" => "Y"],
    ];
}