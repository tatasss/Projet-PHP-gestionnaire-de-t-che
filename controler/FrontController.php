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


    global $connecte;
    global $notreUsegt;
    global $modeleList;
    $modeleList=new ModeleListeTaches();
    $notreUsegt=new ModeleUtilisateur();

    session_start();




//debut

//on initialise un tableau d'erreur
        $dVueEreur = array ();
        config::$tab=$this->affichlistePu($modeleList);
        try{
            $action=$_REQUEST['action'];

            switch($action) {
                case 'index':
                    require (config::$vue['index']);
                    break;
                case NULL :
                    $this->reinit();
                    break;

                case "connection":
                    $this->chercherFormulaireCo($dVueEreur);
                    break;
                case "verifCo":
                    $notreUsegt=$this->valideForm($notreUsegt);
                    $_SESSION['utilisateur']=$notreUsegt;
                    require (config::$vue['index']);
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

    /**
     * @param $vue
     * @param $dVueEreur
     */
    function  chercherFormulaireCo($dVueEreur){


       require(config::$vue['connection']);

    }
    function valideForm(ModeleUtilisateur $notreUsegt){

        $nom=$_POST['donNom'];
        //echo $_POST['donNom'];
        $mdp=$_POST['donpwd'];
        //echo $_POST['donpwd'];
        $nom=Validation::nettoyerString($nom);
        $mdp=Validation::nettoyerString($mdp);
        /*$dvue=array(
            'nom'=>$nom,
            'mdp'=>$mdp,
        );*/
        try {
            $notreUsegt->findUser($nom, $mdp);

        }catch (Exception $e){
            echo $e->getMessage();
        }
        return $notreUsegt;

    }

    /**
     * @param $modeleList
     */
    static function affichlistePu(ModeleListeTaches $modeleList){

        config::$tab=$modeleList->getListePublic();
        foreach (config::$tab as $row)
            print ("<li>".$row->getNom()."</li>");
    }


}