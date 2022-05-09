<?
use component\form\Main;
$fields = Main::get_fields_model();

foreach($fields as $field => $param_field) {
    $type = $param_field["type"]; 
?>

<form  method="POST">

<?
    switch ($type) {
        case DB::T_VARCHAR:
            View::include("string", "", "form", ["form_name" => $param_field["label"]]);
            break;
        case "TEXTAREA":
            View::include("textarea", "", "form", ["form_name" => $param_field["label"]]);
            break;
        case DB::T_INT:
            View::include("int", "", "form", ["form_name" => $param_field["label"]]);
            break;
    }
}
?>

<button type="submit">Создать товар</button>
</form>