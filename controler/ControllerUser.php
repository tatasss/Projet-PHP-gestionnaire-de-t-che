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
        session_start();

        $dVueErreur = array ();

        try{


            switch($action) {

                case "supprimerListeTachesPrivee":
                    $this->supprimerListeTachesPrivee($dVueErreur);
                    break;

                case "ajouterListeTachesPrivee":
                    $this->ajouterListeTachesPrivee($dVueErreur);
                    break;

                case "supprimerTachePrivee":
                    $this->supprimerTachePrivee($dVueErreur);
                    break;

                case "ajouterTachePrivee":
                    $this->ajouterTachePrivee($dVueErreur);
                    break;

                case "afficherTachePrivee":
                    $this->afficherTachePrivee($dVueErreur);
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

        $model->insererTache(,$nom,$date_debut,$date_fin,$description);

        $this->afficherTachePrivee($dVueErreur);
    }

    function supprimerTachePrivee(array $dVueErreur) {

        $model = new ModeleTache();

        $model->supprimerTache($nom);

        $this->afficherTachePrivee($dVueErreur);
    }

}