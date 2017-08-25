<div class="container">
	<table class="table table-striped w3-card-2" id="tabCat">
		<tr><th style="color: black">Livre</th><td align='right' style="color: black; margin-left: 5%;"><b>Action</b></td></tr>
		<?php
			for($i=0;$i<=count($result)-1; $i++){
				echo '<tr><td style="color: black">'.$result[$i]['TITRE'].'</td><td align=\'right\'>'.anchor('livre/details1/'.$result[$i]['IDLIVRE'].'/'.$rech,'<span class="glyphicon glyphicon-eye-open act" aria-hidden="true"></span>','class="act"').' '.anchor('reservation/modification/'.$result[$i]['IDLIVRE'],'<span class="glyphicon glyphicon-shopping-cart act" aria-hidden="true"></span>','class="act"').'</td></tr>';
			}
		?>
	</table><br>
</div>