<?php
class SuperModel extends CI_Model{
	
    protected $superid;
    protected $supername;
    protected $supernick;
    protected $superemail;
    protected $superpassword;
    protected $superrole;
    protected $superstatus;


    function __construct() {
        parent::__construct();
        $this->setSuperid(null);
        $this->setSupername(null);
        $this->setSupernick(null);
        $this->setSuperemail(null);
        $this->setSuperpassword(null);
        $this->setSuperrole(null);
        $this->setSuperstatus(null);
    }
    
    public function search($aux){
		return true;
    }
	
	public function listing() {
        $this->db->select('*');
        $this->db->order_by("superrole", "desc");
        return $this->db->get("super")->result();
    }
	
    function getSuperid() {
        return $this->superid;
    }
    function getSupername() {
        return $this->supername;
    }
    function getSupernick() {
        return $this->supernick;
    }
    function getSuperemail() {
        return $this->superemail;
    }
    function getSuperpassword() {
        return $this->superpassword;
    }
    function getSuperrole()	{
        return $this->superrole;
    }
    function getSuperstatus() {
        return $this->superstatus;
    }

    function setSuperid($superid) {
        $this->superid = $superid;
    }
    function setSupername($supername) {
        $this->supername = $supername;
    }
    function setSupernick($supernick) {
        $this->supernick = $supernick;
    }
    function setSuperemail($superemail) {
        $this->superemail = $superemail;
    }
    function setSuperpassword($superpassword) {
        $this->superpassword = $superpassword;
    }
    function setSuperrole($superrole) {
        $this->superrole = $superrole;
    }
    function setSuperstatus($superstatus) {
        $this->superstatus = $superstatus;
    }
	
}