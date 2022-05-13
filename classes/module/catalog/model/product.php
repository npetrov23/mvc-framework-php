<?
namespace module\catalog\model;
use Model;
class Product extends Model {
    protected $table_name = "products";    
    protected $table_column = [
        "id" => ["type" => \Db::T_INT],
        "title" => ["type" => \Db::T_VARCHAR, "null" => "N", "label" => "Название товара"],
        "description" => ["type" => \Db::T_VARCHAR, "null" => "N", "label" => "Описание товара", "form_type" => \Db::T_TEXTAREA],
        "price" => ["type" => \Db::T_INT, "null" => "N", "label" => "Цена товара"],
    ];
}