<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 15/12/2017
 * Time: 16:56
 */




class ModeleUtilisateur
{
    private $utilisateur_gateway;
    private $utilisateur ;
    public function __construct()
    {
        $con=new \Connection(\Config::$dsn,\Config::$login,\Config::$mdp);
        $this->utilisateur_gateway = new \UtilisateurGateway($con);

    }

    public function findUser($nom,$mdp){
        $this->utilisateur=$this->utilisateur_gateway->findUser($nom,$mdp);

        if ($this->utilisateur==null)
            throw new \Exception(" l'utilisateur inconu");
    }
    public function getNom(){
        return $this->utilisateur->getNom();

    }
}