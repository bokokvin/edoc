<?php
$titre = "Home";
include('head.php');
include('navAdmin.php');
?>

<div class="container">
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