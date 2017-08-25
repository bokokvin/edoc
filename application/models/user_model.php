<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed');
class User_model extends CI_Model {
	
	protected $table = 'utilisateur';
	protected $other = 'attente';

	public function __construct()
    {
        $this->load->database();
    }
	
	public function ajoutUtilisateur($user = array())
	{
		$this->db->set('NOM', $user['nom'])
					   ->set('PRENOM', $user['prenom'])
					   ->set('EMAIL', $user['email'])
					   ->set('TEL', $user['tel'])
					   ->set('ADRESSE', $user['adresse'])
					   ->set('TYPEUTILISATEUR', $user['type'])
					   ->set('CNE', $user['cne'])
					   ->set('MOTDEPASSE', $user['m2p'])
					   ->insert('attente');
	}
	
	public function modifierCompte($user = array(), $id){
		return $this->db->update('utilisateur', $user, array('USERID'=>$id));
	}
	
	public function ajoutAdmin($user = array())
	{
		return $this->db->set('NOM', $user['nom'])
					   ->set('PRENOM', $user['prenom'])
					   ->set('EMAIL', $user['email'])
					   ->set('TEL', $user['tel'])
					   ->set('ADRESSE', $user['adresse'])
					   ->set('TYPEUTILISATEUR', $user['type'])
					   ->set('CNE', $user['cne'])
					   ->set('MOTDEPASSE', $user['m2p'])
					   ->insert($this->table);
	}
	
	public function countUser(){
		return $this->db->count_all('utilisateur');
	}
	
	public function countAttente(){
		return $this->db->count_all('attente');
	}
	
	public function connexion($email)
	{
		$query = $this->db->get_where($this->table,array('EMAIL'=>$email));
		return $query->row_array();
	}
	
	public function getAttente(){
		$query = $this->db->get('attente');
		return $query->result_array();
	}
	
	public function detailsUser($id){
		$query = $this->db->get_where('attente',array('USERID'=>$id));
		return $query->row_array();
	}
	
	public function getUser($id){
		$query = $this->db->get_where('utilisateur',array('USERID'=>$id));
		return $query->row_array();
	}
	
	public function getUserByName($nom,$prenom){
		$query = $this->db->get_where('utilisateur',array('NOM'=>$nom,'PRENOM'=>$prenom));
		return $query->row_array();
	}
	
	public function valider($id){
		$query = $this->db->get_where('attente',array('USERID'=>$id));
		$insert = $query->row_array();
		$insert['USERID'] = '';
		if($insert['TYPEUTILISATEUR']=="enseignant"){
			$insert['CNE'] = null;
		}
		$this->db->insert('utilisateur', $insert);
		$this->db->delete('attente', array('USERID' => $id));
		return $insert;
	}
	
	public function rechUtilisateur($nom, $prenom){
		$query = $this->db->select('*')
						  ->from('utilisateur')
						  ->like('NOM', $nom)
						  ->like('PRENOM', $prenom)
						  ->get();
		return $query->result_array();
	}
	
	public function supprimer($id)
	{
		$this->db->delete('utilisateur',array('USERID'=>$id));	
	}	
}
