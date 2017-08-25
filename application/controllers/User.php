<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
public $user = array();


	public function __construct()
	{
		parent::__construct();
		// Chargement des resources
		$this->load->database();
		$this->load->helper(array('url', 'assets', 'form', 'security'));
		$this->load->library(array('session', 'email', 'form_validation'));
		$this->load->model('user_model', 'userManager');
		$this->load->model('livre_model');
		$this->load->model('rapport_model', 'rapportManager');
	}
	
	public function index()
	{
		$count = $this->userManager->countUser();
		if($count>=1){
			$tab['err'] = 0;
			$this->load->view('homeHeader');
			/*if(isset($_POST['btInscription'])){
				$this->inscription();
			}*/
			
			if(isset($_POST['btConnexion'])){
				$tab['err'] = $this->connexion();
				$this->load->view('erreur', $tab);
			}
			$this->load->view('home');
		}
		else
		{
			$this->ajoutAdmin();
		}
	}
	
	public function admin(){
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			if($_SESSION['TYPEUTILISATEUR'] == "admin"){
				$tab = $this->stats();
				$this->load->view('admin',$tab);
			}
			else
			{
				header("Location: http://localhost/edoc/index.php/user/adherent");
				exit;
			}
		}
	}
	
	public function adherent(){
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
				$this->load->view("adherent", $tab);
			}
		}
	}
	
	public function connexion(){
		$this->form_validation->set_error_delimiters('<p class="form_erreur">', '</p>');
		$this->form_validation->set_rules('emailC', '"Email"','trim|required|valid_email|encode_php_tags');
		$this->form_validation->set_rules('passwordC', '"Mot de passe"','trim|required|alpha_dash|encode_php_tags');
		$tab['err'] = 0;
		if($this->form_validation->run())
		{
			$email = $this->input->post('emailC');
			$passwordC = do_hash($this->input->post('passwordC'));
			$u = $this->userManager->connexion($email);
			
			
			if($u['MOTDEPASSE'] == $passwordC)
			{
				if($u['TYPEUTILISATEUR'] == 'admin'){
					session_start();
					$_SESSION['USERID'] = $u['USERID'];
					$_SESSION['NOM'] = $u['NOM'];
					$_SESSION['PRENOM'] = $u['PRENOM'];
					$_SESSION['EMAIL'] = $u['EMAIL'];
					$_SESSION['ADRESSE'] = $u['ADRESSE'];
					$_SESSION['TEL'] = $u['TEL'];
					$_SESSION['TYPEUTILISATEUR'] = $u['TYPEUTILISATEUR'];
					$_SESSION['CNE'] = $u['CNE'];
					redirect(array('user', 'admin'));
				}
				else
				{	session_start();
					$_SESSION['USERID'] = $u['USERID'];
					$_SESSION['NOM'] = $u['NOM'];
					$_SESSION['PRENOM'] = $u['PRENOM'];
					$_SESSION['EMAIL'] = $u['EMAIL'];
					$_SESSION['ADRESSE'] = $u['ADRESSE'];
					$_SESSION['TEL'] = $u['TEL'];
					$_SESSION['TYPEUTILISATEUR'] = $u['TYPEUTILISATEUR'];
					$_SESSION['CNE'] = $u['CNE'];
					redirect(array('user', 'adherent'));
					return 0;
				}
				
			}
			else
			{
				
				return 1;
				
			}
			
			
		}
		else
		{
			return 1;
		}
		return 0;
	}
	
	public function dec(){
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			$_SESSION = array();
			setcookie(session_name(),'',time()-1);
			session_destroy();
			header("Location: http://localhost/edoc/");
			exit;
		}
	}
	
	public function inscription(){
		$this->form_validation->set_error_delimiters('<p class="form_erreur">', '</p>');
			$this->form_validation->set_rules('nom', '"Nom"','trim|required|encode_php_tags');
			$this->form_validation->set_rules('prenom', '"Prénom"','trim|required|encode_php_tags');
			$this->form_validation->set_rules('email', '"Email"','trim|required|valid_email|is_unique[attente.EMAIL]|encode_php_tags');
			$this->form_validation->set_rules('tel', '"Téléphone"','trim|required|encode_php_tags');
			$this->form_validation->set_rules('adresse', '"Adresse"','trim|required|encode_php_tags');
			$this->form_validation->set_rules('m2p', '"Mot de passe"','trim|required|min_length[4]|max_length[30]|alpha_numeric|encode_php_tags');
			$this->form_validation->set_rules('cne', '"CNE"','trim|alpha_numeric|is_unique[attente.CNE]|encode_php_tags');
			
			if($this->form_validation->run())
			{
				$user['nom'] = $this->input->post('nom');
				$user['prenom'] = $this->input->post('prenom');
				$user['email'] = $this->input->post('email');
				$user['tel'] = $this->input->post('tel');
				$user['adresse'] = $this->input->post('adresse');
				$user['type'] = $this->input->post('type');
				$user['cne'] = $this->input->post('cne');
				$user['m2p'] = do_hash($this->input->post('m2p'));
				if($user['type']=="enseignant"){
					$user['cne'] = null;
				}
				$this->userManager->ajoutUtilisateur($user);
				$this->load->view('confirmationInscription');
				
			}
			else
			{
				$this->load->view('homeHeader2');
				$this->load->view('home2');
			}
		
		
	}
	
	public function modifierCompte(){
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
				if(isset($_POST['mod'])){
					$_SESSION['NOM'] = $user['NOM'] = $this->input->post('nom');
					$_SESSION['PRENOM'] = $user['PRENOM'] = $this->input->post('prenom');
					$_SESSION['EMAIL'] = $user['EMAIL'] = $this->input->post('email');
					$_SESSION['TEL'] = $user['TEL'] = $this->input->post('tel');
					$_SESSION['ADRESSE'] = $user['ADRESSE'] = $this->input->post('adresse');
					$_SESSION['TYPEUTILISATEUR'] = $user['TYPEUTILISATEUR'] = $this->input->post('type');
					$_SESSION['CNE'] = $user['CNE'] = $this->input->post('cne');
					if($user['TYPEUTILISATEUR']=="enseignant"){
						$user['CNE'] = null;
						$_SESSION['CNE'] = null;
					}
					$this->userManager->modifierCompte($user,$_SESSION['USERID']);
					header("Location: http://localhost/edoc/index.php/user/adherent/1");
					exit;
				}
				$this->load->view("modifierUser");
			}
		}
	}
	
	public function supprimerUtilisateur(){
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
				$this->load->view("supprimerUser", $tab);
				if (isset($_POST['rechU'])){
					$tab['t'] = 0;
					$nom = $this->input->post('nom');
					$prenom = $this->input->post('prenom');
					$tab['user'] = $this->userManager->rechUtilisateur($nom,$prenom);
					$this->load->view("resultUserSup",$tab);
				}
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
				$this->userManager->supprimer($this->uri->segment('3'));
				header("Location: http://localhost/edoc/index.php/user/supprimerUtilisateur/1");
				exit;
			}
			else
			{
				header("Location: http://localhost/edoc/index.php/user/adherent");
				exit;
			}
		}
	}
	
	public function ajoutAdmin(){
		$this->form_validation->set_error_delimiters('<p class="form_erreur">', '</p>');
		$this->form_validation->set_rules('nom', '"Nom"','trim|required|encode_php_tags');
		$this->form_validation->set_rules('prenom', '"Prénom"','trim|required|encode_php_tags');
        $this->form_validation->set_rules('email', '"Email"','trim|required|valid_email|is_unique[utilisateur.EMAIL]|encode_php_tags');
		$this->form_validation->set_rules('tel', '"Téléphone"','trim|required|encode_php_tags');
		$this->form_validation->set_rules('adresse', '"Adresse"','trim|required|encode_php_tags');
        $this->form_validation->set_rules('m2p', '"Mot de passe"','trim|required|min_length[4]|max_length[30]|alpha_numeric|encode_php_tags');
		
		if($this->form_validation->run())
		{
			$user['nom'] = $this->input->post('nom');
			$user['prenom'] = $this->input->post('prenom');
			$user['email'] = $this->input->post('email');
			$user['tel'] = $this->input->post('tel');
			$user['adresse'] = $this->input->post('adresse');
			$user['type'] = "admin";
			$user['cne'] = "";
			$user['m2p'] = do_hash($this->input->post('m2p'));
			$tab = $this->stats();
			
			$this->userManager->ajoutAdmin($user);
			$this->load->view('admin',$tab);
		}
		else
		{
			$this->load->view('ajoutAdmin');
		}
	}
	
	public function getAttente(){
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			if($_SESSION['TYPEUTILISATEUR'] == "admin"){
				$tab = $this->stats();
				$tab['attente'] = $this->userManager->getAttente();
				$this->load->view("listeAttente", $tab);
			}
			else
			{
				header("Location: http://localhost/edoc/index.php/user/adherent");
				exit;
			}
		}
		
	}
	
	public function valider(){
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			if($_SESSION['TYPEUTILISATEUR'] == "admin"){
				$insert = $this->userManager->valider($this->uri->segment(3));
		
				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'tls://smtp.gmail.com';
				$config['smtp_port'] = '465';
				$config['smtp_user'] = 'ogoutchorof@gmail.com';
				$config['smtp_pass'] = 'startupmode2015';
				$config['mailtype'] = 'html';
				$config['newline'] = "\r\n";
				$config['charset'] = 'utf-8';
				$config['validate'] = 'true';
				//$config['smtp_crypto'] = 'ssl';
				$config['wordwrap'] = TRUE;

				$this->email->initialize($config);
		
				$this->email->from('ogoutchorof@gmail.com', 'eDoc');
				$this->email->to($insert['EMAIL']);
				$this->email->subject('Confirmation');
				$this->email->message('<p style="text-align: justify; padding: 2%; border-left: 5px solid #FC5185; font-size: 12pt;"> Votre inscription à la plateforme de gestion de la bibliothèque de l\'EST eDoc a bien été enregistrée. </p><br />Le présent email faissant office de confirmation, vous pouvez dès à présent vous connecter à la plateforme en ligne pour profiter des ressources à votre disposition.<br /><br /> Cordialement, l\'administrateur.');
				$this->email->send();
				redirect(array('user', 'getAttente'));
			}
			else
			{
				header("Location: http://localhost/edoc/index.php/user/adherent");
				exit;
			}
		}
		
	}
	
	public function detailsUser(){
		if(!isset($_SESSION['TYPEUTILISATEUR'])){
			header("Location: http://localhost/edoc/");
			exit;
		}
		else
		{
			if($_SESSION['TYPEUTILISATEUR'] == "admin"){
				$tab = $this->stats();
				$tab['user'] = $this->userManager->detailsUser($this->uri->segment(3));
				$this->load->view('detailsUser',$tab);
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
			$tab['user'] = $this->userManager->getUser($this->uri->segment('3'));
			$tab['rech'] = $this->uri->segment('4');
			$this->load->view('detailsAdherent',$tab);
		}
	}
	
	public function stats(){
		$tab['nbLivre'] = $this->livre_model->countLivre();
		$tab['nbUser'] = $this->userManager->countUser();
		$tab['nbAttente'] = $this->userManager->countAttente();
		$tab['nbRapport'] = $this->rapportManager->countRapport();
		return $tab;
	}
	
	public function confirm(){
		$this->load->view('confirmationInscription');
	}
}
