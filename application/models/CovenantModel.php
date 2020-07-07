<?php
class CovenantModel extends CI_Model{
    protected $covenantid;
    protected $covenantpartner;
    protected $covenantname;
    protected $covenantype;
    protected $covenantdescription;
    protected $covenantstatus;
	
	function __construct() {
        parent::__construct();
        $this->setCovenantid(null);
        $this->setCovenantpartner(null);
        $this->setCovenantname(null);
        $this->setCovenantype(null);
        $this->setCovenantdescription(null);
        $this->setCovenantstatus(null);
    }
	
	public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('covenant', $data)) {
                return true;
            }
        }
    }
	
    public function update($data = null) {
        if ($data != null) {
            $this->db->where("covenantid", $data['covenantid']);
            if ($this->db->update('covenant', $data)) {
                return true;
            }
        }
    }
	
    public function delete($covenantid) {
        if ($covenantid != null) {
            $this->db->where("covenantid", $covenantid);
            if ($this->db->delete("covenant")) {
                return true;
            }
        }
    }
	
    public function search($covenantid) {
        if ($covenantid != null) {
            $this->db->where("covenantid", $covenantid);
			return $this->db->get("covenant")->row_array();
        }
    }
	
    public function searchdetail($covenantid) {
        if ($covenantid != null) {
            $this->db->where("covenantid", $covenantid);
			$this->db->join('partner', 'partnerid=covenantpartner', 'inner');
			return $this->db->get("covenant")->row_array();
        }
    }
    
    public function listing() {
        $this->db->select('*');
        $this->db->order_by("covenantid", "asc");
        return $this->db->get("covenant")->result();
    }
    
    public function listingcovenant() {
        $this->db->select('*');
		$this->db->join('partner', 'partnerid=covenantpartner', 'inner');
        $this->db->order_by("covenantid", "asc");
        return $this->db->get("covenant")->result();
    }
    
    public function listactive() {
        $this->db->where("covenantstatus", 1);
		$this->db->join('partner', 'partnerid=covenantpartner', 'inner');
        $this->db->order_by("covenantid", "asc");
        return $this->db->get("covenant")->result();
    }
    
    function getCovenantid() {
        return $this->covenantid;
    }

    function getCovenantpartner() {
        return $this->covenantpartner;
    }

    function getCovenantname() {
        return $this->covenantname;
    }

    function getCovenantype() {
        return $this->covenantype;
    }

    function getCovenantdescription() {
        return $this->covenantdescription;
    }

    function getCovenantstatus() {
        return $this->covenantstatus;
    }

    function setCovenantid($covenantid) {
        $this->covenantid = $covenantid;
    }

    function setCovenantpartner($covenantpartner) {
        $this->covenantpartner = $covenantpartner;
    }

    function setCovenantname($covenantname) {
        $this->covenantname = $covenantname;
    }

    function setCovenantype($covenantype) {
        $this->covenantype = $covenantype;
    }

    function setCovenantdescription($covenantdescription) {
        $this->covenantdescription = $covenantdescription;
    }

    function setCovenantstatus($covenantstatus) {
        $this->covenantstatus = $covenantstatus;
    }


}