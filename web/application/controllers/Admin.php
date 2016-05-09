<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function index()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	}
	public function member()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/member');
		$this->load->view('admin/footer');
	}
	public function tampil()
	{
		header('Content-type: application/json');

		$data = json_decode(file_get_contents('php://input'),true);

		foreach($data as $item){
			var_dump($item);
			echo $item['email'];
		}
//		var_dump($Data);
	}

	public function view()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/user');
		$this->load->view('admin/footer');
	}
	public function mail()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/mail');
		$this->load->view('admin/footer');
	}
	public function compose()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/compose');
		$this->load->view('admin/footer');
	}
	public function create_paket()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/create_paket');
		$this->load->view('admin/footer');
	}
	public function paket()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/paket');
		$this->load->view('admin/footer');
	}
	public function login()
	{
		$this->load->view('loginadmin');
	}
}
