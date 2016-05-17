/<?php
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
	
	public function profile(){
		
		$id = 5;
		$url="http://sudovpn.id:5002/listperid/$id";
		$json = file_get_contents($url);
		$temp= json_decode($json, TRUE);
		foreach($temp as $item){
			$data['list']=$item;
		}

		$this->load->view('client/head');
		$this->load->view('client/nav');
		$this->load->view('client/sidebar');
		$this->load->view('client/profile',$data);
		$this->load->view('client/footer');
		
	}
	
	public function edit(){
		
		$this->load->view('client/head');
		$this->load->view('client/nav');
		$this->load->view('client/sidebar');
		$this->load->view('client/edit_profile');
		$this->load->view('client/footer');
	}
	
	public function detailpaket(){

		$id = 5;
		$url="http://sudovpn.id:5002/listperid/$id";
		$json = file_get_contents($url);
		$temp= json_decode($json, TRUE);
		foreach($temp as $item){
			$data['list']=$item;
		}	
		$this->load->view('client/head');
		$this->load->view('client/nav');
		$this->load->view('client/sidebar');
		$this->load->view('client/detailpaket',$data);
		$this->load->view('client/footer');
	}
	public function myplan($id){
		$this->load->view('client/head');o
		$this->load->view('client/nav');
		$this->load->view('client/sidebar');
		$this->load->view('client/mypacketplan');
		$this->load->view('client/footer');
	}
	public function createVpn(){
		$this->load->view('client/head');
		$this->load->view('client/nav');
		$this->load->view('client/sidebar');
		$this->load->view('client/createVPN');
		$this->load->view('client/footer');
	}
	public function download($vpn){
		
		force_download(base_url()'/file/'$vpn, NULL);
	}
	
}