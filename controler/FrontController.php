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
    global $modeleTache;
    $modeleList=new ModeleListeTaches();
    $notreUsegt=new ModeleUtilisateur();
    $modeleTache=new ModeleTache();

    session_start();


        //$this->getValue($modeleList,$modeleTache);

//debut

//on initialise un tableau d'erreur
        $dVueEreur = array ();
        //config::$tab=$this->affichlistePu($modeleList);
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
    function affichlistePu(ModeleListeTaches $modeleList){
        //$modeleList->creerListeTache('lol',1,'aa','ceci est fait par le front controller');
        config::$tab=$modeleList->getListePublic();
        $i=0;
        print("<form method='post' nom='getliste' id='getliste'>");
        foreach (config::$tab as $row) {
            $i=$row->getId();
            print ("<button type='submit'id='$i' name='idList' value='$i' class=\"btn btn-primary btn-block\">" . $row->getNom() .
                "</button> ");

        }
        print("</form>");


    }
    function getValue(ModeleTache $modeTache){



           // (int) $liste=$modeleList->getListeById($_POST['idList']);
           // foreach ($liste as $row) {
                $tab = $modeTache->tachesDeListe($_POST['idList']);
            //    echo($row->getNomTache());
        foreach ($tab as $row){
            print('<div class="panel panel-default">');
            print('<div class="panel-heading">');
            print $row->getNomTache();
            print ('</div>');
            print('<div class="panel-body">');
            print $row->getDescriptionTache();
            print('</div>');
            print('</div>');
        }

    }


}