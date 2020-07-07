<?php
class OrderofserviceModel extends CI_Model{
    protected $osid;
    protected $osauthor;
    protected $osperformer;
    protected $ostitle;
    protected $osdescription;
    protected $osdate;
    protected $ospriority;
    protected $osterm;
    protected $osattachment;
    protected $osalert;
    protected $osstatus;
	
	function __construct() {
        parent::__construct();
        $this->setOsid(null);
        $this->setOsauthor(null);
        $this->setOsperformer(null);
        $this->setOstitle(null);
        $this->setOsdescription(null);
        $this->setOsdate(null);
        $this->setOspriority(null);
        $this->setOsterm(null);
        $this->setOsattachment(null);
        $this->setOsalert(null);
        $this->setOsstatus(null);
    }
	
	public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('orderofservice', $data)) {
                return true;
            }
        }
    }
	
    public function update($data = null) {
        if ($data != null) {
            $this->db->where("osid", $data['osid']);
            if ($this->db->update('orderofservice', $data)) {
                return true;
            }
        }
    }
	
    public function delete($osid) {
        if ($osid != null) {
            $this->db->where("osid", $osid);
            if ($this->db->delete("orderofservice")) {
                return true;
            }
        }
    }
	
    public function search($osid) {
        if ($osid != null) {
            $this->db->where("osid", $osid);
			return $this->db->get("orderofservice")->row_array();
        }
    }
	
    public function getos($osid) {
        if ($osid != null) {
			$this->db->select('*, sa.supernick AS supernickauthor, sp.supernick AS supernickperformer');
            $this->db->where("osid", $osid);
			$this->db->join('super as sa', 'sa.superid=osauthor', 'inner');
			$this->db->join('super as sp', 'sp.superid=osperformer', 'inner');
			$this->db->order_by("ospriority", "desc");
			return $this->db->get("orderofservice")->row_array();
        }
    }
	
	public function listing() {
        $this->db->select('*, sa.supernick AS supernickauthor, sp.supernick AS supernickperformer');
        $this->db->join('super as sa', 'sa.superid=osauthor', 'inner');
        $this->db->join('super as sp', 'sp.superid=osperformer', 'inner');
        $this->db->order_by("ospriority", "desc");
        return $this->db->get("orderofservice")->result();
    }
	
	public function getCount($superid) {
		$this->db->where("osauthor", $superid);
		$this->db->or_where("osperformer", $superid);
        return $this->db->get("orderofservice")->result();
    }
	
	public function mylisting($superid) {
        $this->db->select('*, sa.supernick AS supernickauthor, sp.supernick AS supernickperformer');
		$this->db->where("osauthor", $superid);
		$this->db->or_where("osperformer", $superid);
        $this->db->join('super as sa', 'sa.superid=osauthor', 'inner');
        $this->db->join('super as sp', 'sp.superid=osperformer', 'inner');
        $this->db->order_by("osstatus", "desc");
        $this->db->order_by("ospriority", "desc");
        $this->db->order_by("osdate", "asc");
        return $this->db->get("orderofservice", 10, 0)->result();
    }
	
	public function mypaged($superid, $paged) {
        $this->db->select('*, sa.supernick AS supernickauthor, sp.supernick AS supernickperformer');
		$this->db->where("osauthor", $superid);
		$this->db->or_where("osperformer", $superid);
        $this->db->join('super as sa', 'sa.superid=osauthor', 'inner');
        $this->db->join('super as sp', 'sp.superid=osperformer', 'inner');
        $this->db->order_by("osstatus", "desc");
        $this->db->order_by("ospriority", "desc");
        $this->db->order_by("osdate", "asc");
        return $this->db->get("orderofservice", 10, ($paged*10))->result();
    }
	
	public function searchmenu($superid, $searchlabel) {
        $this->db->select('*, sa.supernick AS supernickauthor, sp.supernick AS supernickperformer');
		$this->db->like("osid", $searchlabel);
		$this->db->or_like("ostitle", $searchlabel);
        $this->db->join('super as sa', 'sa.superid=osauthor', 'inner');
        $this->db->join('super as sp', 'sp.superid=osperformer', 'inner');
        $this->db->order_by("osstatus", "desc");
        $this->db->order_by("ospriority", "desc");
        $this->db->order_by("osdate", "asc");
        return $this->db->get("orderofservice")->result();
    }
	
	public function lastinsert() {
        return $this->getos($this->db->insert_id("orderofservice"));
    }
	
    function getOsid() {
        return $this->osid;
    }

    function getOsauthor() {
        return $this->osauthor;
    }

    function getOsperformer() {
        return $this->osperformer;
    }

    function getOstitle() {
        return $this->ostitle;
    }

    function getOsdescription() {
        return $this->osdescription;
    }

    function getOsdate() {
        return $this->osdate;
    }

    function getOspriority() {
        return $this->ospriority;
    }

    function getOsterm() {
        return $this->osterm;
    }

    function getOsattachment() {
        return $this->osattachment;
    }

    function getOsalert() {
        return $this->osalert;
    }

    function getOsstatus() {
        return $this->osstatus;
    }

    function setOsid($osid) {
        $this->osid = $osid;
    }

    function setOsauthor($osauthor) {
        $this->osauthor = $osauthor;
    }

    function setOsperformer($osperformer) {
        $this->osperformer = $osperformer;
    }

    function setOstitle($ostitle) {
        $this->ostitle = $ostitle;
    }

    function setOsdescription($osdescription) {
        $this->osdescription = $osdescription;
    }

    function setOsdate($osdate) {
        $this->osdate = $osdate;
    }

    function setOspriority($ospriority) {
        $this->ospriority = $ospriority;
    }

    function setOsterm($osterm) {
        $this->osterm = $osterm;
    }

    function setOsattachment($osattachment) {
        $this->osattachment = $osattachment;
    }

    function setOsalert($osalert) {
        $this->osalert = $osalert;
    }

    function setOsstatus($osstatus) {
        $this->osstatus = $osstatus;
    }


}