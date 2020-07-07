<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notificacoes extends CI_Controller {
	
	public function index() {
        if ($this->isLogged()){
			$this->load->model('NotifyModel');
			$notify = new NotifyModel();
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$listing = $notify->listing($this->session->userdata('superid'));
			$itens = count($notify->getCount($this->session->userdata('superid')));
			
			if(($itens % 10) == 0) {
				$mult = true;
			} else {
				$mult = false;
			}
			
            $content = array("notifies" => $listing, "page" => 0, "itens" => $itens, "mult" => $mult);
			
            $this->load->view('template/super/header');
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('super/notifications', $content);
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function pagina($paged) {
        if ($this->isLogged()){
			$this->load->model('NotifyModel');
			$notify = new NotifyModel();
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$listing = $notify->mypaged($this->session->userdata('superid'), $paged);
			$itens = count($notify->getCount($this->session->userdata('superid')));
			
			if(($itens % 10) == 0) {
				$mult = true;
			} else {
				$mult = false;
			}
			
            $content = array("notifies" => $listing, "page" => $paged, "itens" => $itens, "mult" => $mult);
			
            $this->load->view('template/super/header');
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('super/notifications', $content);
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function marcar($notifyid = null) {
        if ($this->isLogged()){	
			$this->load->model('NotifyModel');
			$notify = new NotifyModel();
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$item = $notify->search($notifyid);
			
			if($item){
				$notifydata['notifyid'] = $item['notifyid'];
				$notifydata['notifysuper'] = $item['notifysuper'];
				$notifydata['notifydescription'] = $item['notifydescription'];
				$notifydata['notifylink'] = $item['notifylink'];
				
				if($item['notifystatus'] == 1){
					$notifydata['notifystatus'] = 0;
				} else {
					$notifydata['notifystatus'] = 1;
				}
				
				if($notify->update($notifydata)){
					redirect(base_url('notificacoes'));
				}
				
			}
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function getPage() {
		$this->load->model('NotifyModel');
		$notify = new NotifyModel();
		
		$unread = count($notify->unread($this->session->userdata('superid')));
		
        $current = array("id" => 1, "page" => "user", "unread" => $unread);
        return array("current" => $current);
    }
}