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
<li class="active"><a href="indexconnecte.php">Accueil</a></li>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="indexconnecte.php">Tache Publique<span class="caret"></span></a>
  <ul class="dropdown-menu">
 <li><a href="AjouetrTachePu.php">Ajouter tache publique</a></li>
 <li><a href="SupprimerTachePu.php">Supprimer tache publique</a></li>
 
  </ul>
</li>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Liste de Taches Publiques<span class="caret"></span></a>
<ul class="dropdown-menu">
 <li><a href="AjouterListeTachePu.php">Creer une liste de taches publiques</a></li>
 <li><a href="SupprimerListeTachePu.php">Supprimer une liste de taches publiques</a></li>
 
  </ul>
</li>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="../indexconnecte.php">Tache Privée<span class="caret"></span></a>
  <ul class="dropdown-menu">
 <li><a href="AjouetrTachePr.php">Ajouter tache privée</a></li>
 <li><a href="SupprimerTachePr.php">Supprimer tache privée</a></li>
 
  </ul>
</li>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Liste de Taches Privée<span class="caret"></span></a>
<ul class="dropdown-menu">
 <li><a href="AjouterListeTachePr.php">Creer une liste de taches privées</a></li>
 <li><a href="SupprimerListeTachePr.php">Supprimer une liste de taches privées</a></li>
 
  </ul>
</li>
<!--<li><a href="#">Page 3</a></li>-->
 </ul>
<ul class="nav navbar-nav navbar-right">
<li ><a href="vue/connection.php" ><span class="glyphicon glyphicon-log-out"></span> Se deconnecter</a></li>
 	</ul>
  </div>
</nav>
  
<div class="container">
 <div class="row">
	<div class="col-sm-8">
	  	<h3>Tâche</h3>
  		<p>ICI IL Y AURA LES TACHES</p>
	</div>
	<div class="col-sm-4" >
	<div class="panel panel-default">
      		<div class="panel-heading">Liste de tâches</div>
      		<div class="panel-body">
		<div class="panel panel-default">
      			<div class="panel-heading">Tâche Publique</div>
      			<div class="panel-body">
				Ici la liste des tâches publiques
			</div>
    		</div>
		<div class="panel panel-default">
      			<div class="panel-heading">Tâche Privée</div>
      			<div class="panel-body">
				Ici la liste des tâches Privées
			</div>
    		</div>
		</div>
    	</div>
	</div>
</div> 

</div>

</body>
</html>
