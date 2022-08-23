<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	public function __construct()
	{



		parent::__construct();
		// Your own constructor code
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('string');
		$this->load->model('Usermodel');
		$this->load->model('Adminmodel');


	}
	public function index()
	{

		if ($this->session->flashdata('response')){
			$regdata['submt_msg'] = $this->session->flashdata('response');}
		else{
			$regdata['submt_msg'] = ''; }

		$regdata['movie_details'] =$this->Adminmodel->get_movie_details();
		

		if($this->input->post()){


			$this->form_validation->set_error_delimiters('<span class="error_form_validation">', '</span>');
			$this->form_validation->set_rules('name', 'Name', 'required',array('required' => 'Please provide %s.'));
			$this->form_validation->set_rules('mobile', 'mobile number', 'required',array('required' => 'Please provide a valid %s.'));
		//$this->form_validation->set_rules('emailid', 'Email', 'required|valid_emailid,array('required' => 'Please provide a valid %s.'));



			if ($this->form_validation->run() === FALSE){

			//$logdata['submt_msg'] = '<div class="red_msg">ERROR in data submitted. Please clear the errors mentioned below each fields.<div>';

			}
			else{



				$insertdata = array(

			 'name'						=> $this->input->post('name'),
			 'mobile_number'	=> $this->input->post('mobile'),
			 'emailid'				=> $this->input->post('emailid')
			 );

			// print_r($insertdata);exit;
			$ins= $this->Usermodel->save_Registration($insertdata);
if($ins){
				 // $this->Adminmodel->log_admin_action(array('user_id'=>$this->session->reconluser,'action'=>8));//log user action
				 $regdata['name']="";
				 $regdata['mobile']="";
				 $regdata['emailid']="";
				$regdata['submt_msg'] = '<div class="alert alert-success alert-dismissable">Registration done successfully.<div>';
				$this->session->set_flashdata('response',$regdata['submt_msg']);
				redirect(base_url() . 'Registration');}

}
}
	
		$data['span1'] = $this->load->view('Admin/menu', $data_menu, TRUE);
		$data['span2'] = $this->load->view('Admin/viewdetails', $regdata, TRUE);
		$this->load->view('template2span', $data);
	}




}
