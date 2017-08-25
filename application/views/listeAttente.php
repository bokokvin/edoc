<?php
$titre = "Ajouter rapport";
include('head.php');
include('navAdmin.php');
?>

<div class="container">
	
	<div class="w3-card-2">
		<header class="w3-container w3-red">
			<h3 style="text-align: center">Liste des adhérents en attente</h3>
		</header>
	</div>
	<table class="table table-striped w3-card-2" id="tabCat">
		<tr><th style="color: black">Nom et Prenom</th><td align='center' style="color: black"><b>Type d'utilisateur</b></td><td align='right' style="color: black"><b>Action</b></td></tr>
		<?php
			for($i=0;$i<=count($attente)-1; $i++){
				echo '<tr><td style="color: black">'.strtoupper($attente[$i]['NOM']).' '.strtoupper($attente[$i]['PRENOM']).'</td><td align=\'center\' style="color: black">'.$attente[$i]['TYPEUTILISATEUR'].'</td></td><td align=\'right\'>'.anchor('user/detailsUser/'.$attente[$i]['USERID'],'<span class="glyphicon glyphicon-eye-open act" aria-hidden="true"></span>','class="act"').'</td></tr>';
			}
		?>
	</table>
</div>

<?php
include('foot.php');
?>