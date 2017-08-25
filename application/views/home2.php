
		
		<div id="formContainer" class="container">
			
			<div id="form">
				<form id="inscription" name="inscription" method="POST" action="http://localhost/edoc/index.php/user/inscription">
					
					<input type="text" id="nom" name="nom" class="form-control" placeholder="Votre nom (au mons 2 caractères)" value="<?php echo set_value('nom'); ?>" onkeyup="vnom()" required><br />
					<input type="text" id="prenom" name="prenom" class="form-control" placeholder="Votre prénom (au mons 2 caractères)" value="<?php echo set_value('prenom'); ?>" onkeyup="vprenom()" required><br />
					<input type="email" id="email" name="email" class="form-control" placeholder="Adresse mail" value="<?php echo set_value('email'); ?>" onkeyup="vemail()" required>
					<input type="text" id="tel" name="tel" class="form-control" placeholder="Téléphone" value="<?php echo set_value('tel'); ?>" onkeyup="vtel()" required><br />
					<textarea rows="2" cols="50" id="adresse" name="adresse" class="form-control" placeholder="Adresse" value="<?php echo set_value('adresse'); ?>" required></textarea><br />
					<input type="radio" id="ch1" name="type" class="radio-inline" value="etudiant" onclick="showCne();" checked> Etudiant
					<input type="radio" id="ch2" name="type" class="radio-inline" value="enseignant" onclick="hideCne();"> Enseignant
					<input type="text" name="cne" id="cne" class="form-control" placeholder="CNE" value="<?php echo set_value('cne'); ?>"><br />
					<input type="password" id="m2p" name="m2p" class="form-control" placeholder="Mot de passe (au moins 4 caractères)" onkeyup="vpass()" required><br />
					<input type="password" id="m2pConfirm" name="m2pConfirm" class="form-control" placeholder="Confirmation" onkeyup="vpassc()" required><br /><br />
					<input type="button" onclick="verification();" id="btInscription" name="btInscription" class="btn btn-primary" value="Inscription">
					<button type="reset" id="btReset" class="btn btn-primary">Annuler</button>
			</form>
			</div>
			<?php echo form_error('email'); ?>
			<?php echo form_error('cne'); ?>
			<?php echo form_error('nom'); ?>
			<?php echo form_error('prenom'); ?>
			<?php echo form_error('tel'); ?>
			<?php echo form_error('adresse'); ?>
			<?php echo form_error('m2p'); ?>
			
		</div>
		
		<!-- Les Scripts -->
		<!-- Placé les script à la fin de la page permet un chargement plus rapide -->
		<script src="<?php echo js_url('jquery-2.1.4.min');?>"></script>
		<script src="<?php echo js_url('bootstrap.min');?>"></script>
		<!--script src="assets/js/jquery-2.1.4.min.js"></script-->
		<script src="<?php echo js_url('slideShow2');?>"></script>
		<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script-->
		<!--script src="assets/js/bootstrap.min.js"></script-->
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
		<!--script src="assets/js/slideShow.js"></script-->
	</body>
</html>
	