<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index() {
        if ($this->isLogged()){
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
            $this->load->view('template/super/header');
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('super/home');
			
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function getPage() {
		//$this->load->model('NotifyModel');
		//$notify = new NotifyModel();
		
		//$unread = count($notify->unread($this->session->userdata('superid')));
		
        //$current = array("id" => 0, "page" => "user", "unread" => $unread);
		$current = array("id" => 0, "page" => "user");
        return array("current" => $current);
    }
}