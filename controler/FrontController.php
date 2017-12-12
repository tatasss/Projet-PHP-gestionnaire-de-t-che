<?php

/**
 * Created by PhpStorm.
 * User: magaydu
 * Date: 02/12/2017
 * Time: 10:59
 */
//require ("validation.php");
class FrontController
{

    public function __construct($vueConf)
    {
        global $vue;
        $vue= $vueConf;
        session_start();


//debut

//on initialise un tableau d'erreur
        $dVueEreur = array ();

        try{
            $action=$_REQUEST['action'];

            switch($action) {


                case NULL :
                    $this->reinit($vue);
                    break;
                case "connection":
                    $this->chercherFormulaireCo($vue);
                    break;
                default:
                    $dVueEreur[] =	"Erreur d'appel php";
                    require ($vue['index']);
                    break;
            }

        } catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($vue['erreur']);

        }
        catch (Exception $e2)
        {
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ($vue['erreur']);
        }


//fin
        exit(0);


    }

	function reinit($vue){

        require ($vue['index']);
    }
    function  chercherFormulaireCo($vue){
        require($vue['connection']);
    }
}