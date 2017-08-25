<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class recherche_model extends CI_Model{




	public function __construct(){
		$this->load->database();
	}

	public function search1($recherche)
	{
		$query = $this->db->select('*')
						  ->from('livre')
						  ->like('TITRE', $recherche)
						  ->get();
		return $query->result_array();
	
	}
	
	public function search2($recherche)
	{
		$query = $this->db->select('*')
						  ->from('rapport')
						  ->like('TITRE', $recherche)
						  ->get();
		return $query->result_array();
	
	}
	
	public function search3($recherche){
		$query = $this->db->select('*')
						  ->from('utilisateur')
						  ->like('NOM', $recherche)
						  ->or_like('PRENOM', $recherche)
						  ->get();
		return $query->result_array();
	}
}