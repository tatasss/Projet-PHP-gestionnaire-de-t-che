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

    public function getTachesDeListe($id){
        $query='SELECT * FROM Tache WHERE id_liste=:id';
        $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));
        $results=$this->con->getResults();
        return $this->getInstances($results);
    }

    private function getInstances(array $results){
        $retour=[];
        foreach ($results as $row) {
            if($row['proprietaire']==null){$row['proprietaire']='public';}
            $retour[] = new Tache($row['id'],$row['nom_tache'],$row['date_debut'],$row['date_fin'],$row['description_tache'],$row['id_liste'],$row['proprietaire']);
        }
        return $retour;
    }
    public function getLastId() : int {
        $this->con->executeQuery('SELECT MAX(id) FROM Tache;',array());
        $results=$this->con->getResults();
        foreach ($results as $row)
            $id = $row[0];
        return $id;
    }
    public function insererTache(Tache $laTache,$id){
        $this->con->executeQuery('INSERT INTO Tache(id,nom_tache,date_debut,date_fin,description_tache,id_liste) VALUES (:id,:nom,:date_debut,:date_fin,:description,:idListe)',
      array(':id'=>array($id,PDO::PARAM_INT),
            ':nom'=>array($laTache->getNomTache(),PDO::PARAM_STR),
            ':date_debut'=>array($laTache->getDateDebut(),PDO::PARAM_STR),
            ':date_fin'=>array($laTache->getDateFin(),PDO::PARAM_STR),
            'description'=>array($laTache->getDescriptionTache(),PDO::PARAM_STR),
            'idListe'=>array($laTache->getListeId(),PDO::PARAM_INT)));
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
        $this->con->executeQuery('DELETE FROM Tache WHERE nom_tache = :nom',
            array(':nom'=>array($nom,PDO::PARAM_STR)));
        echo $nom;
    }

    private function creerTache (array $results):Tache{

        foreach ($results as $row){
            $retour=new Tache($row['id'],$row['nom_tache'],$row['date_debut'],$row['date_fin'],$row['description_tache'],$row['id_liste'],$row['proprietaire']);
        }
        return $retour;
    }
    public function rechercheLigne ($nom) :Tache
    {
        $query='SELECT * FROM Tache WHERE nomTache=:nom';
        $this->con->executeQuery($query,array(':nom'=>array($nom,PDO::PARAM_STR)));
        $results=$this->con->getResults();
        return $this->creerTache($results);
    }

    public function afficherTable ()
    {
        $query = 'SELECT * FROM Tache';
        $this->con->executeQuery($query, array());
        return $this->con->getResults();
        
    }
   /* public function getTacheByBName($nom){
        $this->con->executeQuery('SELECT * Fro')
    }*/

}