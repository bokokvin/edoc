<?php
$titre = "Mes réservations";
include('head.php');
include('nav.php');
?>

<div class="container">
	<?php
		
			if($t==1)
			{	
				echo '<div class=" w3-container w3-section w3-green" id="suc">';
					echo ' <h4>Reservation supprimé avec succès! <span onclick="document.getElementById(\'suc\').style.display=\'none\'" class="w3-closebtn">x</span></h4>';
					//echo '<p>Reservation supprimé avec succès!</p>' ;
				echo '</div>' ;
			}
	?>
	
	<table class="table table-striped" id="tabCat">
		<header class="w3-container tabCatHeader w3-red">
			<h3 style="text-align: center">Mes réservations</h3>
		</header>
		<tr><th style="color: black">Livre</th><td align='right' style="color: black"><b>Action</b></td></tr>
		<?php
			for($i=0;$i<=count($result)-1; $i++){
				echo '<tr><td style="color: black">'.$livre[$i]['TITRE'].'</td><td align=\'right\'>'.anchor('reservation/supprimer/'.$result[$i]['IDRESERVATION'],'<span class="glyphicon glyphicon-trash act" aria-hidden="true"></span>','class="act"').'</td></tr>';
			}
		?>
	</table>
</div>

<?php
include('foot.php');
?>