<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed');
class Livre_model extends CI_Model {
	
	protected $table = 'livre';

	public function __construct()
    {
        $this->load->database();
    }
	
	public function ajoutLivre( $livre = array() ){

		return $this->db->set('IDCAT', $livre['cat'])
						->set('TITRE', $livre['titre'])
						->set('AUTEUR', $livre['auteur'])
						->set('EDITION', $livre['edition'])
						->set('ISBN', $livre['isbn'])
						->set('DESCRIPTION', $livre['note'])
						->set('NOBREEXEMPLAIRE', $livre['nbreExemplaire'])
						->insert('livre');
	}
	
	public function rechpdt($id)
	{
		$q = $this->db->get_where('livre',array('IDLIVRE'=>$id));
		return $q->row_array();
	}
	
	public function getLivreByName($titre)
	{
		$q = $this->db->get_where('livre',array('TITRE'=>$titre));
		return $q->row_array();
	}
	
	public function rechCat($id)
	{
		$q = $this->db->get_where('categorie',array('IDCAT'=>$id));
		return $q->row_array();
	}
	
	public function modifierLivre2( $livre = array(), $id )
	{
		$this->db->update('livre', $livre, array('IDLIVRE'=>$id));
	}
	
	public function rechLivre($livre){
		$query = $this->db->select('*')
						  ->from('livre')
						  ->like('TITRE', $livre)
						  ->get();
		return $query->result_array();
	}
	
	public function suppr($id)
	{
		$this->db->delete('livre',array('IDLIVRE'=>$id));	
	}	
	
	public function recupCat()
	{
		$query = $this->db->query("SELECT UPPER(LIBELE) LIBELE, IDCAT FROM categorie;");
		return $query->result_array();
	}
	
	public function ajouterCat($cat)
	{
		//$this->db->query("INSERT INTO categorie values(,'$cat')");
		$this->db->set('LIBELE', $cat)
					   ->insert('categorie');
	}
	
	public function countLivre(){
		return $this->db->count_all('livre');
	}
	
	public function supprimerCat($cat){
		$this->db->delete('categorie', array('IDCAT' => $cat));
		//$this->db->query("DELETE FROM categorie WHERE LIBELE='$cat'");
	}
	
	/*public function rechLivre($livre){
		$query = $this->db->select('*')
						  ->from('livre')
						  ->like('TITRE', $livre)
						  ->get();
		return $query->result_array();
	}*/
	
}
