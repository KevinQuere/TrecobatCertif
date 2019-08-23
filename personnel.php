<?php
include 'pdo.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Trecobat - Liste du personnel</title>
	<link rel="stylesheet" type="text/css" href="css/index.css" media="screen" />
	<link rel="shortcut icon" href="https://www.trecobat.fr/wp-content/themes/trecobat/favicon.ico" type="image/x-icon">

</head>
<body>
	<header class="menu">
		<div class="linkmenu">
			<span><a href="index.php">Accueil</a></span>
			<span><a href="conges.php">Liste des congés</a></span>
			<span><a href="add.php">Faire un ajout</a></span>
		</div>
	</header>

	<div class="listperson">
		<?php
		$result = $conn->query('SELECT * FROM personnel ORDER BY id ASC');
      while($a = $result->fetch()) 
      { 
      	$stat = $a['statut'];

      	if (stripos($stat, '1') !== FALSE) {
      		$infostatut = "Congés: oui";
      	}else{
			$infostatut = "Congés: non";
      	}

      	echo "<div class=\"affiall\">";
		echo "<label class=\"affialllab\">
			Id: ".$a['id']." <br> ".
			"Nom: ".$a['nom']." <br> ".
			"Prénom: ".$a['prenom']." <br> ".
			"Poste: ".$a['poste']." <br> ".
			"Agence: ".$a['agence']." <br> 
			".$infostatut." <br> 
			<a href=\"modpersonnel.php?id=".$a['id']."\">Modifier le membre</a> / <a href=\"delmember.php?id=".$a['id']."\">Supprimer le membre</a>
			</label>";
		echo "</div>";
     }
		?>
	</div>

</body>
</html>