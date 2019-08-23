<?php
include 'pdo.php';
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Trecobat - Gestion du personnel</title>
	<link rel="stylesheet" type="text/css" href="css/index.css" media="screen" />
	<link rel="shortcut icon" href="https://www.trecobat.fr/wp-content/themes/trecobat/favicon.ico" type="image/x-icon">
</head>

<body>

	<header class="menu">
		<div class="linkmenu">
			<span><a href="personnel.php">Liste du personnel</a></span>
			<span><a href="conges.php">Liste des congés</a></span>
			<span><a href="add.php">Faire un ajout</a></span>
		</div>
	</header>

	<div class="container">
		<div class="logo"></div> <!-- Div qui sert pour afficher l'image en mode "protect" -->
		<div class="textbox">
			<form method="GET" action="search.php">
				<input type="text" name="q" placeholder="Rechercher..." autocomplete="off">
			</form>
		</div>
	</div>

	<div class="textbox2">
		Bienvenue sur l'outil de gestion de personnel du groupe Trecobat.<br>
		Effectuez une recherche par membre du personnel ou par congé, 
		ou utilisez la barre de navigation pour parcourir la base de données.<br>
	</div>

	<footer>
		<span>[CODE.BZH] - [Outil de gestion de personnel Trecobat] - [Kévin Quéré 2019]</span>
	</footer>
</body>
</html>