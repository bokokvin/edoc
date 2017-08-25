<?php
$titre = "Résultats recherche";
include('head.php');
include('nav.php');
?>
	
	
<div class="container">
<?php
	if(count($result1)>=1){
		echo '<table class="table table-striped w3-card-2" id="tabCat">
			  <header class="w3-container tabCatHeader" style="background-color: #FA5555;">
				  <h3 style="text-align: center; color: white;">Livres</h3>
			  </header>
			  <tr><th style="color: black">Titre</th><td align=\'right\' style="color: black; padding-right: 5%;"><b>Action</b></td></tr>';
			  
		for($i=0;$i<=count($result1)-1; $i++){
			echo '<tr><td style="color: black">'.$result1[$i]['TITRE'].'</td><td align="right" style="color: black;">'.anchor('livre/details2/'.$result1[$i]['IDLIVRE'].'/'.$rech,'<span class="glyphicon glyphicon-eye-open act" aria-hidden="true"></span>','class="act"').' '.anchor('reservation/modification/'.$result1[$i]['IDLIVRE'],'<span class="glyphicon glyphicon-shopping-cart act" aria-hidden="true"></span>','class="act"').'</td></tr>';
		}
		echo '</table>';
	}
?>
</div>

<div class="container">
<?php 
	if(count($result2)>=1){
		echo '<table class="table table-striped w3-card-2" id="tabCat1">';
		echo '<header class="w3-container tabCatHeader" style="background-color: #8DC6FF;">
				<h3 style="text-align: center; color: white;">Rapports</h3>
			</header>
		<tr><th style="color: black">Titre</th><td align=\'right\' style="color: black; padding-right: 6%;"><b>Action</b></td></tr>';
		
		for($i=0;$i<=count($result2)-1; $i++){
			echo '<tr><td style="color: black">'.$result2[$i]['TITRE'].'</td><td align="right" style="color: black;">'.anchor('rapport/details1/'.$result2[$i]['IDRAPPORT'].'/'.$rech,'<span class="glyphicon glyphicon-eye-open act" aria-hidden="true"></span>','class="act"').' '.anchor('rapport/telechargement/'.$result2[$i]['IDRAPPORT'],'<span class="glyphicon glyphicon-download-alt act" aria-hidden="true"></span>','class="act"').'</td></tr>';
		}
		echo '</table>';
	}
?>
</div>


<?php
include('foot.php');
?>