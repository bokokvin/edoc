<?php
$titre = "Supprimer Rapport";
include('head.php');
include('navAdmin.php');
?>
<div class="container">
	<?php
		
		if($t==1)
		{	
			echo '<div class=" w3-container w3-section w3-green" id="suc">';
				echo '<h3>Succès! <span onclick="document.getElementById(\'suc\').style.display=\'none\'" class="w3-closebtn">x</span></h3>';
				echo '<p>Rapport supprimé avec succès!</p>' ;
			echo '</div>' ;
		}
	?>
	
	<div class="w3-card-2">
		<header class="w3-container w3-red">
			<h3 style="text-align: center">Supprimer un rapport</h3>
		</header>
		<div class="w3-container">
			<form method="POST" action="http://localhost/edoc/index.php/rapport/supprimer"><br />
				<select name="critere" class="form-control" placeholder="Rechercher par" required onclick="changePlaceholder()" >
					<option value="0" id="0" style="color: black;">Rechercher par</option>
					<option value="1" id="1" style="color: black;">Titre</option>
					<option value="2" id="2" style="color: black;">Type de rapport</option>
					<option value="3" id="3" style="color: black;">Année</option>
					<option value="4" id="4" style="color: black;">Filière</option>
				</select>
				<input type="text" name="val" id="val" class="form-control" required />
				<input type="submit" value="Chercher" name="rech" class="btn btn-default" />
				<input type="reset" value="Annuler" class="btn btn-default" />
			</form>
		</div>
	</div>
</div>
<?php
include('foot.php');
?>


