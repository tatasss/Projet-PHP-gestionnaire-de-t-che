<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 02/12/2017
 * Time: 11:04
 */
namespace modele;
require_once '../dal/connection.php';
require_once '../dal/TacheGateway.php';

class ModeleTache
{
    private $tache_gateway;
    private $con;
    private $tab;

    public function __construct()
    {
        $con=new Connection("jbjbu","cnsld","dsknks");
        $this->tache_gateway = new TacheGateway($con);

    }

    public function insererTache(Tache $tache){
        $this->tache_gateway->insererTache($tache);
    }

    public function supprimerTache(Tache $tache){
        $this->tache_gateway->supprimerTache($tache);
    }

    public function modifierTache(Tache $tache){
        $this->tache_gateway->modifierTache($tache);
    }

    public function tachesDeListe (ListeTaches $listeTaches){
        $tab=$this->tache_gateway->getTachesDeListe($listeTaches);
        return $tab;
    }

}