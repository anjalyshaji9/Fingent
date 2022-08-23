<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Adminmodel extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}



	public function checkadminlogin($username,$pass){
	$query = $this->db->get_where('login', array('username' => $username,'password' => $pass, 'status' => 'active'));//echo $this->db->last_query();exit;
	return $query->row_array();
}

//
// public function get_movie_details(){
// 	$sql="sELECT a.*,r.*, GROUP_CONCAT(b.seat ORDER BY b.id) as seat FROM online_booking a INNER JOIN seat_details b ON FIND_IN_SET(b.id, a.seat_number) > 0 inner join registration r on a.reg_id=r.reg_id GROUP BY a.id";
//    $query= $this->db->query($sql);
// 	     return $query->result_array();
//
// }
//


}

?>
