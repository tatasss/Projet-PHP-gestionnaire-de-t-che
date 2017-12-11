<?php
require_once(__DIR__.'/config/config.php');
require_once(__DIR__.'/config/autoload.php');
Autoload::charger();
echo '<pre>';
print_r($vue);
echo '</ pre>';

//require ($vue['index']);
$cont = new FrontController();
?>

