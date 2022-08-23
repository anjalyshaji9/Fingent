<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('string');

		$this->load->model('Adminmodel');
		$this->captchavals = array(
				'word'          => '',
				'img_path'      => './captcha/',
				'img_url'       => base_url().'captcha/',
				'font_path'     => './font/ARLRDBD.TTF',
				'img_width'     => '150',
				'img_height'    => 38,
				'expiration'    => 300,
				'word_length'   => 6,
				'font_size'     => 18,
				'img_id'        => 'Imageid',
				'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

				// White background and border, black text and red grid
				'colors'        => array(
						'background' => array(255, 255, 255),
						'border' => array(187, 187, 187),
						'text' => array(0, 0, 0),
						'grid' => array(255, 40, 40)
				)
		);


	}
	public function index()
	{
		$data_menu='';
		if ($this->session->flashdata('response')){
			$logdata['submt_msg'] = $this->session->flashdata('response');}
		else{
			$logdata['submt_msg'] = ''; }
		if($this->input->post()){
			$this->form_validation->set_error_delimiters('<span class="error_form_validation">', '</span>');
			$this->form_validation->set_rules('username', 'User Name', 'required',array('required' => 'Please provide %s.'));
			$this->form_validation->set_rules('pass', 'Password', 'required',array('required' => 'Please provide a valid %s.'));
			if ($this->form_validation->run() === FALSE){
			}
			else
			{

				$chkadminlogin	= $this->Adminmodel->checkadminlogin($this->input->post('username'),$this->input->post('pass'));
				if($chkadminlogin)
				{
				 	$this->session->reconluser=$chkadminlogin['username'];

					redirect(base_url().'ProductDetails');
				}
				else
				{
					$logdata['submt_msg'] = '<div class="red_msg">Invalid User.<div>';
				}

				$logdata['submt_msg'] = '<div class="alert alert-success alert-dismissable">Registration done successfully.<div>';
				$this->session->set_flashdata('response',$logdata['submt_msg']);
				redirect(base_url() . 'Admin');

			}
		}

		$data['span1'] = $this->load->view('Admin/menu', $data_menu, TRUE);
		$data['span2'] = $this->load->view('Admin/login', $logdata, TRUE);
		$this->load->view('template2span', $data);
	}

	public function logout(){

	  $this->load->model('Adminmodel');
		$user	= $this->session->userdata('reconluser');

		if(!empty($user))
		{

			$this->session->unset_userdata("reconluser");
	  }
		redirect(base_url().'Admin/index');
	}


}
