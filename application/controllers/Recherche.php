<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recherche extends CI_Controller {

	public $recherche=array();

	public function __construct()
	{
		parent::__construct();
		// Chargement des resources
		$this->load->database();
		$this->load->helper(array('url', 'assets', 'form', 'security', 'html'));
		$this->load->library(array('session', 'email', 'form_validation'));
		$this->load->library('table');
		$this->load->model('recherche_model');
		
		$this->load->model('livre_model', 'livreManager');
		$this->load->model('user_model', 'userManager');
		$this->load->model('rapport_model', 'rapportManager');
	}
	
	function rechercher()
	{
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			if($_SESSION['TYPEUTILISATEUR'] == "admin"){
				$tab = $this->stats();
				$recherche = $this->input->get('rech');
				$tab['result1'] = $this->recherche_model->search1($recherche);
				$tab['result2'] = $this->recherche_model->search2($recherche);
				$tab['result3'] = $this->recherche_model->search3($recherche);
				$tab['rech'] = $recherche;
			
				$this->load->view("resultRech",$tab);
			}
			else
			{
				$recherche = $this->input->get('rech');
				$tab['result1'] = $this->recherche_model->search1($recherche);
				$tab['result2'] = $this->recherche_model->search2($recherche);
				
				$tab['rech'] = $recherche;
				$this->load->view("resultRech2",$tab);
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