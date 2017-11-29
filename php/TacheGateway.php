<?php

/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 25/11/17
 * Time: 10:54
 */
    //require("connection.php");
    //require("Tache.php");
class TacheGateway
{
    private $con;
    public function __construct(Connection $con)
    {
       $this->con=$con;
    }
    public function insertValue(Tache $latache){
        $this->con->executeQuery('insert into Tache VALUES (:id,:nom,:date_debut,:date_fin,:description)',
      array(':id'=>array($latache->getId(),PDO::PARAM_INT),
            ':nom'=>array($latache->getNomTache(),PDO::PARAM_STR),
            ':date_debut'=>array($latache->getDateDebut(),PDO::PARAM_STR),
            ':date_fin'=>array($latache->getDateFin(),PDO::PARAM_STR),
            'description'=>array($latache->getDescriptionTache(),PDO::PARAM_STR)));

    }
    public function getInsatances(array $results){
        $retour=[];
        foreach ($results as $row){
            $retour[]=new Tache($row['id'],$row['nom_tache'],$row['date_debut'],$row['date_fin'],$row['description_tache']);
        }
    }
    public function rechercheTache (str $nom)
    {
        $query='SELECT * FROM Tache WHERE nomTache=:nom';
        $this->con->executeQuery($query,array(':nom'=>array($nom,PDO::PARAM_STR)));
        $results=$this->con->getResults();
        return $this->getInstances(array ($results));
    }

}