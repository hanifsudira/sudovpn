<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
	{
		$this->load->view('home');
	}
	public function login()
	{
		$this->load->view('login');
	}

	public function dashboard_client()
	{
		$this->load->view('dashboard_client');
	}
/*	public function logins()
	{
        $id = array(
            'email' => $this->input->post('user[email]'),
            'password' => $this->input->post('user[password]') 
        );
		$this->load->model('sudovpn');
		$data= $this->sudovpn->login($id);
		if($data)return redirect(base_url()."/home/dashboard_client");       
        else return redirect(base_url()."/home/login");       
	}*/
    public function register()
	{
		$this->load->view('registrasi');
	}
/*    public function registers()
	{
        $id = array(
            'fullname' => $this->input->post('name'),
            'password' => $this->input->post('passwd'), 
            'email' => $this->input->post('email'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone')
        );
		$this->load->model('sudovpn');
		$data= $this->sudovpn->register($id);
		if($data)return redirect(base_url());       
        else return redirect(base_url()."/home/register");       
	
	}*/
}
