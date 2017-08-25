<?php
$titre = "Catégories";
include('head.php');
include('navAdmin.php');
?>

<div class="container">
	
	<!--Modal -->
	<div id="id01" class="w3-modal">
		<div class="w3-modal-content">
			<header class="w3-container w3-red">
				<span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn">&times;</span>
				<h3 style="text-align: center">Confirmation</h3>
			</header>
			<div class="w3-container"><br>
				<p style="text-align: center; font-size: 14pt;">Voulez-vous vraiment supprimer cette catégorie?</p><br>
				<input type="button" value="Oui" onclick="confirm1();" class="btn btn-default" style="margin-left: 40%">
				<input type="button" value="Non" class="btn btn-default" onclick="document.getElementById('id01').style.display='none'">
				<br><br>
			</div>
		</div>
	</div>
	
	<div class="w3-card-2">
		<header class="w3-container w3-red">
			<h3 style="text-align: center">Ajouter une nouvelle catégorie</h3>
		</header>
		<div class="w3-container">
			<form method="POST" action="http://localhost/edoc/index.php/livre/categories"><br />
				<input type="text" name="titre" id="titre" class="form-control" placeholder="Nom de la catégorie" required autofocus />
				<input type="submit" value="Enregistrer" name="reg" class="btn btn-default" />
				<input type="reset" value="Annuler" class="btn btn-default" />
			</form>
		</div>
	</div>
	
	<table class="table table-striped w3-card-2" id="tabCat">
		<tr><th style="color: black">Catégorie</th><td align='right' style="color: black"><b>Action</b></td></tr>
		<?php
			for($i=0;$i<=count($result)-1; $i++){
				echo '<tr><td style="color: black">'.$result[$i]['LIBELE'].'</td><td align=\'right\'><a href="javascript:supprimerCat('.$result[$i]['IDCAT'].')" class="act"><span class="glyphicon glyphicon-trash act" aria-hidden="true"></span></a></td></tr>';
			}
		?>
	</table>
</div>

<?php
include('foot.php');
?>