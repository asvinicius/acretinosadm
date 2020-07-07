<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editatag extends CI_Controller {
	
	public function index() {
        if ($this->isLogged()){			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
            $this->load->view('template/super/header');
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('super/updatetag');
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function prepare($tagid = null) {
        if ($this->isLogged()){		
			$this->load->model('TagModel');
			$tag = new TagModel();
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$item = $tag->search($tagid);
            $content = array("tag" => $item);
			
            $this->load->view('template/super/header');
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('super/updatetag', $content);
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function update() {
        if ($this->isLogged()){	
			$this->load->model('TagModel');
			$tag = new TagModel();
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$tagid = $this->input->post("tagid");
			$tagname = $this->input->post("tagname");
			$tagslug = $this->input->post("tagslug");
			$tagstatus = $this->input->post("tagstatus");
			
			$tagdata['tagid'] = $tagid;
			$tagdata['tagname'] = $tagname;
			$tagdata['tagslug'] = $tagslug;
			$tagdata['tagstatus'] = $tagstatus;
			
			if($tag->update($tagdata)){
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