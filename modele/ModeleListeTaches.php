<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 09/12/2017
 * Time: 10:59
 */






class ModeleListeTaches
{

    private $liste_gateway;

    public function __construct()
    {
        $con=new Connection(\Config::$dsn,\Config::$login,\Config::$mdp);
        $this->liste_gateway = new ListeTachesGateway($con);

    }

    public function insererTache(ListeTaches $liste){
        $this->liste_gateway->insererListeTache($liste);
    }

    public function supprimerTache(ListeTaches $liste){
        $this->liste_gateway->supprimerListeTache($liste);
    }

    public function tachesDeListe (ListeTaches $listeTaches){
        $tab=$this->liste_gateway->tachesDeListe($listeTaches);
        return $tab;
    }

    /**
     * @return ListeTachesGateway
     */
    public  function getByProprio($nomProp){
        $tab=$this->liste_gateway->findByProprio($nomProp);
        return $tab;
    }
    public function getListePublic()
    {
        return $this->liste_gateway->getListe(1);

    }
}
