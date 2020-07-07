<?php
class NewspublishModel extends CI_Model{
    protected $newspublishid;
    protected $newspublishnews;
    protected $newspublishdate;
    protected $newspublishstatus;
	
	function __construct() {
        parent::__construct();
        $this->setNewspublishid(null);
        $this->setNewspublishnews(null);
        $this->setNewspublishdate(null);
        $this->setNewspublishstatus(null);
    }
	
	public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('newspublish', $data)) {
                return true;
            }
        }
    }
	
    public function update($data = null) {
        if ($data != null) {
            $this->db->where("newspublishid", $data['newspublishid']);
            if ($this->db->update('newspublish', $data)) {
                return true;
            }
        }
    }
	
    public function delete($newspublishid) {
        if ($newspublishid != null) {
            $this->db->where("newspublishid", $newspublishid);
            if ($this->db->delete("newspublish")) {
                return true;
            }
        }
    }
	
    public function search($newspublishid) {
        if ($newspublishid != null) {
            $this->db->where("newspublishid", $newspublishid);
			return $this->db->get("newspublish")->row_array();
        }
    }
    
    public function listing() {
        $this->db->where("newspublishstatus", 1);
        $this->db->order_by("newspublishdate", "asc");
        return $this->db->get("newspublish")->result();
    }
	
	public function specific($newsid) {
		$this->db->where("newspublishstatus", 1);
		$this->db->where("newspublishnews", $newsid);
		return $this->db->get("newspublish")->row_array();
    }
    
    function getNewspublishid() {
        return $this->newspublishid;
    }

    function getNewspublishnews() {
        return $this->newspublishnews;
    }

    function getNewspublishdate() {
        return $this->newspublishdate;
    }

    function getNewspublishstatus() {
        return $this->newspublishstatus;
    }

    function setNewspublishid($newspublishid) {
        $this->newspublishid = $newspublishid;
    }

    function setNewspublishnews($newspublishnews) {
        $this->newspublishnews = $newspublishnews;
    }

    function setNewspublishdate($newspublishdate) {
        $this->newspublishdate = $newspublishdate;
    }

    function setNewspublishstatus($newspublishstatus) {
        $this->newspublishstatus = $newspublishstatus;
    }


}