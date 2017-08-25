<?php
$titre = "Modifier compte";
include('head.php');
include('nav.php');
?>

<div class="container">
	<div class="w3-card-2">
		<header class="w3-container w3-red">
			<h2 style="text-align: center">Modifier votre compte</h2>
		</header>
		<div class="w3-container">
			<form method="POST"><br />
				<input type="text" id="nom" name="nom" class="form-control" value="<?php echo strtoupper($_SESSION['NOM']); ?>">
				<input type="text" id="prenom" name="prenom" class="form-control" value="<?php echo strtoupper($_SESSION['PRENOM']); ?>">
				<input type="email" id="email" name="email" class="form-control" value="<?php echo $_SESSION['EMAIL']; ?>">
				<input type="text" id="tel" name="tel" class="form-control" value="<?php echo '0'.$_SESSION['TEL']; ?>">
				<textarea rows="2" cols="50" id="adresse" name="adresse" class="form-control" ><?php echo $_SESSION['ADRESSE'];?></textarea>
				<input type="text" name="type" id="type" class="form-control" value="<?php echo $_SESSION['TYPEUTILISATEUR']; ?>" readonly>
				<input type="text" name="cne" id="cne" class="form-control" value="<?php echo $_SESSION['CNE']; ?>" readonly><br />
				<input type="submit" name="mod" value="Modifier" class="btn btn-primary">
				<?php echo anchor('user/adherent','Annuler','class="btn btn-primary"');?>
			</form>
		</div>
	</div>
</div>

<?php
include('foot.php');
?>