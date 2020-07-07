<?php
class NewsModel extends CI_Model{
	
	protected $newsid;
	protected $newstitle;
	protected $newscontent;
	protected $newsresume;
	protected $newscategory;
	protected $newstype;
	protected $newsfront;
	protected $newsthumb;
	protected $newsdate;
	protected $newsslug;
	protected $newsdraft;
	protected $newsscheduled;
	protected $newsstatus;
	
	function __construct() {
        parent::__construct();
        $this->setNewsid(null);
        $this->setNewstitle(null);
        $this->setNewscontent(null);
        $this->setNewsresume(null);
        $this->setNewscategory(null);
        $this->setNewstype(null);
        $this->setNewsfront(null);
        $this->setNewsthumb(null);
        $this->setNewsdate(null);
        $this->setNewsslug(null);
        $this->setNewsdraft(null);
        $this->setNewsscheduled(null);
        $this->setNewsstatus(null);
    }
	
	public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('news', $data)) {
                return true;
            }
        }
    }
	
    public function update($data = null) {
        if ($data != null) {
            $this->db->where("newsid", $data['newsid']);
            if ($this->db->update('news', $data)) {
                return true;
            }
        }
    }
	
    public function delete($newsid) {
        if ($newsid != null) {
            $this->db->where("newsid", $newsid);
            if ($this->db->delete("news")) {
                return true;
            }
        }
    }
	
    public function search($newsid) {
        if ($newsid != null) {
            $this->db->where("newsid", $newsid);
			return $this->db->get("news")->row_array();
        }
    }
    
    public function listing() {
        $this->db->select('*');
        $this->db->order_by("newsdraft", "desc");
        $this->db->order_by("newsdate", "desc");
        return $this->db->get("news", 10, 0)->result();
    }
    
    public function mypaged($paged) {
        $this->db->select('*');
        $this->db->order_by("newsdraft", "desc");
        $this->db->order_by("newsdate", "desc");
        return $this->db->get("news", 10, ($paged*10))->result();
    }
	
	public function searchmenu($searchlabel) {
        $this->db->like("newstitle", $searchlabel);
        $this->db->or_like("newsid", $searchlabel);
        $this->db->order_by("newsdraft", "desc");
        $this->db->order_by("newsdate", "desc");
        return $this->db->get("news")->result();
    }
	
	public function lastinsert() {
        return $this->search($this->db->insert_id("news"));
    }
        
	function getNewsid() {
		return $this->newsid;
	}

	function getNewstitle() {
		return $this->newstitle;
	}

	function getNewscontent() {
		return $this->newscontent;
	}

	function getNewsresume() {
		return $this->newsresume;
	}

	function getNewscategory() {
		return $this->newscategory;
	}

	function getNewstype() {
		return $this->newstype;
	}

	function getNewsfront() {
		return $this->newsfront;
	}

	function getNewsthumb() {
		return $this->newsthumb;
	}

	function getNewsdate() {
		return $this->newsdate;
	}

	function getNewsslug() {
		return $this->newsslug;
	}

	function getNewsdraft() {
		return $this->newsdraft;
	}

	function getNewsscheduled() {
		return $this->newsscheduled;
	}

	function getNewsstatus() {
		return $this->newsstatus;
	}

	function setNewsid($newsid) {
		$this->newsid = $newsid;
	}

	function setNewstitle($newstitle) {
		$this->newstitle = $newstitle;
	}

	function setNewscontent($newscontent) {
		$this->newscontent = $newscontent;
	}

	function setNewsresume($newsresume) {
		$this->newsresume = $newsresume;
	}

	function setNewscategory($newscategory) {
		$this->newscategory = $newscategory;
	}

	function setNewstype($newstype) {
		$this->newstype = $newstype;
	}

	function setNewsfront($newsfront) {
		$this->newsfront = $newsfront;
	}

	function setNewsthumb($newsthumb) {
		$this->newsthumb = $newsthumb;
	}

	function setNewsdate($newsdate) {
		$this->newsdate = $newsdate;
	}

	function setNewsslug($newsslug) {
		$this->newsslug = $newsslug;
	}

	function setNewsdraft($newsdraft) {
		$this->newsdraft = $newsdraft;
	}
	
	function setNewsscheduled($newsscheduled) {
		$this->newsscheduled = $newsscheduled;
	}

	function setNewsstatus($newsstatus) {
		$this->newsstatus = $newsstatus;
	}


}