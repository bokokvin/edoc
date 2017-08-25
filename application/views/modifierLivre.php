<?php
$titre = "Modifier livre";
include('head.php');
include('navAdmin.php');
?>

<div class="container">
	<?php
	if($t==1)
	{	
		echo '<div class=" w3-container w3-section w3-green" id="suc">';
			echo '<h3>Succès! <span onclick="document.getElementById(\'suc\').style.display=\'none\'" class="w3-closebtn">x</span></h3>';
			echo '<p>Livre modifié avec succès!</p>' ;
		echo '</div>' ;
	}
	?>
	
	<div class="w3-card-2">
		<header class="w3-container w3-red">
			<h3 style="text-align: center">Modifier un livre</h3>
		</header>
		<div class="w3-container">
			<form method="POST" action="http://localhost/edoc/index.php/livre/modifier/"><br />
				<input type="text" name="titre" id="titre" class="form-control" placeholder="Titre du livre" required autofocus />
				<input type="submit" value="Chercher" name="rech" class="btn btn-default" />
				<input type="reset" value="Annuler" class="btn btn-default" />
			</form>
		</div>
	</div>
	
	
</div>

<?php
include('foot.php');
?>