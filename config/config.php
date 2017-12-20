<?php
class Config{
    static $rep=__DIR__.'/../';
    //liste des modules à inclures
    static $dConfig=array('include'=>'Validation.php');
    static $dsn ="mysql:host=localhost;dbname=matthias";
    static $login ="matthias";
    static $mdp = "judoka43";
    //liste des vue
    static $connecte;
    static $vue=array('erreur' =>'vue/erreur.php',
                      'index'=>'vue/indexVue.php',
                      'ajoutListeTache'=>'vue/ajouterListeTache.php',
                      'base'=>'index.php',
                      'connection'=>'vue/connection.php',
                      'ajoutache'=>'vue/ajoutTache.php',
                      'mesTaches'=>'vue/mesTaches.php',
                      'ajouterTachePrivee'=>'vue/ajouterTachePrivee.php',
                      'ajouterListeTachePrivee'=>'vue/ajouterListeTachePrivee.php');
    static $tab=[];
    static $id_list = 0;
}
