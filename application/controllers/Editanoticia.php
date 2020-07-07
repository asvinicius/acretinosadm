<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editanoticia extends CI_Controller {
	
	public function prepare($newsid = null) {
        if ($this->isLogged()){		
			$this->load->model('CategoryModel');
			$this->load->model('TagModel');
			$this->load->model('NewsModel');
			$this->load->model('NewstagModel');
			
			$category = new CategoryModel();
			$tag = new TagModel();
			$news = new NewsModel();
			$newstag = new NewstagModel();
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$listingcategory = $category->listing(); // pega lista de categorias no bd
			$listingtag = $tag->listing(); // pega lista de tags no bd
			$item = $news->search($newsid); // pega a notícia a ser atualizada no bd
			$listnewstag = $newstag->listing($newsid); // pega as relações news tag
			
            $content = array(
				"categories" => $listingcategory, 
				"tags" => $listingtag,
				"news" => $item,
				"listnewstag" => $listnewstag);
			
            $this->load->view('template/super/header');
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('super/updatenews', $content);
			$this->load->view('template/super/footer');
        }else{
            redirect(base_url('login'));
        }
    }
	
	public function update() {
        if ($this->isLogged()){
			// Definindo as configurações dos uploads e carregando as libraries
			//$config['upload_path'] = '../assets/img/news'; quando estiver pronto
			$config = $this->getConfig();
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
			
			//carregando os models a serem utilizados nesta área
			$this->load->model('NewsModel');
			$this->load->model('NewstagModel');
			
			//construindo as variáveis a trabalar com os models
			$news = new NewsModel();
			$newstag = new NewstagModel();
			
			//recebendo os posts do formulario
			$newsid = $this->input->post("newsid");
			$newstitle = $this->input->post("newstitle");
			$newsresume = $this->input->post("newsresume");
			$newscontent = $this->input->post("newscontent");
			$newscategory = $this->input->post("newscategory");
			$newstype = $this->input->post("newstype");
			$newsfront = $this->input->post("newsfront");
			$newsthumb = $this->input->post("newsthumb");
			$newsdate = $this->input->post("newsdate");
			$newsslug = $this->input->post("newsslug");
			$newsdraft = $this->input->post("newsdraft");
			
			//upload de umagens
			if($this->upload->do_upload('newsfrontupdate')){
                $imginfo = $this->upload->data();
                $newsfront = $imginfo['file_name'];
            }
			if($this->upload->do_upload('newsthumbupdate')){
                $imginfo = $this->upload->data();
                $newsthumb = $imginfo['file_name'];
            }
			
			$tagcheck = $this->input->post("tagcheck");
			
			//Verificar se é rascunho
			if($newsdraft){
				$newsdata['newsid'] = $newsid;
				$newsdata['newstitle'] = $newstitle;
				$newsdata['newsresume'] = $newsresume;
				$newsdata['newscontent'] = $newscontent;
				$newsdata['newscategory'] = $newscategory;
				$newsdata['newstype'] = $newstype;
				$newsdata['newsfront'] = $newsfront;
				$newsdata['newsthumb'] = $newsthumb;
				$newsdata['newsdate'] = date("Y-m-d");
				$newsdata['newsslug'] = $newsslug;
				$newsdata['newsdraft'] = 1;
				$newsdata['newsscheduled'] = 0;
				$newsdata['newsstatus'] = 0;
				
				if($news->update($newsdata)){
					$relation = $newstag->listing($newsid);
					foreach($relation as $rel){
						$newstag->delete($rel->newstagid);
					}
					
					$relativenews = $newsid;
					
					foreach($tagcheck as $tag){
						$newstagdata['newstagid'] = null;
						$newstagdata['newstagnews'] = $relativenews;
						$newstagdata['newstagtag'] = $tag;
						
						if($newstag->save($newstagdata)){
							
						}
					}
					
					redirect(base_url('noticias'));
				}
			} else {
				$newsdata['newsid'] = $newsid;
				$newsdata['newstitle'] = $newstitle;
				$newsdata['newsresume'] = $newsresume;
				$newsdata['newscontent'] = $newscontent;
				$newsdata['newscategory'] = $newscategory;
				$newsdata['newstype'] = $newstype;
				$newsdata['newsfront'] = $newsfront;
				$newsdata['newsthumb'] = $newsthumb;
				$newsdata['newsdate'] = date("Y-m-d");
				$newsdata['newsslug'] = $newsslug;
				$newsdata['newsdraft'] = 0;
				$newsdata['newsscheduled'] = 0;
				$newsdata['newsstatus'] = 1;
				
				if($news->update($newsdata)){
					$relation = $newstag->listing($newsid);
					foreach($relation as $rel){
						$newstag->delete($rel->newstagid);
					}
					
					$relativenews = $newsid;
					
					foreach($tagcheck as $tag){
						$newstagdata['newstagid'] = null;
						$newstagdata['newstagnews'] = $relativenews;
						$newstagdata['newstagtag'] = $tag;
						
						if($newstag->save($newstagdata)){
							
						}
					}
					
					redirect(base_url('noticias'));
					
				}
			}
		} else {
            redirect(base_url('login'));
        }
		
	}
	
	public function getConfig(){
		$config = array(
			"upload_path" => "assets/img/news",
			"allowed_types" => "jpg|png",
			"encrypt_name" => true
		);
		
		return $config;
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