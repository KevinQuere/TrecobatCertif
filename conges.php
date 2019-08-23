<?php
include 'pdo.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Trecobat - Liste des congés</title>
	<link rel="stylesheet" type="text/css" href="css/index.css" media="screen" />
	<link rel="shortcut icon" href="https://www.trecobat.fr/wp-content/themes/trecobat/favicon.ico" type="image/x-icon">

</head>
<body>
	<header class="menu">
		<div class="linkmenu">
			<span><a href="index.php">Accueil</a></span>
			<span><a href="personnel.php">Liste du personnel</a></span>
			<span><a href="add.php">Faire un ajout</a></span>
		</div>
	</header>

	<div class="listperson">
		<?php
		$result = $conn->query('SELECT * FROM conge ORDER BY idmembre ASC');
      while($a = $result->fetch()) 
      { 
      	$idsearch = $conn->prepare('SELECT * FROM personnel WHERE id = ?');
           $idsearch->execute(array(
               $a['idmembre']
           ));
           $idexist = $idsearch->rowCount();
           if ($idexist == 1)
            {
               $idresult = $idsearch->fetch();
               $nom = $idresult['nom'];
               $prenom = $idresult['prenom'];
      	echo "<div class=\"affiall\">";
		echo "<label class=\"affialllab\">
			Nom : ".$nom." <br> ".
			"Prénom : ".$prenom." <br> ".
			"Date de début de congé : ".$a['date_debut_conge']." <br> ".
			"Date de fin de congé : ".$a['date_fin_conge']." <br> 
			<a href=\"modconges.php?id=".$a['id']."\">Modifier le congé</a> / <a href=\"delconge.php?id=".$a['id']."\">Supprimer le congé</a></label>";
		echo "</div>";
     }
 }
		?>
	</div>

</body>
</html>