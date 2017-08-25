<?php
$titre = "Ajout emprunt";
include('head.php');
include('navAdmin.php');
?>

<div class="container">
	
	<?php
		
			if($t==1)
			{	
				echo '<div class=" w3-container w3-section w3-green" id="suc">';
					echo '<h3>Succès! <span onclick="document.getElementById(\'suc\').style.display=\'none\'" class="w3-closebtn">x</span></h3>';
					echo '<p>Emprunt ajouté avec succès!</p>' ;
				echo '</div>' ;
			}
			
			if($d==1)
			{	
				echo '<div class=" w3-container w3-section w3-red" id="suc">';
					echo '<h3>Avertissement! <span onclick="document.getElementById(\'suc\').style.display=\'none\'" class="w3-closebtn">x</span></h3>';
					echo '<p>Ce livre n\'est pas disponible!</p>' ;
				echo '</div>' ;
			}
	?>
	
	<div class="w3-card-2">
		<header class="w3-container w3-red">
			<h3 style="text-align: center">Ajouter un nouvel emprunt</h3>
			
		</header>
		<div class="w3-container ">
			<form method="POST"> <br />
				<input type="text" name="user" id="user"  class="form-control"  placeholder="Adhérent" onkeyup="complete(this.value)" autocomplete="off" />
				<table id="textHint" class="form-control table" style="display: none;">
				</table>
				<input type="text" name="livre" id="livre2"  class="form-control"  placeholder="Titre du livre" onkeyup="complete1(this.value)" autocomplete="off" />
				<table id="completeTitre" class="form-control table" style="display: none;">
				</table><br><br>
				<!--select name="user" class="form-control" placeholder="Utilisateur" >
					<!?php
						/*for($i=0;$i<=count($userr)-1; $i++){
							echo '<option value=\''.$userr[$i]['USERID'].'\' style="color: black;">'.$userr[$i]['NOM'].'</option>';
						}*/
					?>
				</select>
				
				<select name="livre" class="form-control" placeholder="Titre du Livre" required>
					<!?php
						for($i=0;$i<=count($livree)-1; $i++){
							echo '<option value=\''.$livree[$i]['IDLIVRE'].'\' style="color: black;">'.$livree[$i]['TITRE'].'</option>';
						}
					?>
				</select-->
				<label for="dateEmprunt">Date d'emprunt:</label><br>
				<input type="date" name="dateEmprunt" id="dateEmprunt"  class="form-control"   placeholder="Date d'emprunt" /><br><br>
				<label for="dateRetour">Date de retour:</label><br>
				<input type="date" name="dateRetour" id="dateRetour"  class="form-control" placeholder="Date de retour" required /><br><br>
				
				<input type="submit" value="Enregistrer" name="submit" id="submit2" class="btn btn-default" />
				<input type="reset" value="Réinitialiser" id="re2" class="btn btn-default" /><br><br>
			</form>
		</div>
	</div>
</div>

<?php
include('foot.php');
?>