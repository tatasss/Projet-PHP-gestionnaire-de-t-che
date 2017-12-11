<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 02/12/2017
 * Time: 11:12
 */
namespace modele;
require_once '../dal/connection.php';
require_once '../dal/UtilisateurGateway.php';

class ModeleUtilisateur
{
    private $utilisateur_gateway;
    private $con;
    public function __construct()
    {
        $this->con=new Connection("bsux","","");
        $this->utilisateur_gateway=new UtilisateurGateway($con);
    }

    public function findUser($nom,$mdp){
        $tab=$this->utilisateur_gateway->findUser();
        return $tab;
    }
}