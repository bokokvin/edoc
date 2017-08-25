<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapport extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Chargement des resources
		$this->load->database();
		$this->load->helper(array('url', 'assets', 'form', 'security', 'file'));
		$this->load->library(array('session', 'email', 'form_validation'));
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
				$name = $this->rapportManager->countRapport();
				$name = $name + 1;
				$tab = $this->stats();
				$tab['t']=0;
				if(isset($_POST['validation'])){
					$config['upload_path'] = './uploads/';
					$config['allowed_types']        = 'doc|pdf|docx';
					$config['max_size']             = '8192';
					$config['file_name']             = 'rapport'.$name;
        
					$this->load->library('upload', $config);
			
					if ($this->upload->do_upload('fichier') == true)
					{
						$rapport['titre'] = $this->input->post('titre');
						$rapport['filiere'] = $this->input->post('filiere');
						$rapport['annee'] = $this->input->post('annee');
						$rapport['type'] = $this->input->post('type');
						$data = $this->upload->data();
						$rapport['file'] = $data['full_path'];
						$rapport['name'] = $data['file_name'];
						$this->rapportManager->ajoutRapport($rapport);
						$tab['t']=1;
					}
		
				}
				$this->load->view('ajouterRapport',$tab);	
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
				
				$this->load->view("modifierRapport",$tab);
				if (isset($_POST['rech']))
				{
					$critere = $this->input->post('critere');
					$rapport = $this->input->post('val');
					switch($critere){
						case '1': $tab['result'] = $this->rapportManager->rechRapport($rapport);
						break;
						
						case '2': $tab['result'] = $this->rapportManager->rechRapportByType($rapport);
						break;
						
						case '3': $tab['result'] = $this->rapportManager->rechRapportByAnnee($rapport);
						break;
						
						case '4': $tab['result'] = $this->rapportManager->rechRapportByFiliere($rapport);
						break;
						default: $tab['result'] = array();
					}
					$this->load->view("resultRapportmod",$tab);
		
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
			$tab['rapport'] = $this->rapportManager->rechpdt($this->uri->segment('3'));
			$tab['rech'] = $this->uri->segment('4');
			$this->load->view('detailsRapport',$tab);
		}
	}
	
	public function details1(){
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			$tab = $this->stats();
			$tab['rapport'] = $this->rapportManager->rechpdt($this->uri->segment('3'));
			$tab['rech'] = $this->uri->segment('4');
			$this->load->view('detailsRapport1',$tab);
		}
	}
	
	public function telecharger(){
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
				if($this->uri->segment('3')==null){
					$tab['t'] = 0;
				}
				else
				{
					$tab['t'] = $this->uri->segment('3');
				}
				
				$this->load->view("telechargerRapport",$tab);
				if (isset($_POST['rech']))
				{
					$critere = $this->input->post('critere');
					$rapport = $this->input->post('val');
					switch($critere){
						case '1': $tab['result'] = $this->rapportManager->rechRapport($rapport);
						break;
						
						case '2': $tab['result'] = $this->rapportManager->rechRapportByType($rapport);
						break;
						
						case '3': $tab['result'] = $this->rapportManager->rechRapportByAnnee($rapport);
						break;
						
						case '4': $tab['result'] = $this->rapportManager->rechRapportByFiliere($rapport);
						break;
						default: $tab['result'] = array();
					}
					$this->load->view("resultRapporttel",$tab);
		
				}
			}
		}
	}
	
	public function telechargement()
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
				$tab = $this->rapportManager->rechpdt($this->uri->segment('3'));
				$name = $tab['NAME'];
				header('Content-type:force-download');
				header('Content-Disposition:attachment; filename='.$name.'');
				readfile($tab['FICHIER']);
				exit;
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
				$tab = $this->stats();
				$tab['rapport'] = $this->rapportManager->rechpdt($this->uri->segment('3'));
				$this->load->view('modifierRapport2',$tab);
		
				if(isset($_POST['submit']))
				{
					$rapport['TITRE']=$this->input->post('titre');
					$rapport['FILIERE']=$this->input->post('filiere');
					$rapport['ANNEE']=$this->input->post('annee');
					$rapport['TYPEDERAPPORT']=$this->input->post('type');
			
					$this->rapportManager->modifierRapport2($rapport, $this->uri->segment('3'));
					header("Location: http://localhost/edoc/index.php/rapport/modifier/1");
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
		
				$this->load->view("supprimerRapport", $tab);
				if (isset($_POST['rech']))
				{
					$tab['t'] = 0;
					$critere = $this->input->post('critere');
					$rapport = $this->input->post('val');
					switch($critere){
						case '1': $tab['result'] = $this->rapportManager->rechRapport($rapport);
						break;
						
						case '2': $tab['result'] = $this->rapportManager->rechRapportByType($rapport);
						break;
						
						case '3': $tab['result'] = $this->rapportManager->rechRapportByAnnee($rapport);
						break;
						
						case '4': $tab['result'] = $this->rapportManager->rechRapportByFiliere($rapport);
						break;
						default: $tab['result'] = array();
					}
					$this->load->view("resultRapportsup",$tab);
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
				$tab = $this->rapportManager->rechpdt($this->uri->segment('3'));
				$this->rapportManager->suppr($this->uri->segment('3'));
				unlink($tab['FICHIER']);
				header("Location: http://localhost/edoc/index.php/rapport/supprimer/1");
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
