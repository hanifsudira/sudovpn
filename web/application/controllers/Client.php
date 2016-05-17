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
		$id = $this->session->userdata('id_user');	
		$url="http://sudovpn.id:5002/listperid/$id";
		$json = file_get_contents($url);
		$temp= json_decode($json, TRUE);
		foreach($temp as $item){
			$data['list']=$item;
		}
		$this->load->view('client/head');
		$this->load->view('client/nav',$data);
		$this->load->view('client/sidebar',$data);
		$this->load->view('client/dashboard_client');
		$this->load->view('client/footer');
	
	}

	public function plans(){
		
		$id = $this->session->userdata('id_user');	
		$url="http://sudovpn.id:5002/listperid/$id";
		$json = file_get_contents($url);
		$temp= json_decode($json, TRUE);
		foreach($temp as $item){
			$data['list']=$item;
		}
		
		$this->load->view('client/head');
		$this->load->view('client/nav',$data);
		$this->load->view('client/sidebar',$data);
		$this->load->view('client/plans',$data);
		$this->load->view('client/footer');
	}
	
	public function profile(){
		
		$id = $this->session->userdata('id_user');	
		$url="http://sudovpn.id:5002/listperid/$id";
		$json = file_get_contents($url);
		$temp= json_decode($json, TRUE);
		foreach($temp as $item){
			$data['list']=$item;
		}

		$this->load->view('client/head');
		$this->load->view('client/nav',$data);
		$this->load->view('client/sidebar',$data);
		$this->load->view('client/profile',$data);
		$this->load->view('client/footer');
		
	}
	
	public function edit(){
		$id = $this->session->userdata('id_user');	
		$url="http://sudovpn.id:5002/listperid/$id";
		$json = file_get_contents($url);
		$temp= json_decode($json, TRUE);
		foreach($temp as $item){
			$data['list']=$item;
		}
		$this->load->view('client/head');
		$this->load->view('client/nav',$data);
		$this->load->view('client/sidebar',$data);
		$this->load->view('client/edit_profile');
		$this->load->view('client/footer');
	}
	
	public function detailpaket(){

		$id = $this->session->userdata('id_user');
		$url="http://sudovpn.id:5002/listperid/$id";
		$json = file_get_contents($url);
		$temp= json_decode($json, TRUE);
		foreach($temp as $item){
			$data['list']=$item;
		}	
		$this->load->view('client/head');
		$this->load->view('client/nav',$data);
		$this->load->view('client/sidebar',$data);
		$this->load->view('client/detailpaket',$data);
		$this->load->view('client/footer');
	}
	public function myplan(){

		$id_user = $this->session->userdata('id_user');

		$url="http://sudovpn.id:5002/listAllPacket_User/$id_user";
		$json = file_get_contents($url);
		$data['list_user']= json_decode($json, TRUE);
		
		
		$url2="http://sudovpn.id:5002/listperid/$id_user";
		$json2 = file_get_contents($url2);
		$temp= json_decode($json2, TRUE);
		foreach($temp as $item){
			$data2['list']=$item;
		}	
		
		$this->load->view('client/head');
		$this->load->view('client/nav',$data2);
		$this->load->view('client/sidebar',$data2);
		$this->load->view('client/mypacketplan',$data);
		$this->load->view('client/footer');
	}
	public function createVpn($id){

		$id_user = $this->session->userdata('id_user');

		$url="http://sudovpn.id:5002/listPacket_perID/$id";
		$json = file_get_contents($url);
		$temp= json_decode($json, TRUE);
		foreach($temp as $item){
			$data['list_listpaket']=$item;
		}

		$url="http://sudovpn.id:5002/listAllVPN/$id";
		$json = file_get_contents($url);
		$data['list_vpn']= json_decode($json, TRUE);
		$data['id_list']=$id;
		$data['id_user']=$id_user;

		$this->load->view('client/head');
		$this->load->view('client/nav');
		$this->load->view('client/sidebar');
		$this->load->view('client/createVPN',$data);
		$this->load->view('client/footer');
	}
	public function download($vpn){
		$url="http://sudovpn.id:5002/download_vpn/$vpn";
		$json = file_get_contents($url);
		$temp= json_decode($json, TRUE);
		$username=$temp['username'];

		$namefile="$username.ovpn";
		$url=  "http://sudovpn.id/assets/file/$namefile";
		$data = file_get_contents($url);

		force_download($namefile, $data);

		echo "selesai";
		$url="http://sudovpn.id:5002/delete_vpn/$username";
		$json = file_get_contents($url);
		$temp= json_decode($json, TRUE);
		var_dump($temp);
	}
	public function mail(){

		$this->load->view('client/head');
		$this->load->view('client/nav');
		$this->load->view('client/sidebar');
		$this->load->view('client/mailUser');
		$this->load->view('client/footer');
	
	}
	public function sent(){

		$this->load->view('client/head');
		$this->load->view('client/nav');
		$this->load->view('client/sidebar');
		$this->load->view('client/sentBoxt');
		$this->load->view('client/footer');
	
	}
	public function compose(){

		$this->load->view('client/head');
		$this->load->view('client/nav');
		$this->load->view('client/sidebar');
		$this->load->view('client/composeUser');
		$this->load->view('client/footer');
	
	}
	
}