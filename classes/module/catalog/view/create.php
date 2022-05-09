<? View::get_instance()->title="Создание товара";
Component::factory([
    "name" => "form"],
    ["target" => ["name" => "product", "module" => "catalog"]]
)->render();