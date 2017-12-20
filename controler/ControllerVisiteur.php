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
                    break;
                case "ajouterListeTache":
                    require(Config::$vue['ajoutListeTache']);
                    break;
                case "verifListe":
                    $this->valideFormListe(new ModeleListeTaches());
                    require (Config::$vue['index']);
                    break;
                case "ajouterTache":
                    require(Config::$vue['ajoutache']);
                    break;

                case "verifTache":
                    $this->ajouterTachePublic($dVueErreur);
                    break;
                case "SupprimerTache":
                    $this->suppTache(new ModeleTache());
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



    function ajouterTachePublic(array $dVueErreur) {
        $nom=$_POST['donNomTache'];
        $description=$_POST['donDescriptionTa'];
        $nomL=$_POST['maliste'];
        $modeleList=new ModeleListeTaches();
        $IdList=$modeleList->getID($nomL);
        $nom=Validation::nettoyerString($nom);
        $description=Validation::nettoyerString($description);
        $nomL=Validation::nettoyerString($nomL);
        $model = new ModeleTache();
        try {
            $model->insererTache(new Tache(1, $nom, null, null, $description, $IdList, 'public'));
        }catch (Exception $e){
            echo $e->getMessage();
        }
        require(Config::$vue['index']);
     //   $this->afficherTachePublic($dVueErreur);
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
    function suppTache(ModeleTache $modeTache){

        $Tache =$_POST['ok'];
        $Tache=Validation::nettoyerString($Tache);
        try {
            $modeTache->supprimerTache($Tache);
        }
        catch (Exception $e){
            $e->getMessage();
        }
        require(Config::$vue['index']);
    }
    /* ICI LES METHODES DE LA VUES*/
    /**
     * @param ModeleListeTaches $modeleList
     */
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
            print('<div class="row"><div class="col-sm-8">');
            print $row->getNomTache();
            $nom=$row->getNomTache();
            print("</div><div class='col-sm-2'></div><div class='col-sm-2'><form method='post' action='index.php?action=SupprimerTache'><button type='submit' id='$nom' name='ok' value='$nom' class='btn btn-danger'>Supprimer</button></form></div> </div>");
            /*print('</div><div class="col-sm-2"></div><div class="col-sm-2"><form method="post" action="index.php?action=SupprimerTache"><button type="submit" name="ok" value="<?= $row->getId()?>"class="btn btn-danger">Supprimer</button></form></div> </div>');*/
            print ('</div>');
            print('<div class="panel-body">');
            print $row->getDescriptionTache();
            print('</div>');
            print('</div>');
        }

    }
    static function selectListPu(){
        //$modeleList->creerListeTache('lol',1,'aa','ceci est fait par le front controller');
        $modeleList=new ModeleListeTaches();
        config::$tab=$modeleList->getListePublic();
        $i=0;
        //print("<form method='post' action='index.php' name='getliste' id='getliste'>");
        foreach (config::$tab as $row) {
            $i=$row->getId();
            print ("<option>" . $row->getNom() .
                "</option> ");

        }
        //print("</form>");


    }
}