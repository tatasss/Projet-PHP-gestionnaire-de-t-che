<?php
use Connection;
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 02/12/2017
 * Time: 11:12
 */

class UtilisateurGateway
{
    public function __construct(Connection $con)
    {
        $this->con=$con;
    }

    public function findUser($nom, $mdp){
        $query='SELECT * FROM UTILISATEUR WHERE nom=:nom AND mdp=:mdp';
        $this->con->executeQuery($query, array(':nom' => array($nom, PDO::PARAM_STR),
        ':mdp' => array($mdp, PDO::PARAM_STR)));
        $results=$this->con->getResults();
        if($results==null) return null;
        return $this->getInstances($results);
    }

    private function getInstances(array $results){
        $retour;
        foreach ($results as $row) {
            $retour = new \dal\Utilisateur($row['nom'], $row['isAdmin']);
        }
        return $retour;
    }
}