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
			$login=Validation->ValiderString($login);
			$mdp=Validation->ValiderString($mdp);
			
	}
}