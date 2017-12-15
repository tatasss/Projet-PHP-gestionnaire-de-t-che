<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 09/12/2017
 * Time: 10:59
 */
namespace modele;

use dal\ListeTachesGateway;

require_once '../dal/ListeTachesGateway.php';
require_once '../dal/connection.php';

class ModeleListeTaches
{

    private $liste_gateway;

    public function __construct()
    {
        $con=new \Connection("jbjbu","cnsld","dsknks");
        $this->tache_gateway = new ListeTachesGateway($con);

    }

    public function insererTache(ListeTaches $liste){
        $this->liste_gateway->insererListeTache($liste);
    }

    public function supprimerTache(ListeTaches $liste){
        $this->liste_gateway->supprimerListeTaches($liste);
    }

    public function tachesDeListe (ListeTaches $listeTaches){
        $tab=$this->liste_gateway->tachesDeListe($listeTaches);
        return $tab;
    }

}