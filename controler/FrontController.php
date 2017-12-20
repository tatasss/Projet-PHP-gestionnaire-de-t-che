<?php

//use dal\Connection;
//require (__DIR__.config/config.php);


/**
 * Created by PhpStorm.
 * User: magaydu
 * Date: 02/12/2017
 * Time: 10:59
 */

//require ("validation.php");
class FrontController
{


    /**
     * FrontController constructor.
     */
    public function __construct()
    {

    global $idList;
    global $connecte;
    global $notreUsegt;
    global $modeleList;
    global $modeleTache;

    $modeleList=new ModeleListeTaches();
    $notreUsegt=new ModeleUtilisateur();
    $modeleTache=new ModeleTache();

    if(!isset(Config::$connecte))Config::$connecte=0;
        //$this->getValue($modeleList,$modeleTache);
    $_SESSION['connecte']=Config::$connecte;
//debut

//on initialise un tableau d'erreur
        $dVueEreur = array ();
        //config::$tab=$this->affichlistePu($modeleList);
        try{
            if(isset($_REQUEST['action']))$action=$_REQUEST['action'];
            else $action=null;

            switch($action) {
                case 'index':
                    new ControllerVisiteur($action);
                    break;
                case NULL :
                    $this->reinit();
                    break;
                case "ajouterListeTache":
                    new ControllerVisiteur($action);
                    break;
                case "verifListe":
                    new ControllerVisiteur($action);
                    break;
                case "connection":
                    new ControllerUser($action);
                    break;
                case "ajouterTache":
                    new ControllerVisiteur($action);
                    break;
                case "verifTache":
                    new ControllerVisiteur($action);
                    break;
                case "verifCo":new ControllerUser($action);
                    break;
                case "ajoutertache":
                    $this->ajoutache();
                    break;
                default:
                    $dVueEreur[] =	"Erreur d'appel php";
                    require (config::$vue['index']);
                    break;
            }

        } catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require (config::$vue['erreur']);

        }
        catch (Exception $e2) {
            $dVueEreur[] = "Erreur inattendue!!! ";
            require(config::$vue['erreur']);
        }
        session_destroy();


//fin
        exit(0);


    }

	function reinit(){
        $dVue = array (
            'nom' => "",
            'mdp' => "",
        );
        require (config::$vue['index']);
    }

}