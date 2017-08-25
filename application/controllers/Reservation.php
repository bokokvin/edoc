<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {

	public $reservation = array();

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
				header("Location: http://localhost/edoc/index.php/user/admin");
				exit;
			}
			else
			{
				$tab = $this->stats();
				$tab['t'] = 0;
				$tab['d'] = 0;
		
				if($this->uri->segment('3')==null){
					$tab['t'] = 0;
				}
				else
				{
					$tab['t'] = $this->uri->segment('3');
			
				}
				
				if($this->uri->segment('4')==1){
					$tab['d'] = 1;
				}
				else
				{
					$tab['d'] = 0;
			
				}
				
				if($this->uri->segment('5')==1){
					$tab['v'] = 1;
				}
				else
				{
					$tab['v'] = 0;
			
				}
		
				$this->load->view("faireReservation", $tab);
				if (isset($_GET['rech'])){
					$tab['t'] = 0;
					$tab['rech'] = $_GET['titre'];
					$tab['result'] = $this->livreManager->rechLivre($tab['rech']);
					$this->load->view("resultReservation",$tab);
				}
			}
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
				header("Location: http://localhost/edoc/index.php/user/admin");
				exit;
			}
			else
			{	$reservation['USERID'] = $_SESSION['USERID'];
				$reservation['IDLIVRE'] = $this->uri->segment('3');
				$verification = $this->reservationManager->getListe($reservation['USERID']);
				$v=0;
				for($i=0; $i<=count($verification)-1; $i++){
					if($verification[$i]['IDLIVRE'] == $reservation['IDLIVRE']){
						$v=1;
					}
					else
					{
						$v=0;
					}
				}
				$livre = $this->livreManager->rechpdt($reservation['IDLIVRE']);
					if($livre['NOBREEXEMPLAIRE']==0){
						header("Location: http://localhost/edoc/index.php/reservation/ajouter/0/1/".$v."");
						exit;
					}
					else{
						if($v==1){
							header("Location: http://localhost/edoc/index.php/reservation/ajouter/0/0/".$v."");
							exit;
						}
						else
						{
							$this->reservationManager->ajoutReserve($reservation);
							header("Location: http://localhost/edoc/index.php/reservation/ajouter/1/0/".$v."");
							exit;
						}
					}
				
			}
		}
	}
	
	public function liste()
	{
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			if($_SESSION['TYPEUTILISATEUR'] == "admin"){
				header("Location: http://localhost/edoc/index.php/user/admin");
				exit;
			}
			else
			{
				$tab['t'] = 0;
		
				if($this->uri->segment('3')==null){
					$tab['t'] = 0;
				}
				else
				{
					$tab['t'] = $this->uri->segment('3');
			
				}
				
				$tab['result'] = $this->reservationManager->getListe($_SESSION['USERID']);
				
				for($i=0; $i<=count($tab['result'])-1; $i++){
					$tab['livre'][$i]  = $this->livreManager->rechpdt($tab['result'][$i]['IDLIVRE']);
				}
				$this->load->view('mesReservations',$tab);
			}
		}
	}	
	
	
	
	public function afficher()
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
		
				$tab['result'] = $this->reservationManager->afficherReserve();
				for($i=0; $i<=count($tab['result'])-1; $i++){
					$tab['user'][$i]  = $this->userManager->getUser($tab['result'][$i]['USERID']);
				}
				for($i=0; $i<=count($tab['result'])-1; $i++){
					$tab['livre'][$i]  = $this->livreManager->rechpdt($tab['result'][$i]['IDLIVRE']);
				}
		
				$this->load->view("resultReservation2",$tab);
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
				$this->reservationManager->suppr($this->uri->segment('3'));
				header("Location: http://localhost/edoc/index.php/reservation/afficher/1");
				exit;
			}
			else
			{
				$this->reservationManager->suppr($this->uri->segment('3'));
				header("Location: http://localhost/edoc/index.php/reservation/liste/1");
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