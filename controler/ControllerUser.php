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
        $_SESSION['nom'] = $notreUsegt->getNom();
        require config::$vue['index'];

        }
        Config::$connecte=$_SESSION['connecte'];
    break;

    case "privee":
    $this->getIndex();
    //require (Config::$vue['mesTaches']);
    break;
    case "ajouterListeTachePrivee":
    require(Config::$vue['ajouterListeTachePrivee']);
    break;
    case "verifListePrivee":echo "5";
    echo $_SESSION['connecte'];
    echo "5";
    $this->valideFormListePrivee(new ModeleListeTaches());
    require (Config::$vue['mesTaches']);
    break;
    case "ajouterTachePrivee":
    require(Config::$vue['ajouterTachePrivee']);
    break;

    case "verifTachePrivee":
    $this->ajouterTachePrivee($dVueErreur);
    break;
    case "SupprimerTachePrivee":
    $this->suppTachePrivee(new ModeleTache());
    break;
    case "SupprimerListePrivee":
    $this->suppListePrivee(new ModeleListeTaches());
    break;
    default:
    $dVueErreur[] =	"Erreur d'appel php";
    require (config::$vue['mesTaches']);
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



    //exit(0);
    }




    function getIndex(){
    require (config::$vue['mesTaches']);
    }



    function ajouterTachePrivee(array $dVueErreur) {
    $nom=$_POST['donNomTache'];
    $description=$_POST['donDescriptionTa'];
    $nomL=$_POST['maliste'];
    $modeleList=new ModeleListeTaches();
    $IdList=$modeleList->getID($nomL);
    $nom=Validation::nettoyerString($nom);
    $description=Validation::nettoyerString($description);
    $nomL=Validation::nettoyerString($nomL);
    $model = new ModeleTache();
    //$proprio=$_SESSION['utilisateur']->getNom();
    //$proprio=Validation::nettoyerString($proprio);
    try {
    $model->insererTachePrivee(new Tache(1, $nom, null, null, $description, $IdList, 'lampda'));
    }catch (Exception $e){
        require(Config::$vue['mesTaches']);
        print("pas de liste selectionné");
    }
    require(Config::$vue['mesTaches']);
    //   $this->afficherTachePublic($dVueErreur);
    }
    function valideFormListePrivee(ModeleListeTaches $modelist)
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

    );*/
    //$proprio=$_SESSION['utilisateur']->getNom();


    //$proprio=Validation::nettoyerString($proprio);
    try {
    $modelist->creerListeTachePrivee($nom, 0, 'lampda', $des);
    }catch (Exception $e){echo $e->getMessage();}
    //echo $nom."<br>".$des;
    //require(Config::$vue['index']);



    }

    /* ICI LES METHODES DE LA VUES*/
    /**
    * @param ModeleListeTaches $modeleList
    */
    static function affichlistePr(ModeleListeTaches $modeleList){
    //$modeleList->creerListeTache('lol',1,'aa','ceci est fait par le front controller');
    //$proprio=$_SESSION['utilisateur']->getNom();
    // $proprio=Validation::nettoyerString($proprio);
    config::$tab=$modeleList->getByProprio('lampda');
    $i=0;
    /*print("<form method='post' action='index.php?action=privee' name='getliste' id='getliste'>");
        foreach (config::$tab as $row) {
        $i=$row->getId();
        print ("<button type='checkbox'id='$i' name='idList' value='$i' class=\"btn btn-primary btn-block\">" . $row->getNom() .
        "</button> ");

        }*/
        print("</form>");
    foreach (config::$tab as $row) {
    $i=$row->getId();
    $nom=$row->getNom();
    print("<div class='col-sm-8'>");
        print("<form method='post' action='index.php?action=privee' name='getliste' id='getliste'>");
            print ("<button type='submit' id='$i' name='idList' value='$i' class=\"btn btn-primary btn-block\">" . $row->getNom() .
            "</button> ");
            print("</form>");
        print("</div>");
    print("<div class='col-sm-4'>");
        print("<form method='post' action='index.php?action=SupprimerListePrivee'>");
            print("<button type='submit' id='$nom' name='ok' value='$nom' class='btn btn-danger'>supprimer</button></form> </div>");
    }


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
                    print("</div><div class='col-sm-2'></div><div class='col-sm-2'><form method='post' action='index.php?action=SupprimerTachePrivee'><button type='submit' id='$nom' name='ok' value='$nom' class='btn btn-danger'>Supprimer</button></form></div> </div>");
            /*print('</div><div class="col-sm-2"></div><div class="col-sm-2"><form method="post" action="index.php?action=SupprimerTache"><button type="submit" name="ok" value="<?= $row->getId()?>"class="btn btn-danger">Supprimer</button></form></div> </div>');*/
    print ('</div>');
print('<div class="panel-body">');
    print $row->getDescriptionTache();
    print('</div>');
print('</div>');
}

}
static function selectListPr(){
//$modeleList->creerListeTache('lol',1,'aa','ceci est fait par le front controller');
$modeleList=new ModeleListeTaches();
//$proprio=$_SESSION['utilisateur']->getNom();
// $proprio=Validation::nettoyerString($proprio);
config::$tab=$modeleList->getByProprio('lampda');
$i=0;
//print("<form method='post' action='index.php' name='getliste' id='getliste'>");
    foreach (config::$tab as $row) {
    $i=$row->getId();
    print ("<option>" . $row->getNom() .
        "</option> ");

    }
    //print("</form>");


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
    $_SESSION['connecte'] = 1;
    echo $_SESSION['connecte'];

return $notreUsegt;
}
function  chercherFormulaireCo($dVueEreur){


require(config::$vue['connection']);

}


function suppTachePrivee(ModeleTache $modeTache){

$Tache =$_POST['ok'];
$Tache=Validation::nettoyerString($Tache);
try {
$modeTache->supprimerTache($Tache);
}
catch (Exception $e){
$e->getMessage();
}
require(Config::$vue['privee']);
}
function suppListePrivee(ModeleListeTaches $modeList){
$liste =$_POST['ok'];
$liste=Validation::nettoyerString($liste);
try{
$modeList->supprimerListe($liste);
require (Config::vue['privee']);
}
catch(Exception $e){
echo $e->getMessage();
}

}








}