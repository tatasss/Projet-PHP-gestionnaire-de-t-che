<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 02/12/2017
 * Time: 11:04
 */


class ModeleTache
{
    private $tache_gateway;

    private $tab;

    public function __construct()
    {
        $con=new \Connection(\Config::$dsn,\Config::$login,\Config::$mdp);
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