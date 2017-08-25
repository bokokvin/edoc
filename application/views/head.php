<!DOCTYPE html>
<html lang="fr">
	<head>
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
		<link href="<?php echo css_url('style');?>" rel="stylesheet">
		<!--link href="assets/css/w3.css" rel="stylesheet"-->
		<!--link href="assets/css/home.css" rel="stylesheet"-->
		<title>
        <?php
            echo
                isset($titre) ? $titre .' | eDoc'
                : 'Bienvenue sur eDoc';

        ?>
    </title>
	</head>