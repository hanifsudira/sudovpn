<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
	{
		$this->load->view('home');
	}
<<<<<<< HEAD
=======


>>>>>>> 407022935244d7694421545c11fa9204c7b2da86
	public function login()
	{
		$this->load->view('login');
	}

    public function logout()
    {
        $newdata = array(
            'id_user' => '',
            'logged_in'  => FALSE);

        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        $this->load->view('login');
    }

	public function dashboard_client()
	{
		$this->load->view('client/dashboard_client');
	}
<<<<<<< HEAD
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
=======
	public function logins($id)
	{
        $newdata = array(
				'id_user' => $id,
				'logged_in'  => TRUE);
        $this->session->set_userdata($newdata);
        return redirect(site_url('client'));
	}

>>>>>>> 407022935244d7694421545c11fa9204c7b2da86
    public function register()
	{
		$this->load->view('registrasi');
	}
}
