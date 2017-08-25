<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed');
class Emprunt_model extends CI_Model {
	
	protected $table = 'emprunt';

	public function __construct()
    {
        $this->load->database();
    }
	
	public function ajoutEmprunt( $emprunt = array() ){

		return $this->db->set('USERID', $emprunt['user'])
						->set('IDLIVRE', $emprunt['livre'])
						->set('DATEEMPRUNT', $emprunt['dateEmprunt'])
						->set('DATERETOUR', $emprunt['dateRetour'])
						->insert('emprunt');
	}
	
	public function recupUser()
	{
		$query = $this->db->query("SELECT UPPER(NOM) NOM, USERID FROM utilisateur;");
		return $query->result_array();
	}
	
	public function recupLivre()
	{
		$query = $this->db->query("SELECT UPPER(TITRE) TITRE, IDLIVRE FROM livre;");
		return $query->result_array();
	}
	
	public function rechpdt($id)
	{
		$q = $this->db->get_where('emprunt',array('IDEMPRUNT'=>$id));
		return $q->row_array();
	}
	
	public function rechpdt1($id)
	{
		$q = $this->db->get_where('livre',array('IDLIVRE'=>$id));
		return $q->row_array();
	}
	
	public function rechpdt2($id)
	{
		$q = $this->db->get_where('utilisateur',array('USERID'=>$id));
		return $q->row_array();
	}
	
	public function afficherEmprunt( ){

		$query=$this->db->get('emprunt');
		return $query->result_array();
		}
		
	public function suppr($id)
	{
		$this->db->delete('emprunt',array('IDEMPRUNT'=>$id));	
	}	
	
}
	