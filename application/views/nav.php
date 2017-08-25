<div id="banniere">
	
</div>

<ul id="navr" class="nav navbar-nav navbar-right">
            <li>
                <form class="input-group" method="GET" action="http://localhost/edoc/index.php/recherche/rechercher">
                    <input type="text" name="rech" class="form-control" placeholder="Rechercher">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="btr" id="btr"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </span>
                </form>  
            </li>
</ul>

<nav>
	<ul id="navAdherent">
		<li><a href="http://localhost/edoc/index.php/user/adherent">Accueil</a></li>
		<li><a href="http://localhost/edoc/index.php/reservation/ajouter">Livres</a></li>
		<li><a href="http://localhost/edoc/index.php/rapport/telecharger">Rapports</a></li>
		<li><a href="http://localhost/edoc/index.php/reservation/liste">Mes réservations</a></li>
		<li><a href="http://localhost/edoc/index.php/user/dec">Déconnexion</a></li>
	</ul>
</nav>

<div class="w3-card-2 stats" id="profil">
		<header class="w3-container w3-blue">
			<h3 style="text-align: center">Profil</h3>
		</header><br />
		<div class="w3-container" style="text-align: left;">
			<span><b>Nom:</b> <?php echo strtoupper($_SESSION['NOM']);?></span><br /><br />
			<span><b>Prénom:</b> <?php echo strtoupper($_SESSION['PRENOM']);?></span><br /><br />
			<span><b>Email:</b> <?php echo $_SESSION['EMAIL'];?></span><br /><br />
			<span><b>Téléphone:</b> <?php echo '0'.$_SESSION['TEL'];?></span><br /><br />
			<?php
				if($_SESSION['CNE'] !== null){
				 echo '<span><b>CNE: </b>'.$_SESSION['CNE'].'</span><br />';
				}
			?>
			<hr>
			<a href="http://localhost/edoc/index.php/user/modifierCompte" class="btn btn-default" style="margin-left: 18%; padding-left: 10%; padding-right: 10%; color: #466C95;">Modifier <span class="glyphicon glyphicon-pencil act" aria-hidden="true"></span></a>
		</div>
</div>