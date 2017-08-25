<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livre extends CI_Controller {

	public $livre = array();

	public function __construct()
	{
		parent::__construct();
		// Chargement des resources
		$this->load->database();
		$this->load->helper(array('url', 'assets', 'form', 'security'));
		$this->load->library(array('session', 'email', 'form_validation', 'table'));
		$this->load->model('livre_model', 'livreManager');
		$this->load->model('user_model', 'userManager');
		$this->load->model('rapport_model', 'rapportManager');
	}
	
	public function ajouter()
	{
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			if($_SESSION['TYPEUTILISATEUR'] == "admin"){
				$tab = $this->stats();
				$tab['catt'] = $this->livreManager->recupCat();
				$tab['t']=0;
		
				if(isset($_POST['submit'])){
					$livre['cat'] = $this->input->post('cat');
					$livre['titre'] = $this->input->post('titre');
					$livre['auteur'] = $this->input->post('auteur');
					$livre['edition'] = $this->input->post('edition');
					$livre['isbn'] = $this->input->post('isbn');
					$livre['note'] = $this->input->post('note');
					$livre['nbreExemplaire'] = $this->input->post('nbreExemplaire');
			
					$this->livreManager->ajoutLivre($livre);
					$tab['t']=1;
				}
				$this->load->view('ajouterLivre',$tab);
			}
			else
			{
				header("Location: http://localhost/edoc/index.php/user/adherent");
				exit;
			}
		}
	}
	
	public function modifier(){
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			if($_SESSION['TYPEUTILISATEUR'] == "admin"){
				$tab = $this->stats();
				$tab['t'] = 0;
				if($this->uri->segment('3')==null){
					$tab['t'] = 0;
				}
				else
				{
					$tab['t'] = $this->uri->segment('3');
				}
				$this->load->view("modifierLivre", $tab);
				if (isset($_POST['rech'])){
					$tab['t'] = 0;
					$livre = $this->input->post('titre');
					$tab['result'] = $this->livreManager->rechLivre($livre);
					$this->load->view("resultLivre",$tab);
				}
			}
			else
			{
				header("Location: http://localhost/edoc/index.php/user/adherent");
				exit;
			}
		}
	}
	
	public function details(){
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			$tab = $this->stats();
			$tab['livre'] = $this->livreManager->rechpdt($this->uri->segment('3'));
			$tab['livre']['CATEGORIE'] = $this->livreManager->rechCat($tab['livre']['IDCAT']);
			$tab['rech'] = $this->uri->segment('4');
			$this->load->view('detailsLivre',$tab);
		}
	}
	
	public function details1(){
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			$tab['livre'] = $this->livreManager->rechpdt($this->uri->segment('3'));
			$tab['livre']['CATEGORIE'] = $this->livreManager->rechCat($tab['livre']['IDCAT']);
			$tab['rech'] = $this->uri->segment('4');
			$this->load->view('detailsLivre1',$tab);
		}
	}
	
	public function details2(){
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			$tab['livre'] = $this->livreManager->rechpdt($this->uri->segment('3'));
			$tab['livre']['CATEGORIE'] = $this->livreManager->rechCat($tab['livre']['IDCAT']);
			$tab['rech'] = $this->uri->segment('4');
			$this->load->view('detailsLivre2',$tab);
		}
	}
	
	public function modification()
	{
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			if($_SESSION['TYPEUTILISATEUR'] == "admin"){
				$tab = $this->stats();
				$tab['livre'] = $this->livreManager->rechpdt($this->uri->segment('3'));
				$this->load->view('modifierLivre2',$tab);
		
				if(isset($_POST['submit']))
				{
					$livre['TITRE'] = $this->input->post('titre');
					$livre['AUTEUR'] = $this->input->post('auteur');
					$livre['EDITION'] = $this->input->post('edition');
					$livre['ISBN'] = $this->input->post('isbn');
					$livre['DESCRIPTION'] = $this->input->post('note');
					$livre['NOBREEXEMPLAIRE'] = $this->input->post('nbreExemplaire');
			
			
					$this->livreManager->modifierLivre2($livre, $this->uri->segment('3'));
					header("Location: http://localhost/edoc/index.php/livre/modifier/1");
					exit;
				}
			}
			else
			{
				header("Location: http://localhost/edoc/index.php/user/adherent");
				exit;
			}
		}
	}
	
	public function supprimer(){
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			if($_SESSION['TYPEUTILISATEUR'] == "admin"){
				$tab = $this->stats();
				$tab['t'] = 0;
		
				if($this->uri->segment('3')==null){
					$tab['t'] = 0;
				}
				else
				{
					$tab['t'] = $this->uri->segment('3');
			
				}
		
				$this->load->view("supprimerLivre",$tab);
		
				if (isset($_POST['rech'])){
					$tab['t'] = 0;
					$livre = $this->input->post('titre');
					$tab['result'] = $this->livreManager->rechLivre($livre);
					$this->load->view("resultLivresup",$tab);
				}
			}
			else
			{
				header("Location: http://localhost/edoc/index.php/user/adherent");
				exit;
			}
		}
	}
	
	public function supprimer2()
	{
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			if($_SESSION['TYPEUTILISATEUR'] == "admin"){
				$this->livreManager->suppr($this->uri->segment('3'));
				header("Location: http://localhost/edoc/index.php/livre/supprimer/1");
				exit;
			}
			else
			{
				header("Location: http://localhost/edoc/index.php/user/adherent");
				exit;
			}
		}
	}
	
	public function supprimerCat(){
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			if($_SESSION['TYPEUTILISATEUR'] == "admin"){
				$this->livreManager->supprimerCat($this->uri->segment(3));
				header("Location: http://localhost/edoc/index.php/livre/categories");
				exit;
			}
			else
			{
				header("Location: http://localhost/edoc/index.php/user/adherent");
				exit;
			}
		}
	}
	
	public function rechercher(){
		
		
	}
	
	public function categories(){
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			if($_SESSION['TYPEUTILISATEUR'] == "admin"){
				$tab = $this->stats();
				$tab['result'] = $this->livreManager->recupCat();
				$this->load->view('categories',$tab);
				if (isset($_POST['reg'])){
					$this->ajouterCat();
				}
			}
			else
			{
				header("Location: http://localhost/edoc/index.php/user/adherent");
				exit;
			}
		}
	}
	
	public function ajouterCat(){
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			if($_SESSION['TYPEUTILISATEUR'] == "admin"){
				if (isset($_POST['titre'])){
					$cat = $this->input->post('titre');
					$this->livreManager->ajouterCat($cat);
					header("Location: http://localhost/edoc/index.php/livre/categories");
					exit;
				}
			}
			else
			{
				header("Location: http://localhost/edoc/index.php/user/adherent");
				exit;
			}
		}
		
	}
	
	public function stats(){
		$tab['nbLivre'] = $this->livreManager->countLivre();
		$tab['nbUser'] = $this->userManager->countUser();
		$tab['nbAttente'] = $this->userManager->countAttente();
		$tab['nbRapport'] = $this->rapportManager->countRapport();
		return $tab;
	}
}
