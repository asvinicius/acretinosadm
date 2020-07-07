<?php
class NewsdestroyModel extends CI_Model{
    protected $newsdestroyid;
    protected $newsdestroynews;
    protected $newsdestroydate;
    protected $newsdestroystatus;
	
	function __construct() {
        parent::__construct();
        $this->setNewsdestroyid(null);
        $this->setNewsdestroynews(null);
        $this->setNewsdestroydate(null);
        $this->setNewsdestroystatus(null);
    }
	
	public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('newsdestroy', $data)) {
                return true;
            }
        }
    }
	
    public function update($data = null) {
        if ($data != null) {
            $this->db->where("newsdestroyid", $data['newsdestroyid']);
            if ($this->db->update('newsdestroy', $data)) {
                return true;
            }
        }
    }
	
    public function delete($newsdestroyid) {
        if ($newsdestroyid != null) {
            $this->db->where("newsdestroyid", $newsdestroyid);
            if ($this->db->delete("newsdestroy")) {
                return true;
            }
        }
    }
	
    public function search($newsdestroyid) {
        if ($newsdestroyid != null) {
            $this->db->where("newsdestroyid", $newsdestroyid);
			return $this->db->get("newsdestroy")->row_array();
        }
    }
    
    public function listing() {
        $this->db->where("newsdestroystatus", 1);
        $this->db->order_by("newsdestroydate", "asc");
        return $this->db->get("newsdestroy")->result();
    }
	
	public function specific($newsid) {
		$this->db->where("newsdestroystatus", 1);
		$this->db->where("newsdestroynews", $newsid);
		return $this->db->get("newsdestroy")->row_array();
    }
    
    function getNewsdestroyid() {
        return $this->newsdestroyid;
    }

    function getNewsdestroynews() {
        return $this->newsdestroynews;
    }

    function getNewsdestroydate() {
        return $this->newsdestroydate;
    }

    function getNewsdestroystatus() {
        return $this->newsdestroystatus;
    }

    function setNewsdestroyid($newsdestroyid) {
        $this->newsdestroyid = $newsdestroyid;
    }

    function setNewsdestroynews($newsdestroynews) {
        $this->newsdestroynews = $newsdestroynews;
    }

    function setNewsdestroydate($newsdestroydate) {
        $this->newsdestroydate = $newsdestroydate;
    }

    function setNewsdestroystatus($newsdestroystatus) {
        $this->newsdestroystatus = $newsdestroystatus;
    }


}