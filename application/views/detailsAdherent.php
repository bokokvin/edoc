<?php
$titre = "Détails adhérent";
include('head.php');
include('navAdmin.php');
?>

<div class="container">
	<div class="w3-card-2">
		<header class="w3-container w3-red">
			<h2 style="text-align: center">Détails adhérent</h2>
		</header>
		<div class="w3-container">
			<form><br />
				<input type="text" id="nom" name="nom" class="form-control" value="Nom: <?php echo strtoupper($user['NOM']); ?>" readonly>
				<input type="text" id="prenom" name="prenom" class="form-control" value="Prénom: <?php echo strtoupper($user['PRENOM']); ?>" readonly>
				<input type="email" id="email" name="email" class="form-control" value="Email: <?php echo $user['EMAIL']; ?>" readonly>
				<input type="text" id="tel" name="tel" class="form-control" value="Téléphone: <?php echo '0'.$user['TEL']; ?>" readonly>
				<textarea rows="2" cols="50" id="adresse" name="adresse" class="form-control" readonly>Adresse: <?php echo $user['ADRESSE']; ?></textarea>
				<input type="text" name="type" id="type" class="form-control" value="Type d'utilisateur: <?php echo $user['TYPEUTILISATEUR']; ?>" readonly>
				<input type="text" name="cne" id="cne" class="form-control" value="CNE: <?php echo $user['CNE']; ?>" readonly><br />
				<a href="http://localhost/edoc/index.php/recherche/rechercher?rech=<?php echo $rech;?>" class="btn btn-default" style="color: black;">Fermer</a>
			</form>
		</div>
	</div>
</div>

<?php
include('foot.php');
?>