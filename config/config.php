<?php
class Config{
    static $rep=__DIR__.'/../';
    //liste des modules à inclures
    static $dConfig=array('include'=>'Validation.php');
    static $dsn ="mysql:host=localhost;dbname=matthias";
    static $login ="matthias";
    static $mdp = "judoka43";
    //liste des vue
    static $vue=array('erreur' =>'vue/erreur.php',
                      'index'=>'vue/indexVue.php',
                      'ajoutache'=>'vue/ajouterTache.php',
                      'base'=>'index.php',
                      'connection'=>'vue/connection.php');
    static $tab=[];
    static $id_list=0;
}
