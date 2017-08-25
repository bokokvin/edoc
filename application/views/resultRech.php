<?php
$titre = "Résultats recherche";
include('head.php');
include('navAdmin.php');
?>
<!--Modal -->
	<div id="id01" class="w3-modal">
		<div class="w3-modal-content">
			<header class="w3-container w3-red">
				<span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn">&times;</span>
				<h3 style="text-align: center">Confirmation</h3>
			</header>
			<div class="w3-container"><br>
				<p style="text-align: center; font-size: 14pt;">Voulez-vous vraiment supprimer cet livre?</p><br>
				<input type="button" value="Oui" onclick="confirm2();" class="btn btn-default" style="margin-left: 40%">
				<input type="button" value="Non" class="btn btn-default" onclick="document.getElementById('id01').style.display='none'">
				<br><br>
			</div>
		</div>
	</div>
	
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
	
	<!--Modal -->
	<div id="id" class="w3-modal">
		<div class="w3-modal-content">
			<header class="w3-container w3-red">
				<span onclick="document.getElementById('id').style.display='none'" class="w3-closebtn">&times;</span>
				<h3 style="text-align: center">Confirmation</h3>
			</header>
			<div class="w3-container"><br>
				<p style="text-align: center; font-size: 14pt;">Voulez-vous vraiment supprimer cet adhérent?</p><br>
				<input type="button" value="Oui" onclick="confirmSup();" class="btn btn-default" style="margin-left: 40%">
				<input type="button" value="Non" class="btn btn-default" onclick="document.getElementById('id').style.display='none'">
				<br><br>
			</div>
		</div>
	</div>
	
	
<div class="container">
<?php
	if(count($result1)>=1){
		echo '<table class="table table-striped w3-card-2" id="tabCat">
			  <header class="w3-container tabCatHeader" style="background-color: #FA5555;">
				  <h3 style="text-align: center; color: white;">Livres</h3>
			  </header>
			  <tr><th style="color: black">Titre</th><td align=\'right\' style="color: black; padding-right: 7%;"><b>Action</b></td></tr>';
			  
		for($i=0;$i<=count($result1)-1; $i++){
			echo '<tr><td style="color: black">'.$result1[$i]['TITRE'].'</td><td align="right" style="color: black;">'.anchor('livre/details/'.$result1[$i]['IDLIVRE'].'/'.$rech,'<span class="glyphicon glyphicon-eye-open act" aria-hidden="true"></span>','class="act"').' '.anchor('livre/modification/'.$result1[$i]['IDLIVRE'],'<span class="glyphicon glyphicon-pencil act" aria-hidden="true"></span>','class="act"').' '.'<a href="javascript:supprimerLivre('.$result1[$i]['IDLIVRE'].')" class="act"><span class="glyphicon glyphicon-trash act" aria-hidden="true"></span></a></td></tr>';
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
		<tr><th style="color: black">Titre</th><td align=\'right\' style="color: black; padding-right: 10%;"><b>Action</b></td></tr>';
		
		for($i=0;$i<=count($result2)-1; $i++){
			echo '<tr><td style="color: black">'.$result2[$i]['TITRE'].'</td><td align="right" style="color: black;">'.anchor('rapport/details/'.$result2[$i]['IDRAPPORT'].'/'.$rech,'<span class="glyphicon glyphicon-eye-open act" aria-hidden="true"></span>','class="act"').' '.anchor('rapport/modification/'.$result2[$i]['IDRAPPORT'],'<span class="glyphicon glyphicon-pencil act" aria-hidden="true"></span>','class="act"').' '.'<a href="javascript:supprimerRapport('.$result2[$i]['IDRAPPORT'].')" class="act"><span class="glyphicon glyphicon-trash act" aria-hidden="true"></span></a></td></tr>';
		}
		echo '</table>';
	}
?>
</div>

<div class="container">
<?php 
	if(count($result3)>=1){
		echo '<table class="table table-striped w3-card-2" id="tabCat2">';
		echo '<header class="w3-container tabCatHeader" style="background-color: #95E1D3;">
				<h3 style="text-align: center; color: white;">Adhérents</h3>
			</header>
		<tr><th style="color: black">Nom Prénom</th><td align=\'right\' style="color: black; padding-right: 6%;"><b>Action</b></td></tr>';
		
		for($i=0;$i<=count($result3)-1; $i++){
			echo '<tr><td style="color: black">'.strtoupper($result3[$i]['NOM']).' '.strtoupper($result3[$i]['PRENOM']).'</td><td align="right" style="color: black;">'.anchor('user/details/'.$result3[$i]['USERID'].'/'.$rech,'<span class="glyphicon glyphicon-eye-open act" aria-hidden="true"></span>','class="act"').' '.'<a href="javascript:supprimerUser('.$result3[$i]['USERID'].')" class="act"><span class="glyphicon glyphicon-trash act" aria-hidden="true"></span></a></td></tr>';
		}
		echo '</table>';
	}
?>
</div>


<?php
include('foot.php');
?>