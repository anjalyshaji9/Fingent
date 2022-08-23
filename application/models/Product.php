<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
  public function getProductDetails()
  {
    $this->db->select('*');
	  $this->db->from('product');
    $query = $this->db->get();
	  return $query->result_array();
  }
	public function getPrice($data)
  {
		$this->db->where('Id',$data);
    $this->db->select('unitPrice');
	  $this->db->from('product');
    $query = $this->db->get();
	  return $query->row_array();
  }
	public function getProductName($pro)
	{
		$this->db->where('Id',$pro);
		$this->db->select('Name');
		$this->db->from('product');
		$query = $this->db->get();
	
		return $query->row_array();
	}
}
?>
