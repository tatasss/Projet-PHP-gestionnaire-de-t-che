<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 08/12/2017
 * Time: 16:50
 */

class ListeTachesGateway
{

    public function __construct(Connection $con)
    {
        $this->con=$con;
    }

    public function findByName($nom){
        $query='SELECT * FROM LISTETACHES WHERE nom=:nom';
        $this->con->executeQuery($query, array(':nom' => array($nom, PDO::PARAM_INIT)));
        $results=$this->con->getResults();
        return $this->getInstances($results);
    }

    private function getInstances(array $results){
        $retour=[];
        foreach ($results as $row) {
            $retour[] = new ListeTaches($row['id'], $row['nom']);
        }
        return $retour;
    }

    public function insererListeTache(ListeTaches $liste){
        $this->con->executeQuery('INSERT INTO LISTETACHES VALUES (:id,:nom)',
            array(':id'=>array($liste->getId(),PDO::PARAM_INIT),
                ':nom'=>array($liste->getNomListe(),PDO::PARAM_STR)));
    }

    public function supprimerListeTache(ListeTaches $liste){
        $this->con->executeQuery('DELETE FROM Tache WHERE id = :id ',
            array(':id'=>array($liste->getId(),PDO::PARAM_INIT)));
    }

    public function tachesDeListe (ListeTaches $liste){

    }
}