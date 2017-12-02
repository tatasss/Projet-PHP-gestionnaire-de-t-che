<?php
/**
 * Created by PhpStorm.
 * User: argiraud
 * Date: 25/11/17
 * Time: 10:17
 */
    require("connection.php");
    require("Tache.php");
    require("TacheGateway.php");

        $dsn = "mysql:host=hina;dbname=dbargiraud";
    $con= new Connection($dsn,'argiraud', 'argiraud');
    $date="2017-02-07";
    //$date_format=$date->format("y-m-d H:i:s");
   // $date=DateTime::createFromFormat('d/m/y',);
    //$con->executeQuery('insert into Tache VALUES (2,"manger",:date,null,"manger des pates")',array('date'=>array($date,PDO::PARAM_STR)));
    $con->executeQuery('SELECT * from Tache',array());
    $results=$con->getResults();
    foreach($results as $row)
        echo $row['idTache']."<br/>";
    $tache=new Tache(3,"aa","2017-08-09",null,"aaaaaaaaaaa");
    $g=new TacheGateway($con);
    $con->executeQuery('DELETE FROM Tache where idTache=3',array());
    $g->insertValue($tache);
    $g->rechercheTache("aa");
