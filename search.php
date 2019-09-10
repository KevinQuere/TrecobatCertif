<?php
include 'pdo.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Trecobat - Search</title>
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
<?php
	$q = htmlspecialchars($_GET["q"]);
    $result = $conn->query('SELECT * FROM personnel WHERE nom LIKE "%'.$q.'%" OR prenom LIKE "%'.$q.'%" OR poste LIKE "%'.$q.'%" OR agence LIKE "%'.$q.'%" ORDER BY id ASC');
    while($a = $result->fetch()) 
      { 
		$result2 = $conn->query('SELECT * FROM conge ORDER BY id ASC');
		while($b = $result2->fetch()) 
		{ 
			if (stripos($a['id'], $b['idmembre']) !== FALSE) {
  
		  $daystart = new DateTime($b['date_debut_conge']);
		  $dayend = new DateTime($b['date_fin_conge']);
  
			if ($date_aujourdhui->format('d-m-Y') >= $daystart->format('d-m-Y') AND $date_aujourdhui->format('d-m-Y') <= $dayend->format('d-m-Y')) {
				$infostatut = "Congés: oui";
			}
			else{
				$infostatut = "Congés: non";
			}
  
			}
			else{
				$infostatut = "Congés: non";
			}
  
		   }
		
		/*$stat = $a['statut'];

      	if (stripos($stat, '0') !== FALSE) {
      		$infostatut = "Congés: non";
      	}else{
			$infostatut = "Congés: oui";
		  }
		  */
      	echo "<div class=\"affiall\">";
		echo "<label class=\"affialllab\">
		Id: ".$a['id']." <br> ".
		"Nom: ".$a['nom']." <br> ".
		"Prénom: ".$a['prenom']." <br> ".
		"Poste: ".$a['poste']." <br> ".
		"Agence: ".$a['agence']." <br> 
		".$infostatut." <br> 
		<a href=\"modpersonnel.php?id=".$a['id']."\">Modifier le membre</a> / <a href=\"delmember.php?id=".$a['id']."\">Supprimer le membre</a></label>";
		echo "</div>";
      }
        ?>