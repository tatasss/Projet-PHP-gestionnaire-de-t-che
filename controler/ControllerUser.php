<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 02/12/2017
 * Time: 10:58
 */

class ControllerUser
{
    public function __construct($action)
    {
        global $notreUsegt;
        $notreUsegt=new ModeleUtilisateur();

        $dVueErreur = array ();

        try{


            switch($action) {
                case "connection":
                    $this->chercherFormulaireCo($dVueErreur);
                    break;
                case "verifCo":
                    $_SESSION['connecte']=1;

                       // require(config::$vue['connection']);
                        try {
                            $notreUsegt = $this->valideForm($notreUsegt);
                            $_SESSION['connecte'] = 1;
                            $_REQUEST['action']=null;

                        } catch (Exception $e) {
                            $_SESSION['connecte'] = 0;
                        }
                        if ($_SESSION['connecte'] == 0) {
                            require config::$vue['connection'];
                            echo " <div class='row'><div class='col-sm-4'></div>
                                <div class='col-sm-4'>Veuillez Reessayer votre connection</div>
                            <div class='col-sm-4'></div>";

                        } else {
                            $_SESSION['utilisateur'] = $notreUsegt;
                            require config::$vue['index'];

                        }
                   exit(0);
                case "supprimerListeTachesPrivee":

                    break;

                case "ajouterListeTachesPrivee":

                    break;

                case "supprimerTachePrivee":

                    break;

                case "ajouterTachePrivee":

                    break;

                case "afficherTachePrivee":

                    break;

                default:
                    $dVueErreur[] =	"Erreur d'appel php";
                    //require (config::$vue['mesTaches']);
                    break;
            }

        } catch (PDOException $e)
        {
            $dVueErreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);

        }
        catch (Exception $e2)
        {
            $dVueErreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }



        exit(0);
    }


    function afficherTachePrivee(array $dVueErreur) {

        $model = new ModeleListeTaches();
        $data=$model->getByProprio($_SESSION['nom']);

        $dVue = array (
            'liste' => $data
        );
        require (config::$vue['mesTaches']);
    }

    function ajouterListeTachesPrivee(array $dVueErreur) {
        $nom=$_POST['nomListe'];
        $description=$_POST['description'];

        $nom=Validation::nettoyerString($nom);
        $description=Validation::nettoyerString($description);

        $model = new ModeleListeTaches();

        $model->creerListeTache($nom,0,$_SESSION['nom'],$description);

        $this->afficherTachePrivee($dVueErreur);
    }

    function supprimerListeTachesPrivee(array $dVueEreur) {



        $model = new ModeleListeTaches();

        $model->supprimerTache($liste);

        $this->afficherTachePrivee($dVueEreur);
    }

    function ajouterTachePrivee(array $dVueErreur) {
        $nom=$_POST['nom'];
        $description=$_POST['description'];
        $date_debut=$_POST['date_debut'];
        $date_fin=$_POST['date_fin'];

        $nom=Validation::nettoyerString($nom);
        $description=Validation::nettoyerString($description);
        $date_debut=Validation::nettoyerString($date_debut);
        $date_fin=Validation::nettoyerString($date_fin);

        $model = new ModeleTache();

        $model->insererTache(999,$nom,$date_debut,$date_fin,$description);

        $this->afficherTachePrivee($dVueErreur);
    }

    function supprimerTachePrivee(array $dVueErreur) {

        $model = new ModeleTache();

        $model->supprimerTache($nom);

        $this->afficherTachePrivee($dVueErreur);
    }
    function valideForm(ModeleUtilisateur $notreUsegt)
    {
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

            $notreUsegt->findUser($nom, $mdp);


        return $notreUsegt;
    }
    function  chercherFormulaireCo($dVueEreur){


        require(config::$vue['connection']);

    }

}