<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?echo Layout::get_instance()->include_css();?>
    <title><?echo View::get_instance()->title?></title>
</head>
<body>
    <?
    echo View::get_instance()->content ?>
    <?echo Layout::get_instance()->include_js();?>
</body>
</html>