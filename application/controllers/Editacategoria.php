<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editacategoria extends CI_Controller {
	
	public function index() {
        if ($this->isLogged()){			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
            $this->load->view('template/super/header');
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('super/updatecategory');
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function prepare($categoryid = null) {
        if ($this->isLogged()){		
			$this->load->model('CategoryModel');
			$category = new CategoryModel();
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$item = $category->search($categoryid);
            $content = array("category" => $item);
			
            $this->load->view('template/super/header');
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('super/updatecategory', $content);
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function update() {
        if ($this->isLogged()){	
			$this->load->model('CategoryModel');
			$category = new CategoryModel();
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$categoryid = $this->input->post("categoryid");
			$categoryname = $this->input->post("categoryname");
			$categoryslug = $this->input->post("categoryslug");
			$categorystatus = $this->input->post("categorystatus");
			
			$categorydata['categoryid'] = $categoryid;
			$categorydata['categoryname'] = $categoryname;
			$categorydata['categoryslug'] = $categoryslug;
			$categorydata['categorystatus'] = $categorystatus;
			
			if($category->update($categorydata)){
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