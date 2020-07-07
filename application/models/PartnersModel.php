<?php
class PartnersModel extends CI_Model{
    protected $partnerid;
    protected $partnername;
    protected $partnerslug;
    protected $partnerlogo;
    protected $partnerdescription;
    protected $partnerstatus;
	
	function __construct() {
        parent::__construct();
        $this->setPartnerid(null);
        $this->setPartnername(null);
        $this->setPartnerslug(null);
        $this->setPartnerlogo(null);
        $this->setPartnerdescription(null);
        $this->setPartnerstatus(null);
    }
	
	public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('partner', $data)) {
                return true;
            }
        }
    }
	
    public function update($data = null) {
        if ($data != null) {
            $this->db->where("partnerid", $data['partnerid']);
            if ($this->db->update('partner', $data)) {
                return true;
            }
        }
    }
	
    public function delete($partnerid) {
        if ($partnerid != null) {
            $this->db->where("partnerid", $partnerid);
            if ($this->db->delete("partner")) {
                return true;
            }
        }
    }
	
    public function search($partnerid) {
        if ($partnerid != null) {
            $this->db->where("partnerid", $partnerid);
			return $this->db->get("partner")->row_array();
        }
    }
    
    public function listing() {
        $this->db->select('*');
        $this->db->order_by("partnername", "asc");
        return $this->db->get("partner")->result();
    }
    
    public function listactive() {
        $this->db->where("partnerstatus", 1);
        $this->db->order_by("partnername", "asc");
        return $this->db->get("partner")->result();
    }
    
    function getPartnerid() {
        return $this->partnerid;
    }

    function getPartnername() {
        return $this->partnername;
    }

    function getPartnerslug() {
        return $this->partnerslug;
    }

    function getPartnerlogo() {
        return $this->partnerlogo;
    }

    function getPartnerdescription() {
        return $this->partnerdescription;
    }

    function getPartnerstatus() {
        return $this->partnerstatus;
    }

    function setPartnerid($partnerid) {
        $this->partnerid = $partnerid;
    }

    function setPartnername($partnername) {
        $this->partnername = $partnername;
    }

    function setPartnerslug($partnerslug) {
        $this->partnerslug = $partnerslug;
    }

    function setPartnerlogo($partnerlogo) {
        $this->partnerlogo = $partnerlogo;
    }

    function setPartnerdescription($partnerdescription) {
        $this->partnerdescription = $partnerdescription;
    }

    function setPartnerstatus($partnerstatus) {
        $this->partnerstatus = $partnerstatus;
    }


}