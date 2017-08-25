<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Home | eDoc</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
					<a class="navbar-brand" href="#"><img id="logo" src="assets/images/logo.png" alt="logo"></a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<form id="connexion" name="connexion" method="POST" action="">
						<ul id="navC" class="nav navbar-nav navbar-right">
							<li><input type="emailC" id="emailC" name="emailC" class="form-control" placeholder="Email" autofocus></li>
							<li><input type="password" id="m2pC"  name="passwordC" class="form-control" placeholder="Mot de passe"></li>
							<li><input type="submit" id="btConnexion" name='btConnexion' class="btn btn-primary" value="Connexion"></li>
						</ul>
					</form>
				</div>
			</div>
		</nav><br /><br /><br />