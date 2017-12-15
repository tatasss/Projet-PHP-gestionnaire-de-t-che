<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 15/12/2017
 * Time: 16:56
 */

namespace modele;


class ModeleUtilisateur
{
    private $utilisateur_gateway;
    private $utilisateur;
    public function __construct()
    {
        $con=new \Connection("jbjbu","cnsld","dsknks");
        $this->utilisateur_gateway = new \UtilisateurGateway($con);

    }

    public function findUser($nom,$mdp){
        $this->utilisateur=$this->utilisateur_gateway->findUser($nom,$mdp);
    }
}