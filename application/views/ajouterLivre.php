<?php
$titre = "Ajout livre";
include('head.php');
include('navAdmin.php');
?>

<div class="container">
	
	<?php
		
			if($t==1)
			{	
				echo '<div class=" w3-container w3-section w3-green" id="suc">';
					echo '<h3>Succès! <span onclick="document.getElementById(\'suc\').style.display=\'none\'" class="w3-closebtn">x</span></h3>';
					echo '<p>Livre ajouté avec succès!</p>' ;
				echo '</div>' ;
			}
	?>
	
	<div class="w3-card-2">
		<header class="w3-container w3-red">
			<h3 style="text-align: center">Ajouter un nouveau livre</h3>
			
		</header>
		<div class="w3-container ">
			<form method="POST"> <br />
				<select name="cat" class="form-control" placeholder="Catégorie" required>
					<option value="" style="color: black;" disabled selected>Catégorie</option>
					<?php
						for($i=0;$i<=count($catt)-1; $i++){
							echo '<option value=\''.$catt[$i]['IDCAT'].'\' style="color: black;">'.$catt[$i]['LIBELE'].'</option>';
						}
					?>
				</select>
				<input type="text" name="titre" id="titre1"  class="form-control" placeholder="Titre" required autofocus />
				<input type="text" name="auteur" id="auteur"  class="form-control" placeholder="Auteur" required/>
				<input type="text" name="edition" id="edition"  class="form-control" placeholder="Edition" required/>
				<input type="text" name="isbn" id="isbn"  class="form-control" placeholder="ISBN" required/>
				<textarea rows="4" cols="50" type="text" name="note" id="note"  class="form-control" placeholder="Commentaire" /></textarea>
				<input type="number" name="nbreExemplaire" id="exemplaire"  class="form-control" placeholder="Nombre d'exemplaires" required/><br />
				<input type="submit" value="Enregistrer" name="submit" class="btn btn-default" />
				<input type="reset" value="Annuler" class="btn btn-default" />
			</form>
		</div>
	</div>
</div>

<?php
include('foot.php');
?>