<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function index()
	{
		if(!($this->session->userdata('logged_in') == TRUE && $this->session->userdata('email') == 'admin@gmail.com')){
			return redirect(site_url('admin/login'));
		}
		$url="http://sudovpn.id:5002/listallpackethome";
		$json = file_get_contents($url);
		$data['list_user']= json_decode($json, TRUE);
		//var_dump($data);
		
		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/home',$data);
		$this->load->view('admin/footer');
		
	}
	public function member()
	{
		if(!($this->session->userdata('logged_in') == TRUE && $this->session->userdata('email') == 'admin@gmail.com')){
			return redirect(site_url('admin/login'));
		}

		$url="http://sudovpn.id:5002/listmember";
		$json = file_get_contents($url);
		$data['listmember'] = json_decode($json, TRUE);
//		var_dump($data);
		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/member',$data);
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

	public function view($id)
	{
		if(!($this->session->userdata('logged_in') == TRUE && $this->session->userdata('email') == 'admin@gmail.com')) {
			return redirect(site_url('admin/login'));
		}
			$url="http://sudovpn.id:5002/listperid/$id";
			$json = file_get_contents($url);
			$temp= json_decode($json, TRUE);
		foreach($temp as $item){
			$data['list']=$item;
		}

		$url="http://sudovpn.id:5002/listAllPacket_User/$id";
		$json = file_get_contents($url);
		$data['list_user']= json_decode($json, TRUE);

		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/user',$data);
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
	public function sent()
	{
		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/sentBox');
		$this->load->view('admin/footer');
	}
	public function compose()
	{
		if(!($this->session->userdata('logged_in') == TRUE && $this->session->userdata('email') == 'admin@gmail.com')) {
			return redirect(site_url('admin/login'));
		}
		
		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/compose');
		$this->load->view('admin/footer');
	}
	public function create_paket()
	{
		if(!($this->session->userdata('logged_in') == TRUE && $this->session->userdata('email') == 'admin@gmail.com')) {
			return redirect(site_url('admin/login'));
		}

		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/create_paket');
		$this->load->view('admin/footer');
	}
	public function paket()
	{
		if(!($this->session->userdata('logged_in') == TRUE && $this->session->userdata('email') == 'admin@gmail.com')) {
			return redirect(site_url('admin/login'));
		}

		$url="http://sudovpn.id:5002/listAllPacket";
		$json = file_get_contents($url);
		$data['list']= json_decode($json, TRUE);
		
		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/paket',$data);
		$this->load->view('admin/footer');
	}
	public function edit_packet($id)
	{
		if(!($this->session->userdata('logged_in') == TRUE && $this->session->userdata('email') == 'admin@gmail.com')) {
			return redirect(site_url('admin/login'));
		}

		$url="http://sudovpn.id:5002/listperPacket/$id";
		$json = file_get_contents($url);
		$temp= json_decode($json, TRUE);
		foreach($temp as $item){
			$data['list']=$item;
		}

		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_packet',$data);
		$this->load->view('admin/footer');
	}
	public function edit_plan_user()
	{
		if(!($this->session->userdata('logged_in') == TRUE && $this->session->userdata('email') == 'admin@gmail.com')) {
			return redirect(site_url('admin/login'));
		}

		$this->load->view('admin/head');
		$this->load->view('admin/nav');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/edit_plan');
		$this->load->view('admin/footer');
	}
	public function login()
	{
		$this->load->view('loginadmin');
	}

	public function logout()
	{
		$newdata = array(
			'email' => '',
			'logged_in'  => FALSE);

		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		return redirect(site_url('admin/login'));

	}

	public function logins()
	{
		$email = $this->input->post('email');
		$passwd = $this->input->post('passwd');

		if($email=='admin@gmail.com' && $passwd=='admin'){
			$newdata = array(
				'email' => $email,
				'logged_in'  => TRUE);
			$this->session->set_userdata($newdata);
			return redirect(site_url('admin/member'));

		}else
		{
			return redirect(site_url('admin/login'));
		}
	}
	

}
