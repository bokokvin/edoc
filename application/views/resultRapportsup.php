﻿<div class="container">
	<!--Modal -->
	<div id="id02" class="w3-modal">
		<div class="w3-modal-content">
			<header class="w3-container w3-red">
				<span onclick="document.getElementById('id02').style.display='none'" class="w3-closebtn">&times;</span>
				<h3 style="text-align: center">Confirmation</h3>
			</header>
			<div class="w3-container"><br>
				<p style="text-align: center; font-size: 14pt;">Voulez-vous vraiment supprimer cet rapport?</p><br>
				<input type="button" value="Oui" onclick="confirm3();" class="btn btn-default" style="margin-left: 40%">
				<input type="button" value="Non" class="btn btn-default" onclick="document.getElementById('id02').style.display='none'">
				<br><br>
			</div>
		</div>
	</div>
	
	<table class="table table-striped w3-card-2" id="tabCat">
	<tr><th style="color: black;">Titre</th><th style="color: black">Filière</th><th style="color: black">Année</th><td align="right" style="color: black;"><b>Action</b></td></tr>
	<?php
		for($i=0;$i<=count($result)-1;$i++)
		{
			echo '<tr><td style="color: black;">'.$result[$i]['TITRE'].'</td><td style="color: black">'.strtoupper($result[$i]['FILIERE']).'</td><td style="color: black">'.$result[$i]['ANNEE'].'</td><td align="right" style="color: black;"><a href="javascript:supprimerRapport('.$result[$i]['IDRAPPORT'].')" class="act"><span class="glyphicon glyphicon-trash act" aria-hidden="true"></span></a></td></tr>';
			
		}
	?>
	</table>
</div>