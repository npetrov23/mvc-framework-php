<?
namespace module\catalog\model;
use Model;
class Product extends Model {
    protected $table_name = "products";    
    protected $table_column = [
        "id" => ["type" => \Db::T_INT],
        "title" => ["type" => \Db::T_VARCHAR, "null" => "Y", "label" => "Название товара"],
        "description" => ["type" => \Db::T_VARCHAR, "null" => "Y", "label" => "Описание товара"],
        "price" => ["type" => \Db::T_INT, "null" => "Y", "label" => "Цена товара"],
    ];
}