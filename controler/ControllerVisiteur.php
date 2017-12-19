<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 19/12/2017
 * Time: 09:24
 */

class ControllerVisiteur
{
    public function __construct($action)
    {
        session_start();

        $dVueErreur = array ();

        try{


            switch($action) {

                case "ajouterListeTachesPublic":
                    $this->ajouterListesTachePublic($dVueErreur);
                    break;

                case "ajouterTachePublic":
                    $this->ajouterTachePublic($dVueErreur);
                    break;

                case "afficherTachePublic":
                    $this->afficherTachePublic($dVueErreur);
                    break;

                default:
                    $dVueErreur[] =	"Erreur d'appel php";
                    require (config::$vue['mesTaches']);
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


    function afficherTachePublic(array $dVueErreur) {

        $model = new ModeleListeTaches();
        $data=$model->getListePublic();

        $dVue = array (
            'liste' => $data
        );
        require (config::$vue['mesTaches']);
    }

    function ajouterListesTachePublic(array $dVueErreur) {
        $nom=$_POST['nomListe'];
        $description=$_POST['description'];

        $nom=Validation::nettoyerString($nom);
        $description=Validation::nettoyerString($description);

        $model = new ModeleListeTaches();

        $model->creerListeTache($nom,0,$_SESSION['nom'],$description);

        $this->afficherTachePublic($dVueErreur);
    }


    function ajouterTachePublic(array $dVueErreur) {
        $nom=$_POST['nom'];
        $description=$_POST['description'];
        $date_debut=$_POST['date_debut'];
        $date_fin=$_POST['date_fin'];

        $nom=Validation::nettoyerString($nom);
        $description=Validation::nettoyerString($description);
        $date_debut=Validation::nettoyerString($date_debut);
        $date_fin=Validation::nettoyerString($date_fin);

        $model = new ModeleTache();

        $model->insererTache(,$nom,$date_debut,$date_fin,$description);

        $this->afficherTachePublic($dVueErreur);
    }

}