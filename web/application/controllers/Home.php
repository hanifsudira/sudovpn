<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
//
    public function index(){
		$this->load->view('home');
	}


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
	public function logins($id)
	{
        $newdata = array(
				'id_user' => $id,
				'logged_in'  => TRUE);
        $this->session->set_userdata($newdata);
        return redirect('http://sudovpn.id/client/');
	}

    public function register()
	{
		$this->load->view('registrasi');
	}
}
