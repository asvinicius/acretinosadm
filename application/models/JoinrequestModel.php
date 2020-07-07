<?php
class JoinrequestModel extends CI_Model{
    protected $joinrequestid;
    protected $joinrequestname;
    protected $joinrequestnick;
    protected $joinrequestcpf;
    protected $joinrequestemail;
    protected $joinrequestreg;
	
	function __construct() {
        parent::__construct();
        $this->setJoinrequestid(null);
        $this->setJoinrequestname(null);
        $this->setJoinrequestnick(null);
        $this->setJoinrequestcpf(null);
        $this->setJoinrequestemail(null);
        $this->setJoinrequestreg(null);
    }
	
	public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('joinrequest', $data)) {
                return true;
            }
        }
    }
	
    public function update($data = null) {
        if ($data != null) {
            $this->db->where("joinrequestid", $data['joinrequestid']);
            if ($this->db->update('joinrequest', $data)) {
                return true;
            }
        }
    }
	
    public function delete($joinrequestid) {
        if ($joinrequestid != null) {
            $this->db->where("joinrequestid", $joinrequestid);
            if ($this->db->delete("joinrequest")) {
                return true;
            }
        }
    }
	
    public function search($joinrequestid) {
        if ($joinrequestid != null) {
            $this->db->where("joinrequestid", $joinrequestid);
			return $this->db->get("joinrequest")->row_array();
        }
    }
    
    public function listing() {
        $this->db->select('*');
        $this->db->order_by("joinrequestid", "asc");
        return $this->db->get("joinrequest")->result();
    }
    
    function getJoinrequestid() {
        return $this->joinrequestid;
    }

    function getJoinrequestname() {
        return $this->joinrequestname;
    }

    function getJoinrequestnick() {
        return $this->joinrequestnick;
    }

    function getJoinrequestcpf() {
        return $this->joinrequestcpf;
    }

    function getJoinrequestemail() {
        return $this->joinrequestemail;
    }

    function getJoinrequestreg() {
        return $this->joinrequestreg;
    }

    function setJoinrequestid($joinrequestid) {
        $this->joinrequestid = $joinrequestid;
    }

    function setJoinrequestname($joinrequestname) {
        $this->joinrequestname = $joinrequestname;
    }

    function setJoinrequestnick($joinrequestnick) {
        $this->joinrequestnick = $joinrequestnick;
    }

    function setJoinrequestcpf($joinrequestcpf) {
        $this->joinrequestcpf = $joinrequestcpf;
    }

    function setJoinrequestemail($joinrequestemail) {
        $this->joinrequestemail = $joinrequestemail;
    }

    function setJoinrequestreg($joinrequestreg) {
        $this->joinrequestreg = $joinrequestreg;
    }


    
}