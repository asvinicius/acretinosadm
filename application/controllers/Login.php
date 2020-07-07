<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index()	{
		if ($this->isLogged()){
			redirect(base_url('welcome'));
		} else {
            $this->load->view('public/login');
        }
	}
	
	public function signin() {
		if ($this->isLogged()){
			redirect(base_url('welcome'));
		} else {
			$this->load->model("LoginModel");
			$supernick = $this->input->post("supernick");
			$superpassword = md5($this->input->post("superpassword"));
			$super = $this->LoginModel->search($supernick, $superpassword);
			
			if($super){
				if($super['superstatus'] == '1'){
					$session = array(
						'superid' => $super["superid"],
						'supername' => $super["supername"],
						'super' => TRUE,
						'logged' => TRUE
					);

					$this->session->set_userdata($session);

					redirect(base_url('login'));
				} else {
					$loginfail = array(
						"class" => "danger",
						"message" => "Sinto muito!<br />Seu acesso ao sistema não foi permitido.");

					$msg = array("loginfail" => $loginfail);

					$this->load->view('public/login', $msg);
				}
			} else {
				$loginfail = array(
					"class" => "danger",
					"message" => "Usuário ou Senha incorretos");
				
				$msg = array("loginfail" => $loginfail);
				
				$this->load->view('public/login', $msg);
			}
		}
	}
	
	public function signout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}