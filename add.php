<?php
include 'pdo.php';

if (isset($_POST['val'])) {
	$nom = $_POST['nomperson'];
	$prenom = $_POST['prenomperson'];
	$poste = $_POST['posteperson'];
	$agence = $_POST['agenceperson'];
	$statut = $_POST['statutperson'];

	if (!empty($nom) AND !empty($prenom) AND !empty($poste) AND !empty($agence) AND !empty($statut)) {
                                $insertmbr = $conn->prepare("INSERT INTO personnel(nom,prenom,poste,statut,agence) VALUES (?,?,?,?,?)");
                                $insertmbr->execute(array($_POST['nomperson'], $_POST['prenomperson'], $_POST['posteperson'], $_POST['statutperson'], $_POST['agenceperson']));
            } else {
                echo "Erreur";
            }
}

if (isset($_POST['val2'])) {
	$id = $_POST['idperson'];
	$start = $_POST['startconge'];
	$end = $_POST['finconge'];

	if (!empty($id) AND !empty($start) AND !empty($end)) {
                                $insertmbr = $conn->prepare("INSERT INTO conge(idmembre,date_debut_conge,date_fin_conge) VALUES (?,?,?)");
                                $insertmbr->execute(array($_POST['idperson'], $_POST['startconge'], $_POST['finconge']));
            } else {
                echo "Erreur";
            }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Trecobat - Ajout de personnel et congés</title>
	<link rel="stylesheet" type="text/css" href="css/index.css" media="screen" />
	<link rel="shortcut icon" href="https://www.trecobat.fr/wp-content/themes/trecobat/favicon.ico" type="image/x-icon">
</head>
<body>
	<header class="menu">
		<div class="linkmenu">
			<span><a href="index.php">Accueil</a></span>
			<span><a href="personnel.php">Liste du personnel</a></span>
			<span><a href="conges.php">Liste des congés</a></span>
		</div>
	</header>
	<div class="listperson">

	<form method="POST">
		<div class="sepaaffiall">

		</div>
		<div class="affialltitre">
		<label class="labeladdun">Ajout d'un Membre</label>
		</div>

		<div class="affiall">
		<input class="graphtextbox" type="text" name="nomperson" placeholder="Nom:">
		</div>

		<div class="affiall">
		<input class="graphtextbox" type="text" name="prenomperson" placeholder="Prénom:">
		</div>

		<div class="affiall">
		<input class="graphtextbox" type="text" name="posteperson" placeholder="Poste:">
		</div>

		<div class="affiall">
		<input class="graphtextbox" type="text" name="agenceperson" placeholder="Agence:">
		</div>

		<div class="affiall">
		 <!-- <input class="graphtextbox" type="text" name="statutperson" placeholder="Statut:"> -->
			<select class="graphtextbox" name="statutperson">
				<option value ="" selected>Statut d'activité</option>
				<option value ="1">En congé</option>
				<option value ="2">Actif</option>
			</select>
		</div>

		<div class="affiall">
		<input class="graphtextbox" type="submit" name="val" value="Valider le membre" ">
		</div>

	<div class="sepaaffiall">

		</div>

		<div class="affialltitre">
		<label class="labeladdun">Ajout de Congés</label>
		</div>

		<div class="affiall">
		<input class="graphtextbox" type="text" name="idperson" placeholder="Id Membre:">
		</div>

		<div class="affiall">
		<input class="graphtextbox" type="text" name="startconge" placeholder="Début: (Exemple: 04/03/2019)">
		</div>

		<div class="affiall">
		<input class="graphtextbox" type="text" name="finconge" placeholder="Fin: (Exemple: 10/06/2019)">
		</div>

		
		<div class="affiall">
		<input class="graphtextbox" type="submit" name="val2" value="Valider le congé" ">
		</div>

		<div class="sepaaffiall">

		</div>
	</form>

	</div>
</body>
</html>