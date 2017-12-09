<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 02/12/2017
 * Time: 11:12
 */

class Utilisateur
{
    private $nom;
    private $isAdmin;

    public function __construct($nom,$isAdmin)
    {
        $this->nom=$nom;
        $this->isAdmin=$isAdmin;
    }
}