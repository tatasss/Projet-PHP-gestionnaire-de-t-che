<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 08/12/2017
 * Time: 16:11
 */

class Validation
{
    public static function nettoyerString($string):string {
        return filter_var($string,FILTER_SANITIZE_STRING);

    }

    public static function nettoyerInt($int){
        return filter_var($int,FILTER_SANITIZE_NUMBER_INT);

    }



}