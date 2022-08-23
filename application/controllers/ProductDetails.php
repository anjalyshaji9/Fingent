<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductDetails extends CI_Controller {

	public function __construct()
	{
	parent::__construct();
	global $user;
	// Your own constructor code
	$this->load->library('session');
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->helper('string');
	$this->load->library('upload');
	$this->load->model('Product');
	$this->load->model('Adminmodel');
	$user	= $this->session->userdata('reconluser');

	if($user=="")
	{
		redirect(base_url().'Admin/index');
	}
	}

	public function index()
	{
		$data['pro']=$this->Product->getProductDetails();
		//print_r($data['pro']);exit;
		//$this->load->view('invoice',$data);
		$data['span1'] = $this->load->view('menu', '', TRUE);
		$data['span2'] = $this->load->view('invoice', $data, TRUE);
		$this->load->view('template2span', $data);
	}
	public function getUnitPrice()
	{
		$pid=$this->input->post('pro');
		$price=$this->Product->getPrice($pid);
		echo $price['unitPrice'];
	}
	public function generateInvoice()
	{
			$data['proname']="";
			$data['pro']=$_POST['pro'];
			for($i=0;$i<count($data['pro']);$i++)
			{
				$temp=$this->Product->getProductName($data['pro'][$i]);
				$data['proname'][$i]=$temp['Name'];
			}

			$data['qty']=$_POST['qty'];
			$data['upr']=$_POST['upr'];
			$data['tax']=$_POST['tax'];
			$data['line']=$_POST['line'];
			$data['withoutTax']=$this->input->post('no_tax');
			$data['withTax']=$this->input->post('with_tax');
			$data['discount']=$this->input->post('disc');
			$data['total']=$this->input->post('total');
			$this->load->view('generateinvoice',$data);
	}
}
