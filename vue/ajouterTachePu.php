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
      <li><a href="#">Accueil</a></li>
      <li class= "active"><a href="#"> truc</a></li><li class="dropdown"  ><a class="dropdown-toggle" data-toggle="dropdown" href="#">Tache Publique<span class="caret"></span></a>
        <ul class="dropdown-menu ">
          <li ><a href="#">Ajouter tache publique</a></li>
          <li><a href="#">Supprimer tache publique</a></li>
          
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Liste de Taches Publiques<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Creer une liste de taches publiques</a></li>
          <li><a href="#">Supprimer une liste de taches publiques</a></li>
          
        </ul>
      </li>
	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Tache Privée<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Ajouter tache privée</a></li>
          <li><a href="#">Supprimer tache privée</a></li>
          <li><a href="#">Modifiez tache privée</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Liste de Taches Privées<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Creer une liste de taches privées</a></li>
          <li><a href="#">Supprimer une liste de taches privées</a></li>
          <li><a href="#">Modifier une liste de taches privées</a></li>
        </ul>
      </li>
      <!--<li><a href="#">Page 3</a></li>-->
    </ul>
	<ul class="nav navbar-nav navbar-right">
	      <li><a href="#"><span class="glyphicon glyphicon-user"></span> S'inscrire</a></li>
	      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Se connecter</a></li>
 	</ul>
  </div>
</nav>
