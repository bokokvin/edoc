<?php
$titre = "Modifier livre";
include('head.php');
include('navAdmin.php');
?>

<div class="container">
	<div class="w3-card-2">
		<header class="w3-container w3-red">
			<h3 style="text-align: center">Modifier un livre existant</h3>
		</header>
		<div class="w3-container">
			<form method="POST"> <br />
				<input type="text" name="titre"   id="titre"   value=" <?php echo $livre['TITRE'] ;?> "   class="form-control" placeholder="Titre"   required autofocus />
				<input type="text" name="auteur"  id="auteur"  value=" <?php echo $livre['AUTEUR'] ;?> "  class="form-control" placeholder="Auteur"  required/>
				<input type="text" name="edition" id="edition" value=" <?php echo $livre['EDITION'] ;?> " class="form-control" placeholder="Edition" required/>
				<input type="text" name="isbn"    id="isbn"    value=" <?php echo $livre['ISBN'] ;?> "    class="form-control" placeholder="ISBN"    required/>
				<textarea rows="4" cols="50" type="text" name="note" id="note"  						  class="form-control" placeholder="Description" /> <?php echo $livre['DESCRIPTION'] ;?> </textarea>
				<input type="text" name="nbreExemplaire" id="exemplaire" value=" <?php echo $livre['NOBREEXEMPLAIRE'] ;?> "  class="form-control" placeholder="Nombre d'exemplaires" required/><br />
				
				<input type="submit" value="Modifier" name="submit" class="btn btn-default" />
				<input type="button" value="Annuler" class="btn btn-default" onclick="window.location.replace('http://localhost/edoc/index.php/livre/modifier/');">
			</form>
		</div>
	</div>
</div>

<?php
include('foot.php');
?>