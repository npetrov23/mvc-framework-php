<?
use component\form\Main;
$fields = Main::get_fields_model();
?>

<form  method="POST" action="/catalog/rest/product/create/">

<?
foreach($fields as $field => $param_field) {
    if(array_key_exists("form_type", $param_field)) {
        $type = $param_field["form_type"];
    }
    else {
        $type = $param_field["type"]; 
    }
    
    switch ($type) {
        case Db::T_VARCHAR:
            View::include("string", "", "form", ["form_name" => $param_field["label"], "form_required" => $param_field["null"]]);
            break;
        case Db::T_TEXTAREA:
            View::include("textarea", "", "form", ["form_name" => $param_field["label"], "form_required" => $param_field["null"]]);
            break;
        case Db::T_INT:
            View::include("int", "", "form", ["form_name" => $param_field["label"], "form_required" => $param_field["null"]]);
            break;
    }
}
?>

<button type="submit">Создать товар</button>
</form>

<?echo Layout::get_instance()->get_static("create_product.js");?>