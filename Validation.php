<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 08/12/2017
 * Time: 16:11
 */

class Validation
{
    public static function validerString($string){
        filter_var($string,FILTER_SANITIZE_STRING);
        return $string;
    }

    public static function validerInt($int){
        filter_var($int,FILTER_SANITIZE_NUMBER_INT);
        filter_var($int,FILTER_VALIDATE_INT);
        return $int;
    }



}