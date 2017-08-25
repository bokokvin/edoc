<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rapport_model extends CI_Model{




	public function __construct(){
		$this->load->database();
	}

	public function ajoutRapport( $rapport = array() ){

		return $this->db->set('TITRE', $rapport['titre'])
						->set('FILIERE', $rapport['filiere'])
						->set('ANNEE', $rapport['annee'])
						->set('TYPEDERAPPORT', $rapport['type'])
						->set('FICHIER', $rapport['file'])
						->set('NAME', $rapport['name'])
						->insert('rapport');
	}

	public function rechRapport($rapport){
		$query = $this->db->select('*')
						  ->from('rapport')
						  ->like('TITRE', $rapport)
						  ->get();
		return $query->result_array();
	
	}
	
	public function rechRapportByType($rapport){
		$query = $this->db->select('*')
						  ->from('rapport')
						  ->like('TYPEDERAPPORT', $rapport)
						  ->get();
		return $query->result_array();
	
	}
	
	public function rechRapportByAnnee($rapport){
		$query = $this->db->select('*')
						  ->from('rapport')
						  ->like('ANNEE', $rapport)
						  ->get();
		return $query->result_array();
	
	}
	
	public function rechRapportByFiliere($rapport){
		$query = $this->db->select('*')
						  ->from('rapport')
						  ->like('FILIERE', $rapport)
						  ->get();
		return $query->result_array();
	
	}
	
	public function rechpdt($id){
			$q=$this->db->get_where('rapport',array('IDRAPPORT'=>$id));
			return $q->row_array();
	}	
	
    public function modifierRapport2($rapport = array(), $id){
		return $this->db->update('rapport', $rapport, array('IDRAPPORT'=>$id));
	}		
	
	public function suppr($id){
		$this->db->delete('rapport',array('IDRAPPORT'=>$id));
	}
	
	public function countRapport(){
		return $this->db->count_all('rapport');
	}
}