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
	public function login()
	{
		$this->load->view('login');
	}
	public function register()
	{
		$this->load->view('registrasi');
	}
}
