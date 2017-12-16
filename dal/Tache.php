<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 18/11/17
 * Time: 11:46
 *
 *
 *
 *
Couche d'accès aux données
    Pour une classe métier de votre projet (ex Tache ou News, ...), définir la classe Gateway correspondante (ex: TacheGateway pour Tache) et testez la:
       1 saisir, valider et filtrer les données d'une instance de la classe métier,
        stocker cette instance en BDD dans la table correspondante par la méthode d'insertion de la classe Gateway
        Contrôler sous PhpMyAdmin que les données ont été insérées.
        2 Inversement, rechercher une instance d'objet dans la table par une méthode de recherche de la classe Gateway
        afficher cette instance par la méthode d'affichage de la classe métier
    Continuez pour d'autres classes de votre projet


 */
class Tache
{
    private $id;
    private $nom_tache;
    private $date_debut;
    private $date_fin;
    private $description_tache;
    private $id_liste;
    private $proprietaire;

    function __construct($id,$nom_tache,$date_debut,$date_fin, $description_tache, $id_liste, $proprietaire)
    {
        $this->id=$id;
        $this->nom_tache=$nom_tache;
        $this->date_debut=$date_debut;
        $this->date_fin=$date_fin;
        $this->description_tache=$description_tache;
        $this->id_liste=$id_liste;
        $this->proprietaire=$proprietaire;
    }

    function toString(){
        echo $this->nom_tache ." : nom de la tache"."<br/>";
    }

    /**
     * @return mixed
     */
    public function getNomTache()
    {
        return $this->nom_tache;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->date_debut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->date_fin;
    }

    /**
     * @return mixed
     */
    public function getDescriptionTache()
    {
        return $this->description_tache;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function getListeId()
    {
        return $this->id_liste;
    }

    public function getProprietaire()
    {
        return $this->proprietaire;
    }
}
