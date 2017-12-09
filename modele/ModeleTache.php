<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 02/12/2017
 * Time: 11:04
 */

class ModeleTache
{
    private $tacheG;
    private $con;
    private $tab;

    public function __construct()
    {
        $con=new Connection("jbjbu","cnsld","dsknks");
        $tacheG = new TacheGateway($con);

    }

    public function insererTache(Tache $tache){
        $this->tacheG->insererTache($tache);
    }

    public function supprimerTache(Tache $tache){
        $this->tacheG->supprimerTache($tache);
    }

    public function modifierTache(Tache $tache){
        $this->tacheG->modifierTache($tache);
    }

    public function tachesDeListe (ListeTaches $listeTaches){
        $tab=$this->tacheG->getTachesDeListe($listeTaches);
        return $tab;
    }

}