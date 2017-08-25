<?php
$titre = "Ajouter rapport";
include('head.php');
include('navAdmin.php');
?>

<div class="container">
	<?php
		
		if($t==1)
		{	
			echo '<div class=" w3-container w3-section w3-green" id="suc">';
				echo '<h3>Succès! <span onclick="document.getElementById(\'suc\').style.display=\'none\'" class="w3-closebtn">x</span></h3>';
				echo '<p>Rapport ajouté avec succès!</p>' ;
			echo '</div>' ;
		}
	?>
	
	<div class="w3-card-2">
		<header class="w3-container w3-red">
			<h3 style="text-align: center">Ajouter un nouveau rapport</h3>
		</header>
		<div class="w3-container">
			<?php echo form_open_multipart('rapport/ajouter');?><br />
				<input type="text" name="titre" id="titre" class="form-control" placeholder="Titre du rapport" required autofocus /> 
				<input type="text" name="filiere" id="filiere" class="form-control" placeholder="Filière" required />
				<input type="number" name="annee" id="annee" size="4" maxlength="4" class="form-control" placeholder="Ex:1999" required/>
				<input type="radio" name="type" value="PFE" class="radio-inline" checked reuired> PFE 
				<input type="radio" name="type" value="Stage" class="radio-inline" required> Stage <br /><br />
				<input type="file" name="fichier" placeholder="Choisissez le fichier" required> <br>
				<button type="submit" name="validation" class="btn btn-default">Valider</button>
				<button type="reset" class="btn btn-default">Réinitialiser</button>

			</form>
		</div>
	</div>
</div>

<?php
include('foot.php');
?>