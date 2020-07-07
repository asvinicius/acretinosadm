<?php
class NotifyModel extends CI_Model{
    protected $notifyid;
    protected $notifysuper;
    protected $notifydescription;
    protected $notifylink;
    protected $notifystatus;
	
	function __construct() {
        parent::__construct();
        $this->setNotifyid(null);
        $this->setNotifysuper(null);
        $this->setNotifydescription(null);
        $this->setNotifylink(null);
        $this->setNotifystatus(null);
    }
	
	public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('notify', $data)) {
                return true;
            }
        }
    }
    public function update($data = null) {
        if ($data != null) {
            $this->db->where("notifyid", $data['notifyid']);
            if ($this->db->update('notify', $data)) {
                return true;
            }
        }
    }
    public function delete($notifyid) {
        if ($notifyid != null) {
            $this->db->where("notifyid", $notifyid);
            if ($this->db->delete("notify")) {
                return true;
            }
        }
    }
    
    public function listing($super) {
        $this->db->where("notifysuper", $super);
        $this->db->order_by("notifystatus", "desc");
        $this->db->order_by("notifyid", "desc");
        return $this->db->get("notify", 10, 0)->result();
    }
    
    public function mypaged($super, $paged) {
        $this->db->where("notifysuper", $super);
        $this->db->order_by("notifystatus", "desc");
        $this->db->order_by("notifyid", "desc");
        return $this->db->get("notify", 10, ($paged*10))->result();
    }
    
    public function getCount($super) {
        $this->db->where("notifysuper", $super);
        $this->db->order_by("notifystatus", "desc");
        $this->db->order_by("notifyid", "desc");
        return $this->db->get("notify")->result();
    }
    
    public function unread($super) {
        $this->db->where("notifystatus", 1);
        $this->db->where("notifysuper", $super);
        $this->db->order_by("notifyid", "asc");
        return $this->db->get("notify")->result();
    }
    
    public function search($notifyid) {
        $this->db->where("notifyid", $notifyid);
        return $this->db->get("notify")->row_array();
    }
    
    function getNotifyid() {
        return $this->notifyid;
    }

    function getNotifysuper() {
        return $this->notifysuper;
    }

    function getNotifydescription() {
        return $this->notifydescription;
    }

    function getNotifylink() {
        return $this->notifylink;
    }

    function getNotifystatus() {
        return $this->notifystatus;
    }

    function setNotifyid($notifyid) {
        $this->notifyid = $notifyid;
    }

    function setNotifysuper($notifysuper) {
        $this->notifysuper = $notifysuper;
    }

    function setNotifydescription($notifydescription) {
        $this->notifydescription = $notifydescription;
    }

    function setNotifylink($notifylink) {
        $this->notifylink = $notifylink;
    }

    function setNotifystatus($notifystatus) {
        $this->notifystatus = $notifystatus;
    }


}