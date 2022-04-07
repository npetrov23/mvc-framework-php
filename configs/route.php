<?
return [
    [
        "url" => "/catalog/",
        "file" => "catalog\index.php"
    ],
    [
        "url" => "/catalog/(?<product_id>[^/]*)/",
        "file" => "catalog\product.php"
    ],
    [
        "url" => "/catalog/rest/product/(?<product_id>[^/]*)/",
        "file" => "catalog\\rest.php"
    ],
];