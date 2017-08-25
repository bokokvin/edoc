<?php
$titre = "Détails livre";
include('head.php');
include('navAdmin.php');
?>

<div class="container">
	<div class="w3-card-2">
		<header class="w3-container w3-red">
			<h2 style="text-align: center">Détails livre</h2>
		</header>
		<div class="w3-container">
			<form><br />
				<input type="text" name="cat" id="cat"  class="form-control" value="Catégorie: <?php echo strtoupper($livre['CATEGORIE']['LIBELE']); ?>" readonly />
				<input type="text" name="titre" id="titre"  class="form-control" value="Titre: <?php echo $livre['TITRE']; ?>" readonly />
				<input type="text" name="auteur" id="auteur"  class="form-control" value="Auteur: <?php echo $livre['AUTEUR']; ?>" readonly />
				<input type="text" name="edition" id="edition"  class="form-control" value="Edition: <?php echo $livre['EDITION']; ?>" readonly />
				<input type="text" name="isbn" id="isbn"  class="form-control" value="ISBN: <?php echo $livre['ISBN']; ?>" readonly />
				<textarea rows="4" cols="50" type="text" name="note" id="note"  class="form-control" readonly /><?php echo "Descripton: ".$livre['TITRE']; ?></textarea>
				<input type="text" name="nbreExemplaire" id="exemplaire"  class="form-control" value="Nombre d'exemplaires: <?php echo $livre['NOBREEXEMPLAIRE']; ?>" readonly />
				<input type="text" name="disponibilite" id="dispo"  class="form-control" value="Disponibilité: <?php if($livre['NOBREEXEMPLAIRE']==0){echo "livre non disponible";}else{echo "livre disponible";} ?>" readonly /><br />
				<a href="http://localhost/edoc/index.php/recherche/rechercher?rech=<?php echo $rech;?>" class="btn btn-default" style="color: black;">Fermer</a>
			</form>
		</div>
	</div>
</div>

<?php
include('foot.php');
?>