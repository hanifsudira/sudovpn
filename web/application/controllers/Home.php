<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
//
    public function index(){
		$this->load->view('home');
	}


    // Set values in session
    public function set_session_value() {

        // Check input validation
        $this->form_validation->set_rules('session_value', 'Session Value', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
        $this->load->view('home');
        } else {

        // Create session array
        $sess_array = array(
        'set_value' => $this->input->post('session_value')
        );

        // Add user value in session
        $this->session->set_userdata('session_data', $sess_array);
        $data['message_display'] = 'Value Successfully Set in Session';
        $this->load->view('home', $data);
        }
    }

    // Read session values
    public function read_session_value() {

        // Read all session values
        $set_data = $this->session->all_userdata();

        if (isset($set_data['session_data']) && $set_data['session_data']['set_value'] != NULL) {
        $data['read_set_value'] = 'Set Value : ' . $set_data['session_data']['set_value'];
        } else {
        $data['read_set_value'] = 'Please Set Session Value First !';
        }
        $this->load->view('home', $data);
    }

    // Unset set values from session
    public function unset_session_value() {
        $sess_array = array(
        'set_value' => ''
        );

        // Removing values from session
        $this->session->unset_userdata('session_data', $sess_array);
        $data['message_display'] = 'Successfully Unset Session Set Value';
        $this->load->view('home', $data);
    }    	
    
	public function login()
	{
		$this->load->view('login');
	}

	public function dashboard_client()
	{
		$this->load->view('dashboard_client');
	}
	public function logins()
	{

        header('Content-type: application/json');

        $data = json_decode(file_get_contents('php://input'),true);

        foreach($data as $item){
            $id_user=$item['id_user'];
            $email=$item['email'];
        }

        $newdata = array(
				'id_user' => $id_user,
				'email' => $email,
				'logged_in'  => TRUE);

        $this->session->set_userdata($newdata);
        redirect('dashboard_client');
	}

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
