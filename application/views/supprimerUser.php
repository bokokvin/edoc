<?php
$titre = "Supprimer Adhérent";
include('head.php');
include('navAdmin.php');
?>
<div class="container">
	<?php
		
		if($t==1)
		{	
			echo '<div class=" w3-container w3-section w3-green" id="suc">';
				echo '<h3>Succès! <span onclick="document.getElementById(\'suc\').style.display=\'none\'" class="w3-closebtn">x</span></h3>';
				echo '<p>Adhérent supprimé avec succès!</p>' ;
			echo '</div>' ;
		}
	?>
	
	<div class="w3-card-2">
		<header class="w3-container w3-red">
			<h3 style="text-align: center">Supprimer un adhérent</h3>
		</header>
		<div class="w3-container">
			<form method="POST" action="http://localhost/edoc/index.php/user/supprimerUtilisateur"><br />
				<input type="text" name="nom" id="nom" class="form-control" placeholder="Nom" autofocus />
				<input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prenom" />
				<input type="submit" value="Chercher" name="rechU" class="btn btn-default" />
				<input type="reset" value="Réinitialiser" class="btn btn-default" />
			</form>
		</div>
	</div>
</div>

<?php
include('foot.php');
?>


