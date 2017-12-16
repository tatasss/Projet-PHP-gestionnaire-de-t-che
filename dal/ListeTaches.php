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
    public function getNom(){
        return $this->nom_liste;
    }
}