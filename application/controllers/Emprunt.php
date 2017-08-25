<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emprunt extends CI_Controller {

	public $emprunt = array();

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
		$this->load->model('reservation_model', 'reservationManager');
		$this->load->model('emprunt_model', 'empruntManager');
	}
	
	public function complete(){
		// Mot tapé par l'utilisateur
		$q = htmlentities($_GET['user']);
		$tab = $this->userManager->rechUtilisateur($q,$q);
		for($i=0;$i<=count($tab)-1; $i++){
			echo '<tr class=\'completeHover\' onclick="changeValue(this.innerHTML)"><td>'.$tab[$i]['NOM'].' '.$tab[$i]['PRENOM'].'</td></tr>';
		}
	}
	
	public function complete1(){
		// Mot tapé par l'utilisateur
		$q = htmlentities($_GET['livre']);
		$tab = $this->livreManager->rechLivre($q);
		for($i=0;$i<=count($tab)-1; $i++){
			echo '<tr class=\'completeHover\' onclick="changeValue1(this.innerHTML)"><td>'.$tab[$i]['TITRE'].'</td></tr>';
		}
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
				$tab['userr'] = $this->empruntManager->recupUser();
				$tab['livree'] = $this->empruntManager->recupLivre();
				$tab['t']=0;
				$tab['d'] = 0;
		
				if(isset($_POST['submit'])){
					$emprunt['user'] = $this->input->post('user');
					$emprunt['livre'] = $this->input->post('livre');
					$user = explode(' ',$emprunt['user']);
					$userid = $this->userManager->getUserByName($user[0],$user[1]);
					$emprunt['user'] = $userid['USERID'];
					$idlivre = $this->livreManager->getLivreByName($emprunt['livre']);
					$emprunt['livre'] = $idlivre['IDLIVRE'];
					$emprunt['dateEmprunt'] = $this->input->post('dateEmprunt');
					$emprunt['dateRetour'] = $this->input->post('dateRetour');
					$livre = $this->livreManager->rechpdt($emprunt['livre']);
					if($livre['NOBREEXEMPLAIRE']==0){
						$tab['d'] = 1;
						$tab['t']=0;
					}
					else{
						$livre['NOBREEXEMPLAIRE'] = $livre['NOBREEXEMPLAIRE']-1;
						$this->empruntManager->ajoutEmprunt($emprunt);
						$this->livreManager->modifierLivre2($livre,$emprunt['livre']);
						$tab['d']=0;
						$tab['t']=1;
					}
					
				}
				$this->load->view('ajouterEmprunt',$tab);
			}
			else
			{
				header("Location: http://localhost/edoc/index.php/user/adherent");
				exit;
			}
		}
	}
	
	
	public function rechercher()
	{
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
		
				$tab['result'] = $this->empruntManager->afficherEmprunt();
		
				for($i=0; $i<=count($tab['result'])-1; $i++){
					$tab['emprunt'][$i]  = $this->empruntManager->rechpdt($tab['result'][$i]['IDEMPRUNT']);
				}
		
				for($i=0; $i<=count($tab['result'])-1; $i++){
					$tab['livre'][$i]  = $this->empruntManager->rechpdt1($tab['result'][$i]['IDLIVRE']);
				}
		
				for($i=0; $i<=count($tab['result'])-1; $i++){
					$tab['utilisateur'][$i]  = $this->empruntManager->rechpdt2($tab['result'][$i]['USERID']);
				}
		
				$this->load->view("resultEmprunt",$tab);	
			}
			else
			{
				header("Location: http://localhost/edoc/index.php/user/adherent");
				exit;
			}
		}
	}	


	public function supprimer()
	{
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			if($_SESSION['TYPEUTILISATEUR'] == "admin"){
				$emprunt = $this->empruntManager->rechpdt($this->uri->segment('3'));
				$livre = $this->livreManager->rechpdt($emprunt['IDLIVRE']);
				$livre['NOBREEXEMPLAIRE'] = $livre['NOBREEXEMPLAIRE']+1;
				$this->livreManager->modifierLivre2($livre,$emprunt['IDLIVRE']);
				$this->empruntManager->suppr($this->uri->segment('3'));
				header("Location: http://localhost/edoc/index.php/emprunt/rechercher/1");
				exit;
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