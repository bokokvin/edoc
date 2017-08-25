<?php
$titre = "Modifier Rapport";
include('head.php');
include('navAdmin.php');
?>

<div class="container">
	<div class="w3-card-2">
		<header class="w3-container w3-red">
			<h3 style="text-align: center">Modifier un rapport existant</h3>
		</header>
		<div class="w3-container">
			<form method="POST"> <br />
				<input type="text" name="titre" id="titre" value="<?php echo $rapport['TITRE'] ;?> " class="form-control" placeholder="Titre du rapport" required autofocus /> 
				<input type="text" name="filiere" id="filiere" value="<?php echo $rapport['FILIERE'] ;?> " class="form-control" placeholder="Filière" required />
				<input type="text" name="annee" id="annee" value="<?php echo $rapport['ANNEE'] ;?> " size="4" maxlength="4" class="form-control" placeholder="Ex:1999" required/>
				<input type="radio" name="type" value="PFE" class="radio-inline"  <?php if($rapport['TYPEDERAPPORT']=='PFE'){echo 'checked';}?> required> PFE 
				<input type="radio" name="type" value="Stage" class="radio-inline" <?php if($rapport['TYPEDERAPPORT']=='Stage'){echo 'checked';}?> required> Stage <br /><br />
				
				<input type="submit" value="Modifier" name="submit" class="btn btn-default" />
				<a href="http://localhost/edoc/index.php/rapport/modifier" class="btn btn-default" style="color: black;">Retour</a>
			</form>
		</div>
	</div>
</div>

<?php
include('foot.php');
?>