<?php
class Config{
    static $rep=__DIR__.'/../';
    //liste des modules à inclures
    static $dConfig=array('include'=>'Validation.php');
    static $dsn ="mysql:host=localhost;dbname=dbMatthias";
    static $login ="matthias";
    static $mdp = "judoka43";
    //liste des vue
    static $vue=array('erreur' =>'vue/erreur.php',
                      'index'=>'vue/indexVue.php',
                      'public'=>'vue/public.php',
                      'base'=>'index.php',
                      'connection'=>'vue/connection.php');
    static $tab=[];
}
