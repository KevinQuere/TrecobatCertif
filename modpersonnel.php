<?php
include 'pdo.php';

if (isset($_GET['id']))
{
	$id = $_GET['id'];
	$idsearch = $conn->prepare('SELECT * FROM personnel WHERE id = ?');
           $idsearch->execute(array(
               $id
           ));
           $idexist = $idsearch->rowCount();
           if ($idexist == 1)
            {
               $idresult = $idsearch->fetch();

               $nom = $idresult['nom'];
               $prenom = $idresult['prenom'];
               $poste = $idresult['poste'];
               $statut = $idresult['statut'];
               $agence = $idresult['agence'];
           }
       }

if (isset($_POST['val'])) {
	$id = $_GET['id'];
	$idsearch = $conn->prepare('SELECT * FROM personnel WHERE id = ?');
           $idsearch->execute(array(
               $id
           ));
           $idexist = $idsearch->rowCount();
           if ($idexist == 1)
            {
	$nom = $_POST['nomperson'];
	$prenom = $_POST['prenomperson'];
	$poste = $_POST['posteperson'];
	$agence = $_POST['agenceperson'];
	$statut = $_POST['statutperson'];

 		$insertupdate = $conn->prepare('UPDATE personnel SET nom = ?, prenom = ?, poste = ?, statut = ?, agence = ?  WHERE id = ?');
        $insertupdate->execute(array($nom,$prenom,$poste,$statut,$agence,$id));
        header('Location: personnel.php');
    }
    else{
    	echo "Congé introuvable";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Trecobat - Modification de membres</title>
	<link rel="stylesheet" type="text/css" href="css/index.css" media="screen" />
	<link rel="shortcut icon" href="https://www.trecobat.fr/wp-content/themes/trecobat/favicon.ico" type="image/x-icon">

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

	<form method="POST">
		

	<div class="sepaaffiall">

		</div>

		<div class="affialltitre">
		<label class="labeladdun">Modification d'un membre du personnel</label>
		</div>

		<div class="affiall">
		<input class="graphtextbox" type="text" name="nomperson" placeholder="Nom:" <?php echo 'value="'.$nom.'"'; ?>>
		</div>

		<div class="affiall">
		<input class="graphtextbox" type="text" name="prenomperson" placeholder="Prénom:" <?php echo 'value="'.$prenom.'"'; ?>>
		</div>

		<div class="affiall">
		<input class="graphtextbox" type="text" name="posteperson" placeholder="Poste:" <?php echo 'value="'.$poste.'"'; ?>>
		</div>

		<div class="affiall">
		<input class="graphtextbox" type="text" name="agenceperson" placeholder="Agence:" <?php echo 'value="'.$agence.'"'; ?>>
		</div>

		<div class="affiall">
		<!-- <input class="graphtextbox" type="text" name="statutperson" placeholder="Statut:" <?php /*echo 'value="'.$statut.'"'; */?>>-->
				 <select class="graphtextbox" name="statutperson" <?php echo 'value="'.$statut.'"'; ?>>
				<option value ="" selected>Statut d'activité</option>
				<option value ="1">En congé</option>
				<option value ="2">Actif</option>
			</select>
		</div>

		<div class="affiall">
		<input class="graphtextbox" type="submit" name="val" value="Valider" ">
		</div>

		<div class="sepaaffiall">

		</div>
	</form>

	</div>
</body>
</html>