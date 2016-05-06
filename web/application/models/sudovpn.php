<?php

Class sudovpn extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database('default','true');
    }
    public function login($data){
        $this->db->reconnect();
        $email=$data['email'];
        $password=$data['password'];
        $query = $this->db->query("call SP_Login('".$email."','".$password."')");
        return $query->result();
    }
    public function register($data){
        $this->db->reconnect();
        $fullname=$data['fullname'];
        $phone=$data['phone'];
        $email=$data['email'];
        $password=$data['password'];
        $address=$data['address'];
        $query = $this->db->query("call SP_Register('".$fullname."','".$email."','".$phone."','".$address."','".$password."')");
        return $query;
    }
}