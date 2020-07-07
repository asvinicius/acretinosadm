<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Novanoticia extends CI_Controller {
	
	public function index() {
        if ($this->isLogged()){
			$this->load->model('CategoryModel');
			$this->load->model('TagModel');
			$category = new CategoryModel();
			$tag = new TagModel();
			
			$page = $this->getPage();
            $pageid = array("page" => $page);
			
			$listingcategory = $category->listactive();
			$listingtag = $tag->listactive();
            $content = array("categories" => $listingcategory, "tags" => $listingtag);
			
            $this->load->view('template/super/header');
            $this->load->view('template/super/menu', $pageid);
            $this->load->view('super/addnews', $content);
			$this->load->view('template/super/footer');
        }else{
            redirect(base_url('login'));
        }
    }
	public function save() {
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
			$newstitle = $this->input->post("newstitle");
			$newsfront = null;
			$newsthumb = null;
			
			//upload de umagens
			if($this->upload->do_upload('newsfront')){
                $imginfo = $this->upload->data();
                $newsfront = $imginfo['file_name'];
            }else{
				echo $this->upload->display_errors();
			}
			if($this->upload->do_upload('newsthumb')){
                $imginfo = $this->upload->data();
                $newsthumb = $imginfo['file_name'];
            }else{
				echo $this->upload->display_errors();
			}
			
			$newsslug = $this->input->post("newsslug");
			$newsresume = $this->input->post("newsresume");
			$newscontent = $this->input->post("newscontent");
			$newsdraft = $this->input->post("newsdraft");
			$newstype = $this->input->post("newstype");
			$newscategory = $this->input->post("newscategory");
			$tagcheck = $this->input->post("tagcheck");
			
			//Verificar se é rascunho
			if($newsdraft){
				$newsdata['newsid'] = null;
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
				
				if($news->save($newsdata)){
					$lastnews = $news->lastinsert();
					foreach($tagcheck as $tag){
						$newstagdata['newstagid'] = null;
						$newstagdata['newstagnews'] = $lastnews['newsid'];
						$newstagdata['newstagtag'] = $tag;
						
						if($newstag->save($newstagdata)){
							
						}
					}
					redirect(base_url('noticias'));
				}
			} else {
				$newsdata['newsid'] = null;
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
				
				if($news->save($newsdata)){
					$lastnews = $news->lastinsert();
					foreach($tagcheck as $tag){
						$newstagdata['newstagid'] = null;
						$newstagdata['newstagnews'] = $lastnews['newsid'];
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