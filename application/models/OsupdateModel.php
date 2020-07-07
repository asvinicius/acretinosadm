<?php
class OsupdateModel extends CI_Model{
    protected $osupdateid;
    protected $osupdatereference;
    protected $osupdateauthor;
    protected $osupdatedescription;
    protected $osupdateattachment;
    protected $osupdatedate;
    protected $osupdatetype;
    protected $osupdatestatus;
	
	function __construct() {
        parent::__construct();
        $this->setOsupdateid(null);
        $this->setOsupdatereference(null);
        $this->setOsupdateauthor(null);
        $this->setOsupdatedescription(null);
        $this->setOsupdateattachment(null);
        $this->setOsupdatedate(null);
        $this->setOsupdatetype(null);
        $this->setOsupdatestatus(null);
    }
	
	public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('osupdate', $data)) {
                return true;
            }
        }
    }
	
    public function update($data = null) {
        if ($data != null) {
            $this->db->where("osupdateid", $data['osupdateid']);
            if ($this->db->update('osupdate', $data)) {
                return true;
            }
        }
    }
	
    public function delete($osupdateid) {
        if ($osupdateid != null) {
            $this->db->where("osupdateid", $osupdateid);
            if ($this->db->delete("osupdate")) {
                return true;
            }
        }
    }
	
	public function listing($osid) {
		$this->db->where("osupdatereference", $osid);
        $this->db->join('super as sa', 'sa.superid=osupdateauthor', 'inner');
        $this->db->order_by("osupdateid", "asc");
        return $this->db->get("osupdate")->result();
    }
    
    function getOsupdateid() {
        return $this->osupdateid;
    }

    function getOsupdatereference() {
        return $this->osupdatereference;
    }

    function getOsupdateauthor() {
        return $this->osupdateauthor;
    }

    function getOsupdatedescription() {
        return $this->osupdatedescription;
    }

    function getOsupdateattachment() {
        return $this->osupdateattachment;
    }

    function getOsupdatedate() {
        return $this->osupdatedate;
    }

    function getOsupdatetype() {
        return $this->osupdatetype;
    }

    function getOsupdatestatus() {
        return $this->osupdatestatus;
    }

    function setOsupdateid($osupdateid) {
        $this->osupdateid = $osupdateid;
    }

    function setOsupdatereference($osupdatereference) {
        $this->osupdatereference = $osupdatereference;
    }

    function setOsupdateauthor($osupdateauthor) {
        $this->osupdateauthor = $osupdateauthor;
    }

    function setOsupdatedescription($osupdatedescription) {
        $this->osupdatedescription = $osupdatedescription;
    }

    function setOsupdateattachment($osupdateattachment) {
        $this->osupdateattachment = $osupdateattachment;
    }

    function setOsupdatedate($osupdatedate) {
        $this->osupdatedate = $osupdatedate;
    }

    function setOsupdatetype($osupdatetype) {
        $this->osupdatetype = $osupdatetype;
    }

    function setOsupdatestatus($osupdatestatus) {
        $this->osupdatestatus = $osupdatestatus;
    }


}