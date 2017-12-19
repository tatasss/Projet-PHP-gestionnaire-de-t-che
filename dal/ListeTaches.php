<?php

class ListeTaches
{
    private $id;
    private $nom_liste;
    private $is_public;
    private $proprietaire;
    private $description;

    function __construct($id,$nom_liste,$is_public, $proprietaire, $description)
    {
        $this->id=$id;
        $this->nom_liste=$nom_liste;
        $this->is_public=$is_public;
        $this->proprietaire=$proprietaire;
        $this->description=$description;
    }

    /**
     * @return mixed
     */
    public function getisPublic()
    {
        return $this->is_public;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getProprietaire()
    {
        return $this->proprietaire;
    }

    public function getNom(){
        return $this->nom_liste;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNomListe()
    {
        return $this->nom_liste;
    }

}