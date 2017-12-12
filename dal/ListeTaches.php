<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 08/12/2017
 * Time: 16:09
 */
namespace dal;
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
}