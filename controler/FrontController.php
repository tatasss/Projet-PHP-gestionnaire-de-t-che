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


    public function __construct()
    {



        session_start();


//debut

//on initialise un tableau d'erreur
        $dVueEreur = array ();

        try{
            $action=$_REQUEST['action'];

            switch($action) {


                case NULL :
                    $this->reinit();
                    break;
                case "connection":
                    $this->chercherFormulaireCo($dVueEreur);
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
        catch (Exception $e2)
        {
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require (config::$vue['erreur']);
        }


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

    /**
     * @param $vue
     * @param $dVueEreur
     */
    function  chercherFormulaireCo($dVueEreur){
        $con=new Connection(config::$dsn,config::$login,config::$mdp);
       $notreUsegt=new UtilisateurGateway($con);
       require(config::$vue['connection']);
        $nom=$_POST['donNom'];
        $mdp=$_POST['donpwd'];
        Validation::nettoyerString($nom);
        Validation::nettoyerString($mdp);
        $dvue=array(
            'nom'=>$nom,
            'mdp'=>$mdp,
        );

       $notreUser=$notreUsegt->findUser($nom,$mdp);
    }
}