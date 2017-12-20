<?php



/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 08/12/2017
 * Time: 16:50
 */

class ListeTachesGateway
{
    private $con;
    public function __construct(Connection $con)
    {
        $this->con=$con;
    }

    public function findByName($nom){
        $query='SELECT * FROM ListeTaches WHERE nom=:nom';
        $this->con->executeQuery($query, array(':nom' => array($nom, PDO::PARAM_INT)));
        $results=$this->con->getResults();
        return $this->getInstances($results);
    }

    public function findByProprio($proprietaire){
        $query='SELECT * FROM ListeTaches WHERE proprietaire=:proprietaire';
        $this->con->executeQuery($query, array(':proprietaire' => array($proprietaire, PDO::PARAM_INT)));
        $results=$this->con->getResults();
        return $this->getInstances($results);
    }

    private function getInstances(array $results){
        $retour=[];
        foreach ($results as $row) {

            $retour[] = new ListeTaches($row['id'], $row['nom_liste'],$row['is_public'],$row['proprietaire'],$row['description']);

        }
        return $retour;
    }
    private function getInstancesPU(array $results){
        $retour=[];
        foreach ($results as $row) {
            $retour[] = new ListeTaches($row['id'], $row['nom_liste'],$row['is_public'],'public',$row['description']);
        }
        return $retour;
    }
    public function insererListeTache(ListeTaches $liste){
        $this->con->executeQuery('INSERT INTO ListeTaches VALUES (:id,:nom,:is_public,NULL,:description)',
            array(':id'=>array($liste->getId(),PDO::PARAM_INT),
                ':nom'=>array($liste->getNomListe(),PDO::PARAM_STR),
                ':is_public'=>array($liste->getisPublic(),PDO::PARAM_INT),
                ':description'=>array($liste->getDescription(),PDO::PARAM_STR)));
    }
    public function getLastId() : int {
        try {
            $this->con->executeQuery('SELECT id FROM ListeTaches;', array());
            $results = $this->con->getResults();
            foreach ($results as $row)
                $id_list = $row[0];
            return $id_list;
        }catch (Exception $e){
            return 0;
        }
    }
    public function getFirstId($PROP):int{
        $this->con->executeQuery('SELECT id FROM ListeTaches WHERE proprietaire=:prop',array(':prop'=>array($PROP,PDO::PARAM_STR)));
        $results=$this->con->getResults();
        if($results==null)throw new Exception('pas de tache');
        foreach ($results as $row)
            return $row[0];

    }
    public function getFirstIdPu():int{
        $this->con->executeQuery('SELECT id FROM ListeTaches WHERE is_public=1',array());
        $results=$this->con->getResults();
        foreach ($results as $row)
            return $row[0];

    }
    public function  getId($nom):int{
            $this->con->executeQuery('SELECT id FROM ListeTaches WHERE nom_liste=:liste',array(':liste'=>array($nom,PDO::PARAM_STR)));
        $results=$this->con->getResults();
        foreach ($results as $row)
            $id_list = $row[0];
        return $id_list;
    }
    public function supprimerListeTache($liste){

        $idListe=$this->getId($liste);
        $this->con->executeQuery('DELETE FROM Tache WHERE id_liste = :id ',
            array(':id'=>array($idListe,PDO::PARAM_INT)));
        $this->con->executeQuery('DELETE FROM ListeTaches WHERE id=:id',
            array(':id'=>array($idListe,PDO::PARAM_INT)));
    }
    public function insererListeTachePrivee(ListeTaches $liste){
        $this->con->executeQuery('INSERT INTO ListeTaches VALUES (:id,:nom,:is_public,:proprietaire,:description)',
            array(':id'=>array($liste->getId(),PDO::PARAM_INT),
                ':nom'=>array($liste->getNomListe(),PDO::PARAM_STR),
                ':is_public'=>array($liste->getisPublic(),PDO::PARAM_INT),
                ':proprietaire'=>array($liste->getProprietaire(),PDO::PARAM_STR),
                ':description'=>array($liste->getDescription(),PDO::PARAM_STR)
            ));
    }
    public function tachesDeListe (ListeTaches $liste){
        $modele_tache=new ModeleTache($this->con);
        $tab=$modele_tache->tachesDeListe($liste);
        return $tab;
    }
    public function getListe($ispublic){
        $this->con->executeQuery('SELECT * FROM ListeTaches WHERE is_public= :ispublic ',
            array(':ispublic'=>array($ispublic,PDO::PARAM_INT)));
        $results=$this->con->getResults();
        return $this->getInstancesPU($results);

    }
    public function getListeId($id){
        $this->con->executeQuery('SELECT * FROM ListeTaches WHERE id= :id ',
            array(':id'=>array($id,PDO::PARAM_INT)));
        $results=$this->con->getResults();
        return $this->getInstancesPU($results);

    }
    /*public function getMaxIndex(){
        $this->con->executeQuery('SELECT MAX(id) FROM ListeTaches',
            array());
        $results=$this->con->getResults();
        $mavar=$this->getInstances($results);

            return $mavar['MAX(id)'];

    }*/

}