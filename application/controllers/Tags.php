<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller {
	
	public function index() {
        if ($this->isLogged()){
			$this->load->model('TagModel');
			$tag = new TagModel();
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$listing = $tag->listing();
            $content = array("tags" => $listing);
			
            $this->load->view('template/super/header');
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('super/tag', $content);
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function mudarstatus($tagid = null) {
        if ($this->isLogged()){	
			$this->load->model('TagModel');
			$tag = new TagModel();
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$item = $tag->search($tagid);
			
			if($item){
				$tagdata['tagid'] = $item['tagid'];
				$tagdata['tagname'] = $item['tagname'];
				$tagdata['tagslug'] = $item['tagslug'];
				
				if($item['tagstatus'] == 1){
					$tagdata['tagstatus'] = 0;
				} else {
					$tagdata['tagstatus'] = 1;
				}
				
				if($tag->update($tagdata)){
					redirect(base_url('tags'));
				}
				
			}
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function delete($tagid = null) {
        if ($this->isLogged()){	
			$this->load->model('TagModel');
			$tag = new TagModel();
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$item = $tag->search($tagid);
			
			if($item){				
				if($tag->delete($tagid)){
					redirect(base_url('tags'));
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