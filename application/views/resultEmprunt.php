<?php
$titre = "Supprimer Emprunt";
include('head.php');
include('navAdmin.php');
?>


<div class="container">

	<?php
		
			if($t==1)
			{	
				echo '<div class=" w3-container w3-section w3-green" id="suc">';
					echo '<h3>Succès! <span onclick="document.getElementById(\'suc\').style.display=\'none\'" class="w3-closebtn">x</span></h3>';
					echo '<p>Emprunt supprimé avec succès!</p>' ;
				echo '</div>' ;
			}
	?>
	
	<!--Modal -->
	<div id="id04" class="w3-modal">
		<div class="w3-modal-content">
			<header class="w3-container w3-red">
				<span onclick="document.getElementById('id04').style.display='none'" class="w3-closebtn">&times;</span>
				<h3 style="text-align: center">Confirmation</h3>
			</header>
			<div class="w3-container"><br>
				<p style="text-align: center; font-size: 14pt;">Voulez-vous vraiment supprimer cet emprunt?</p><br>
				<input type="button" value="Oui" onclick="confirm5();" class="btn btn-default" style="margin-left: 40%">
				<input type="button" value="Non" class="btn btn-default" onclick="document.getElementById('id04').style.display='none'">
				<br><br>
			</div>
		</div>
	</div>
	
	<table class="table table-striped w3-card-2" id="tabCat">
		<tr><th style="color: black">Adhérent</th><th style="color: black">LIVRE</th><th style="color: black">DATE RETOUR</th><td align='right' style="color: black"><b>ACTION</b></td></tr>
		<?php
			for($i=0;$i<=count($result)-1; $i++){
				echo '<tr><td style="color: black">'.strtoupper($utilisateur[$i]['NOM']).' '.strtoupper($utilisateur[$i]['PRENOM']).'</td><td style="color: black">'.$livre[$i]['TITRE'].'</td><td style="color: black">'.$emprunt[$i]['DATERETOUR'].'</td><td align=\'right\'><a href="javascript:supprimerEmprunt('.$emprunt[$i]['IDEMPRUNT'].')" class="act"><span class="glyphicon glyphicon-trash act" aria-hidden="true"></span></a></td></tr>';
			}
		?>
	</table>
</div>

<?php
include('foot.php');
?>