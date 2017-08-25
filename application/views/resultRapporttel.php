<div class="container">
	<table class="table table-striped w3-card-2" id="tabCat">
		<tr><th style="color: black">Titre</th><th style="color: black">Filière</th><th style="color: black">Année</th><td align='right' style="color: black"><b>Action</b></td></tr>
		<?php
			for($i=0;$i<=count($result)-1; $i++){
				echo '<tr><td style="color: black">'.$result[$i]['TITRE'].'</td><td style="color: black">'.strtoupper($result[$i]['FILIERE']).'</td><td style="color: black">'.$result[$i]['ANNEE'].'</td><td align=\'right\'>'.anchor('rapport/telechargement/'.$result[$i]['IDRAPPORT'],'<span class="glyphicon glyphicon-download-alt act" aria-hidden="true"></span>','class="act"').'</td></tr>';
			}
		?>
	</table>
	<!--td align=\'right\'>'.anchor('rapport/telechargement/'.$result[$i]['IDRAPPORT'],'<span class="glyphicon glyphicon-download-alt act" aria-hidden="true"></span>','class="act"').'</td-->
	<!--a href=\''.$result[$i]['FICHIER'].'\' class="act"><span class="glyphicon glyphicon-download-alt act" aria-hidden="true"></span></a-->
</div>