<?php
include 'pdo.php';

if (isset($_GET['id']))
{
	$idmember = htmlspecialchars($_GET['id']);
	$nbenrsup = $conn->exec ("DELETE FROM personnel WHERE id = $idmember" );
	header('Location: '.$_SERVER['HTTP_REFERER']);
}
else{
	echo "no";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Trecobat - Suppression d'un membre</title>
	<link rel="stylesheet" type="text/css" href="css/index.css" media="screen" />
</head>
<body>
	<header class="menu">
		<div class="linkmenu">
			<span><a href="index.php">Accueil</a></span>
			<span><a href="personnel.php">Liste du personnel</a></span>
			<span><a href="conges.php">Liste des congés</a></span>
			<span><a href="add.php">Faire un ajout</a></span>
		</div>
	</header>
	<div class="listperson">
		
	</div>
</body>
</html>