<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gestionnaire de site</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/monCss.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Gestionnaire de site</a>
        </div>
        <ul class="nav navbar-nav">

            <li ><a href="index.php?action=index">taches public</a></li>
            <li class="active"><a href="index.php?action=privee">mes taches</a></li>
            <!--<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="index.php">Tache Publique<span class="caret"></span></a>
              <ul class="dropdown-menu">
             <li><a href="vue/AjouetrTachePu.php">Ajouter tache publique</a></li>
             <li><a href="vue/SupprimerTachePu.php">Supprimer tache publique</a></li>

              </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Liste de Taches Publiques<span class="caret"></span></a>
            <ul class="dropdown-menu">
             <li><a href="vue/AjouterListeTachePu.php">Creer une liste de taches publiques</a></li>
             <li><a href="vue/SupprimerListeTachePu.php">Supprimer une liste de taches publiques</a></li>

              </ul>
            </li>

            <li><a href="#">Page 3</a></li>-->
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <!--<li><a href="vue/inscription.php"><span class="glyphicon glyphicon-user"></span> S'inscrire</a></li>-->
            <?php if($_SESSION['connecte']==0)print("<li><a href=\"index.php?action=connection\" ><span class=\"glyphicon glyphicon-log-in\"></span> Se connecter</a></li>");?>
            <?php if($_SESSION['connecte']==1)print("<li><a href=\"index.php?action=deconnection\" ><span class=\"glyphicon glyphicon-log-out\"></span> Se deconnecter</a></li>");?>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-8"><h3>Tâche</h3></div>
                <div class="col-sm-4">
                    <h3> <form method="post" action="index.php?action=ajouterTachePrivee"><button type="submit" name="ok" value="ok" class="btn btn-success">ajouter</button></form></h3>

                </div>
            </div>
            <?php ControllerUser::getValue(new ModeleTache())?>
        </div>
        <div class="col-sm-4" >
            <div class="panel panel-default">
                <div class="panel-heading"><div class="row">
                        <div class="col-sm-8"> Liste de tâches  </div>
                        <div class="col-sm-4"> <form method="post" name="formAjoutListe" action="index.php?action=ajouterListeTachePrivee"> <button type="submit" name="ok" value="ok" class="btn btn-success">ajouter</button></form></div></div>
                </div>
                <div class="panel-body">
                    <ul>

                        <?php ControllerUser::affichlistePr(new ModeleListeTaches())?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>

