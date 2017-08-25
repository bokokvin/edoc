<div id="banniere">
	
</div>

<ul id="navr" class="nav navbar-nav navbar-right">
            <li>
                <form class="input-group" method="GET" action="http://localhost/edoc/index.php/recherche/rechercher">
                    <input type="text" class="form-control" name="rech" placeholder="Rechercher" >
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" id="btr"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </span>
                </form>  
            </li>
</ul>
	
<nav>
	<ul id="navAdmin">
		<li class="w3-dropdown-hover"><a href="http://localhost/edoc/index.php/user/admin">Accueil</a></li>
		
		<li class="w3-dropdown-hover"><a href="#">Livres</a>
			<ul class="w3-dropdown-content" type="none">
				<li><a href="http://localhost/edoc/index.php/livre/ajouter">Ajouter</a></li>
				<li><a href="http://localhost/edoc/index.php/livre/modifier">Modifier</a></li>
				<li><a href="http://localhost/edoc/index.php/livre/supprimer">Supprimer</a></li>
			</ul>
		</li>
		
		<li class="w3-dropdown-hover"><a href="http://localhost/edoc/index.php/livre/categories">Catégories</a></li>
		
		<li class="w3-dropdown-hover"><a href="#">Rapports</a>
			<ul class="w3-dropdown-content" type="none">
				<li><a href="http://localhost/edoc/index.php/rapport/ajouter">Ajouter</a></li>
				<li><a href="http://localhost/edoc/index.php/rapport/modifier">Modifier</a></li>
				<li><a href="http://localhost/edoc/index.php/rapport/supprimer">Supprimer</a></li>
			</ul>
		</li>
		
		<li class="w3-dropdown-hover"><a href="#">Emprunts</a>
			<ul class="w3-dropdown-content" type="none">
				<li><a href="http://localhost/edoc/index.php/emprunt/ajouter">Ajouter</a></li>
				<li><a href="http://localhost/edoc/index.php/emprunt/rechercher">Liste</a></li>
			</ul>
		</li>
		
		<li class="w3-dropdown-hover"><a href="http://localhost/edoc/index.php/reservation/afficher">Réservations</a></li>
		
		<li class="w3-dropdown-hover"><a href="#">Adhérents</a>
			<ul class="w3-dropdown-content" type="none">
				<li><a href="http://localhost/edoc/index.php/user/supprimerUtilisateur">Supprimer</a></li>
				<li><a href="http://localhost/edoc/index.php/user/getAttente">Liste d'attente</a></li>
			</ul>
		</li>
		
		<li class="w3-dropdown-hover"><a href="http://localhost/edoc/index.php/user/dec">Déconnexion</a></li>
	</ul>
</nav>

<div class="w3-card-2 stats">
		<header class="w3-container w3-blue">
			<h3 style="text-align: center">Statistiques</h3>
		</header><br />
		<div class="w3-container">
			<span>Nombre d'adhérents: <?php echo $nbUser-1;?></span><br /><br />
			<span>Nombre d'adhérents en attente: <?php echo $nbAttente;?></span><br /><br />
			<span>Nombre de livres disponibles: <?php echo $nbLivre;?></span><br /><br />
			<span>Nombre de rapports disponibles: <?php echo $nbRapport;?></span><br /><br />
		
		</div>
</div>