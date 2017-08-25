<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed');
class Reservation_model extends CI_Model {
	
	protected $table = 'reservation';

	public function __construct()
    {
        $this->load->database();
    }
	
	public function ajoutReserve( $reservation = array() ){

		return $this->db->set('USERID', $reservation['USERID'])
						->set('IDLIVRE', $reservation['IDLIVRE'])
						->insert('reserve');
	}
	
	public function afficherReserve( ){

		$query=$this->db->get('reserve');
		return $query->result_array();
	}
	
	public function getListe($id){
			$q = $this->db->get_where('reserve',array('USERID'=>$id));
			return $q->result_array();
	}	
	
	public function suppr($id)
	{
		$this->db->delete('reserve',array('IDRESERVATION'=>$id));	
	}	
}