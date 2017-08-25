<?php
$titre = "Détails Rapport";
include('head.php');
include('nav.php');
?>

<div class="container">
	<div class="w3-card-2">
		<header class="w3-container w3-red">
			<h2 style="text-align: center">Détails rapport</h2>
		</header>
		<div class="w3-container">
			<form><br />
				<input type="text" name="titre" id="titre" class="form-control" value="Titre: <?php echo $rapport['TITRE']; ?>" readonly /> 
				<input type="text" name="filiere" id="filiere" class="form-control" value="Filière: <?php echo $rapport['FILIERE']; ?>" readonly />
				<input type="text" name="annee" id="annee" size="4" maxlength="4" class="form-control"  value="Année: <?php echo $rapport['ANNEE']; ?>" readonly />
				<input type="text" name="type" class="form-control" value="Type de rapport: <?php echo $rapport['TYPEDERAPPORT']; ?>" readonly /> 
				<a href="http://localhost/edoc/index.php/recherche/rechercher?rech=<?php echo $rech;?>" class="btn btn-default" style="color: black;">Fermer</a>
			</form>
		</div>
	</div>
</div>

<?php
include('foot.php');
?>