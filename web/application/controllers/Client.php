<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!($this->session->userdata('logged_in') == TRUE || $this->session->userdata('id_user') != '')){
			return redirect(site_url('home/login'));
		}
	}

	public function index(){

		$this->load->view('client/head');
		$this->load->view('client/nav');
		$this->load->view('client/sidebar');
		$this->load->view('client/dashboard_client');
		$this->load->view('client/footer');
	
	}

	public function plans(){
		$this->load->view('client/head');
		$this->load->view('client/nav');
		$this->load->view('client/sidebar');
		$this->load->view('client/plans');
		$this->load->view('client/footer');
	}
}