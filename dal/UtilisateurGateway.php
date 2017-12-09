<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 02/12/2017
 * Time: 11:12
 */

class UtilisateurGateway
{
    public function __construct($con)
    {
        $this->con=$con;
    }

    public function findByName($nom, $mdp){
        $query='SELECT * FROM UTILISATEUR WHERE nom=:nom AND mdp=:mdp';
        $this->con->executeQuery($query, array(':nom' => array($nom, PDO::PARAM_INIT),
        ':mdp' => array($mdp, PDO::PARAM_INIT)));
        $results=$this->con->getResults();
        return $this->getInstances($results);
    }

    private function getInstances(array $results){
        $retour=[];
        foreach ($results as $row) {
            $retour[] = new Utilisateur($row['nom'], $row['isAdmin']);
        }
        return $retour;
    }
}