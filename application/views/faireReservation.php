<?php
$titre = "Ajouter Reservation";
include('head.php');
include('nav.php');
?>

<div class="container">

	<?php
		
			if($t==1)
			{	
				echo '<div class=" w3-container w3-section w3-green" id="suc">';
					echo '<h3>Succès! <span onclick="document.getElementById(\'suc\').style.display=\'none\'" class="w3-closebtn">x</span></h3>';
					echo '<p>Reservation ajoutée avec succès!</p>' ;
				echo '</div>' ;
			}
			
			if($d==1)
			{	
				echo '<div class=" w3-container w3-section w3-red" id="suc">';
					echo '<h3>Avertissement! <span onclick="document.getElementById(\'suc\').style.display=\'none\'" class="w3-closebtn">x</span></h3>';
					echo '<p>Ce livre n\'est pas disponible!</p>' ;
				echo '</div>' ;
			}
			
			if($v==1)
			{	
				echo '<div class=" w3-container w3-section w3-red" id="suc">';
					echo '<h3>Avertissement! <span onclick="document.getElementById(\'suc\').style.display=\'none\'" class="w3-closebtn">x</span></h3>';
					echo '<p>Vous avez déjà réserver ce livre!</p>' ;
				echo '</div>' ;
			}
	?>
	
	<div class="w3-card-2">
		<header class="w3-container w3-red">
			<h3 style="text-align: center">Faire une reservation</h3>
		</header>
		<div class="w3-container">
			<form method="GET" action="http://localhost/edoc/index.php/reservation/ajouter"><br />
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