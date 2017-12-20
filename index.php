
<?php
require_once(__DIR__.'/config/config.php');
require_once(__DIR__.'/config/autoload.php');
Autoload::charger();

    session_start();
    $cont= new FrontController();

?>

