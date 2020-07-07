<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Novatag extends CI_Controller {
	
	public function index() {
        if ($this->isLogged()){			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
            $this->load->view('template/super/header');
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('super/addtag');
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function save() {
        if ($this->isLogged()){	
			$this->load->model('TagModel');
			$tag = new TagModel();
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$tagname = $this->input->post("tagname");
			$tagslug = $this->input->post("tagslug");
			
			$tagdata['tagid'] = null;
			$tagdata['tagname'] = $tagname;
			$tagdata['tagslug'] = $tagslug;
			$tagdata['tagstatus'] = 1;
			
			if($tag->save($tagdata)){
				redirect(base_url('tags'));
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