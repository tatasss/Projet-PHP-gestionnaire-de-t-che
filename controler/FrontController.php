<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 02/12/2017
 * Time: 10:59
 */
//require ("validation.php");
class FrontController
{
	
    public function __construct()
    {
        
    }
	function Connection($login,$mdp) {
		isset($con) ? $conn = $con : $conn = nullisset;
			$login=Validation::validerString($login);
			$mdp=Validation::validerString($mdp);
			$con=new Connection("config/config.php");
	}
}