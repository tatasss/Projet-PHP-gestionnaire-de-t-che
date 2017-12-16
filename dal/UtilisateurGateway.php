<?php

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

    /**
     * @param $nom
     * @param $mdp
     * @return \dal\Utilisateur|null
     */
    public function findUser($nom, $mdp){
        $query='SELECT * FROM Utilisateur WHERE nom=:nom AND mdp=:mdp';
        $this->con->executeQuery($query, array(':nom' => array($nom, PDO::PARAM_STR),
        ':mdp' => array($mdp, PDO::PARAM_STR)));
        $results=$this->con->getResults();
        //if($results==null) return null;
        return $this->getInstances($results);
    }

    private function getInstances(array $results):Utilisateur{

        $retour =null;

        foreach ($results as $row) {
            $retour = new Utilisateur($row['nom'], $row['role']);
        }

        return $retour;
    }
}