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


        $dVueErreur = array ();

        try{


            switch($action) {
                case "index":
                    $this->getIndex();
                    breack;
                case "ajouterListeTache":
                    require(Config::$vue['ajoutache']);
                    break;
                case "verifListe":
                    $this->valideFormListe(new ModeleListeTaches());
                    require (Config::$vue['index']);
                    break;
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
                    require (config::$vue['index']);
                    break;
            }

        } catch (PDOException $e)
        {
            $dVueErreur[] =	"Erreur inattendue!!! ";
            //require ($rep.$vues['erreur']);

        }
        catch (Exception $e2)
        {
            $dVueErreur[] =	"Erreur inattendue!!! ";
            //require ($rep.$vues['erreur']);
        }



        exit(0);
    }
    function getIndex(){
        require (config::$vue['index']);
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

        $model->insererTache(config::$id_list+1,$nom,$date_debut,$date_fin,$description);

        $this->afficherTachePublic($dVueErreur);
    }
    function valideFormListe(ModeleListeTaches $modelist)
    {
        $nom=$_POST['donNomListe'];
        //echo $_POST['donNomListe'];
        $des=$_POST['donDescription'];
        //echo $_POST['donDescription'];
        $nom=Validation::nettoyerString($nom);
        $des=Validation::nettoyerString($des);

        /*$dvue=array(
            'nom'=>$nom,
            'mdp'=>$mdp,
        );*/try {
        $modelist->creerListeTache($nom, 1, 'public', $des);
    }catch (Exception $e){echo $e->getMessage();}
            //echo $nom."<br>".$des;
            //require(Config::$vue['index']);



    }
    static function affichlistePu(ModeleListeTaches $modeleList){
        //$modeleList->creerListeTache('lol',1,'aa','ceci est fait par le front controller');
        config::$tab=$modeleList->getListePublic();
        $i=0;
        print("<form method='post' action='index.php' name='getliste' id='getliste'>");
        foreach (config::$tab as $row) {
            $i=$row->getId();
            print ("<button type='checkbox'id='$i' name='idList' value='$i' class=\"btn btn-primary btn-block\">" . $row->getNom() .
                "</button> ");

        }
        print("</form>");


    }
    static function getValue(ModeleTache $modeTache){


        if(isset($_POST['idList']))$mavar=$_POST['idList'];
        else $mavar=1;
        // (int) $liste=$modeleList->getListeById($_POST['idList']);
        // foreach ($liste as $row) {
        $tab = $modeTache->tachesDeListe($mavar);
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