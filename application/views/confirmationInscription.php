<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Home | eDoc</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta HTTP-EQUIV="refresh" CONTENT="15,url=http://localhost/edoc">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="Application eDoc">
		<meta name="author" content="Florent Ogoutchoro & Boko Kévin & Pyrhus Tezim">
		<!--Css-->
		<link href="<?php echo css_url('bootstrap.min');?>" rel="stylesheet">
		<link href="<?php echo css_url('w3');?>" rel="stylesheet">
		<!--link href="assets/css/bootstrap.css" rel="stylesheet"-->
		<link href="<?php echo css_url('home');?>" rel="stylesheet">
		<!--link href="assets/css/w3.css" rel="stylesheet"-->
		<!--link href="assets/css/home.css" rel="stylesheet"-->
		<style>
			body{
 
					background-image: url("../../assets/images/books4.jpg");
					-webkit-background-size: cover;  /* pour anciens Chrome et Safari */
					background-size: cover;  /* version standardisée */
  
				}
		</style>
	</head>
	<body id="body">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img id="logo" src="../../assets/images/logo.png" alt="logo"></a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<form id="connexion">
						<ul id="navC" class="nav navbar-nav navbar-right">
							<li><input type="emailC" id="emailC" class="form-control" placeholder="Email" autofocus></li>
							<li><input type="passwordC" id="m2pC" class="form-control" placeholder="Mot de passe"></li>
							<li><button type="submit" id="btConnexion" class="btn btn-primary">Connexion</button></li>
						</ul>
					</form>
				</div>
			</div>
		</nav><br /><br /><br />
		
		<div id="formContainer" class="container">
			<div id="form">
				<p style="text-align: justify">Votre inscription a bien été enregistrer et est maintenant en attente de confirmation de la part de l'administrateur. Un email vous sera envoyé après confirmation.<br><br> Vous serez redigé vers la page d'accueil dans quelques secondes.</p>
			</div>
			<?php echo form_error('email'); ?>
			<?php echo form_error('cne'); ?>
			
		</div>
		
		<!-- Les Scripts -->
		<!-- Placé les script à la fin de la page permet un chargement plus rapide -->
		<script src="<?php echo js_url('jquery-2.1.4.min');?>"></script>
		<script src="<?php echo js_url('bootstrap.min');?>"></script>
		<!--script src="assets/js/jquery-2.1.4.min.js"></script-->
		<!--script src="<!?php echo js_url('slideShow');?>"></script-->
		<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script-->
		<!--script src="assets/js/bootstrap.min.js"></script-->
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
		<!--script src="assets/js/slideShow.js"></script-->
	</body>
</html>
	