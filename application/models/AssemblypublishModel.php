<?php
class AssemblypublishModel extends CI_Model{
    protected $apid;
    protected $apassembly;
    protected $apyear;
    protected $apdate;
    protected $apedition;
    protected $apcontent;
    protected $apstatus;
	
	function __construct() {
        parent::__construct();
        $this->setApid(null);
        $this->setApassembly(null);
        $this->setApyear(null);
        $this->setApdate(null);
        $this->setApedition(null);
        $this->setApcontent(null);
        $this->setApstatus(null);
    }
	
	public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('assemblypublish', $data)) {
                return true;
            }
        }
    }
	
    public function search($apassemblyid) {
        if ($apassemblyid != null) {
            $this->db->where("apassembly", $apassemblyid);
			return $this->db->get("assemblypublish")->row_array();
        }
    }
    
    function getApid() {
        return $this->apid;
    }

    function getApassembly() {
        return $this->apassembly;
    }

    function getApyear() {
        return $this->apyear;
    }

    function getApdate() {
        return $this->apdate;
    }

    function getApedition() {
        return $this->apedition;
    }

    function getApcontent() {
        return $this->apcontent;
    }

    function getApstatus() {
        return $this->apstatus;
    }

    function setApid($apid) {
        $this->apid = $apid;
    }

    function setApassembly($apassembly) {
        $this->apassembly = $apassembly;
    }

    function setApyear($apyear) {
        $this->apyear = $apyear;
    }

    function setApdate($apdate) {
        $this->apdate = $apdate;
    }

    function setApedition($apedition) {
        $this->apedition = $apedition;
    }

    function setApcontent($apcontent) {
        $this->apcontent = $apcontent;
    }

    function setApstatus($apstatus) {
        $this->apstatus = $apstatus;
    }


}