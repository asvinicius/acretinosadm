<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Novacategoria extends CI_Controller {
	
	public function index() {
        if ($this->isLogged()){			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
            $this->load->view('template/super/header');
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('super/addcategory');
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function save() {
        if ($this->isLogged()){	
			$this->load->model('CategoryModel');
			$category = new CategoryModel();
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$categoryname = $this->input->post("categoryname");
			$categoryslug = $this->input->post("categoryslug");
			
			$categorydata['categoryid'] = null;
			$categorydata['categoryname'] = $categoryname;
			$categorydata['categoryslug'] = $categoryslug;
			$categorydata['categorystatus'] = 1;
			
			if($category->save($categorydata)){
				redirect(base_url('categorias'));
			}
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function getPage() {
		//$this->load->model('NotifyModel');
		//$notify = new NotifyModel();
		
		//$unread = count($notify->unread($this->session->userdata('superid')));
		
        //$current = array("id" => 2, "page" => "user", "unread" => $unread);
		$current = array("id" => 2, "page" => "user");
        return array("current" => $current);
    }
}