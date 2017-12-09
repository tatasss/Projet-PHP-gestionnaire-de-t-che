<?php
namespace dal;
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

    public function getTachesDeListe($id){
        $query='SELECT * FROM TACHE WHERE id_liste=:id';
        $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INIT)));
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

    public function insererTache(Tache $laTache){
        $this->con->executeQuery('INSERT INTO Tache VALUES (:id,:nom,:date_debut,:date_fin,:description)',
      array(':id'=>array($laTache->getId(),PDO::PARAM_INT),
            ':nom'=>array($laTache->getNomTache(),PDO::PARAM_STR),
            ':date_debut'=>array($laTache->getDateDebut(),PDO::PARAM_STR),
            ':date_fin'=>array($laTache->getDateFin(),PDO::PARAM_STR),
            'description'=>array($laTache->getDescriptionTache(),PDO::PARAM_STR)));
    }

    public function modifierTache(Tache $laTache){
        $this->con->executeQuery('UPDATE Tache SET nom = :nom, date_debut =:date_debut, date_fin =:date_fin,description=:description,
            WHERE id = :id ',
            array(':id'=>array($laTache->getId(),PDO::PARAM_INT),
                ':nom'=>array($laTache->getNomTache(),PDO::PARAM_STR),
                ':date_debut'=>array($laTache->getDateDebut(),PDO::PARAM_STR),
                ':date_fin'=>array($laTache->getDateFin(),PDO::PARAM_STR),
                'description'=>array($laTache->getDescriptionTache(),PDO::PARAM_STR)));
    }

    public function supprimerTache ($nom){
        $this->con->executeQuery('DELETE FROM Tache WHERE nom = :nom',
            array(':nom'=>array($nom,PDO::PARAM_STR)));
    }

    private function creerTache (array $results){
        $retour=[];
        foreach ($results as $row){
            $retour[]=new Tache($row['id'],$row['nom_tache'],$row['date_debut'],$row['date_fin'],$row['description_tache']);
        }
    }
    public function rechercheLigne ($nom)
    {
        $query='SELECT * FROM Tache WHERE nomTache=:nom';
        $this->con->executeQuery($query,array(':nom'=>array($nom,PDO::PARAM_STR)));
        $results=$this->con->getResults();
        return $this->creerTache(array ($results));
    }

    public function afficherTable ()
    {
        $query = 'SELECT * FROM Tache';
        $this->con->executeQuery($query, array());
        return $this->con->getResults();
        
    }

}