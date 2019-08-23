<?php
include 'pdo.php';

if (isset($_GET['id']))
{
	$id = $_GET['id'];
	$idsearch = $conn->prepare('SELECT * FROM conge WHERE id = ?');
           $idsearch->execute(array(
               $id
           ));
           $idexist = $idsearch->rowCount();
           if ($idexist == 1)
            {
               $idresult = $idsearch->fetch();

               $idmembre = $idresult['idmembre'];
               $date_debut_conge = $idresult['date_debut_conge'];
               $date_fin_conge = $idresult['date_fin_conge'];
           }
       }

if (isset($_POST['val'])) {
	$id = $_GET['id'];
	$idsearch = $conn->prepare('SELECT * FROM conge WHERE id = ?');
           $idsearch->execute(array(
               $id
           ));
           $idexist = $idsearch->rowCount();
           if ($idexist == 1)
            {
	$startconge = $_POST['startconge'];
	$finconge = $_POST['finconge'];
 		$insertupdate = $conn->prepare('UPDATE conge SET date_debut_conge = ?, date_fin_conge = ?  WHERE id = ?');
        $insertupdate->execute(array($startconge,$finconge,$id));
        header('Location: conges.php');
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
	<title>Trecobat - Modification de congés</title>
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

	<form method="POST">
		

	<div class="sepaaffiall">

		</div>

		<div class="affialltitre">
		<label class="labeladdun">Modification de congé</label>
		</div>

		<div class="affiall">
		<input class="graphtextbox" type="text" name="startconge" placeholder="Début: (Exemple: 04/03/2019)" <?php echo 'value="'.$date_debut_conge.'"'; ?>>
		</div>

		<div class="affiall">
		<input class="graphtextbox" type="text" name="finconge" placeholder="Fin: (Exemple: 10/06/2019)" <?php echo 'value="'.$date_fin_conge.'"'; ?>>
		</div>

		
		<div class="affiall">
		<input class="graphtextbox" type="submit" name="val" value="VALIDER LE CONGÉ" ">
		</div>

		<div class="sepaaffiall">

		</div>
	</form>

	</div>
</body>
</html>