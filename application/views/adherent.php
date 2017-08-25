<?php
$titre = "Adherent";
include('head.php');
include('nav.php');
?>

<div class="container">
	<?php
		
			if($t==1)
			{	
				echo '<div class=" w3-container w3-section w3-green" id="suc">';
					echo '<h3>Succès! <span onclick="document.getElementById(\'suc\').style.display=\'none\'" class="w3-closebtn">x</span></h3>';
					echo '<p>Compte modifié avec succès!</p>' ;
				echo '</div>' ;
			}
	?>

	<div class="w3-card-2">
		<header class="w3-container w3-red">
			<h2 style="text-align: center">Bienvenu sur eDoc</h2>
		</header>
		<div class="w3-container">
			<<?php echo img('logo.png', 'logo');?> style="width: 200px; height: 90px" id="logo">
			<p>
				eDoc est l'application de gestion des documents numériques de l'EST Oujda
			</p>
		</div>
	</div>
</div>
<?php
include('foot.php');
?>