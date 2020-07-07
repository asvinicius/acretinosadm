<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {
	
	public function index() {
        if ($this->isLogged()){
			$this->load->model('CategoryModel');
			$category = new CategoryModel();
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$listing = $category->listing();
            $content = array("categories" => $listing);
			
            $this->load->view('template/super/header');
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('super/category', $content);
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function mudarstatus($categoryid = null) {
        if ($this->isLogged()){	
			$this->load->model('CategoryModel');
			$category = new CategoryModel();
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$item = $category->search($categoryid);
			
			if($item){
				$categorydata['categoryid'] = $item['categoryid'];
				$categorydata['categoryname'] = $item['categoryname'];
				$categorydata['categoryslug'] = $item['categoryslug'];
				
				if($item['categorystatus'] == 1){
					$categorydata['categorystatus'] = 0;
				} else {
					$categorydata['categorystatus'] = 1;
				}
				
				if($category->update($categorydata)){
					redirect(base_url('categorias'));
				}
				
			}
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function delete($categoryid = null) {
        if ($this->isLogged()){	
			$this->load->model('CategoryModel');
			$category = new CategoryModel();
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$item = $category->search($categoryid);
			
			if($item){				
				if($category->delete($categoryid)){
					redirect(base_url('categorias'));
				}
				
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