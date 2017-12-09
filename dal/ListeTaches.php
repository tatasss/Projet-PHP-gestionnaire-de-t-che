<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 08/12/2017
 * Time: 16:09
 */

class ListeTaches
{
    private $id;
    private $nom_liste;
    private $tab_taches;

    function __construct($id,$nom_liste)
    {
        $this->id=$id;
        $this->nom_liste=$nom_liste;

    }
}