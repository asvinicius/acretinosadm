<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {
	
	public function index() {
        if ($this->isLogged()){
			$this->load->model('NewsModel');
			$news = new NewsModel();
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$listing = $news->listing();
			$itens = count($news->listing());
			
			if(($itens % 10) == 0) {
				$mult = true;
			} else {
				$mult = false;
			}
			
            $content = array("notice" => $listing, "page" => 0, "itens" => $itens, "mult" => $mult);
			
            $this->load->view('template/super/header');
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('super/news', $content);
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function pagina($paged) {
        if ($this->isLogged()){
			$this->load->model('NewsModel');
			$news = new NewsModel();
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$listing = $news->mypaged($paged);
			$itens = count($news->listing());
			
			if(($itens % 10) == 0) {
				$mult = true;
			} else {
				$mult = false;
			}
			
            $content = array("notice" => $listing, "page" => $paged, "itens" => $itens, "mult" => $mult);
			
            $this->load->view('template/super/header');
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('super/news', $content);
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function pesquisar() {
        if ($this->isLogged()){
			$this->load->model('NewsModel');
			$news = new NewsModel();
			
			$searchlabel = $this->input->post("searchlabel");
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$listing = $news->searchmenu($searchlabel);
			
            $content = array("notice" => $listing);
			
            $this->load->view('template/super/header');
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('super/news', $content);
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function mudarstatus($newsid = null) {
        if ($this->isLogged()){	
			$this->load->model('NewsModel');
			$news = new NewsModel();
			
			$item = $news->search($newsid);
			
			if($item){
				$newsdata['newsid'] = $item['newsid'];
				$newsdata['newstitle'] = $item['newstitle'];
				$newsdata['newsresume'] = $item['newsresume'];
				$newsdata['newscontent'] = $item['newscontent'];
				$newsdata['newscategory'] = $item['newscategory'];
				$newsdata['newstype'] = $item['newstype'];
				$newsdata['newsfront'] = $item['newsfront'];
				$newsdata['newsthumb'] = $item['newsthumb'];
				$newsdata['newsdate'] = $item['newsdate'];
				$newsdata['newsslug'] = $item['newsslug'];
				$newsdata['newsdraft'] = $item['newsdraft'];
				$newsdata['newsscheduled'] = $item['newsscheduled'];
				
				if($item['newsstatus'] == 1){
					$newsdata['newsstatus'] = 0;
				} else {
					$newsdata['newsstatus'] = 1;
				}
				
				if($news->update($newsdata)){
					redirect(base_url('noticias'));
				}
				
			}
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function delete($newsid = null) {
        if ($this->isLogged()){	
			$this->load->model('NewsModel');
			$this->load->model('NewstagModel');
			$news = new NewsModel();
			$newstag = new NewstagModel();
						
			if($news->delete($newsid)){
				$relation = $newstag->listing($newsid);
				foreach($relation as $rel){
					$newstag->delete($rel->newstagid);
				}				
				redirect(base_url('noticias'));
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