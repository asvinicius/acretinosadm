<?php
class AssemblyModel extends CI_Model{
    protected $assemblyid;
    protected $assemblytopic;
    protected $assemblydate;
    protected $assemblyplace;
    protected $assemblycallnotice;
    protected $assemblyminutes;
    protected $assemblyattending;
    protected $assemblystatus;
    
    function __construct() {
        parent::__construct();
        $this->setAssemblyid(null);
        $this->setAssemblytopic(null);
        $this->setAssemblydate(null);
        $this->setAssemblyplace(null);
        $this->setAssemblycallnotice(null);
        $this->setAssemblyminutes(null);
        $this->setAssemblyattending(null);
        $this->setAssemblystatus(null);
    }
	
	public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('assembly', $data)) {
                return true;
            }
        }
    }
	
    public function update($data = null) {
        if ($data != null) {
            $this->db->where("assemblyid", $data['assemblyid']);
            if ($this->db->update('assembly', $data)) {
                return true;
            }
        }
    }
	
    public function delete($assemblyid) {
        if ($assemblyid != null) {
            $this->db->where("assemblyid", $assemblyid);
            if ($this->db->delete("assembly")) {
                return true;
            }
        }
    }
	
    public function search($assemblyid) {
        if ($assemblyid != null) {
            $this->db->where("assemblyid", $assemblyid);
			return $this->db->get("assembly")->row_array();
        }
    }
    
    public function listing() {
        $this->db->select('*');
        $this->db->order_by("assemblydate", "asc");
        return $this->db->get("assembly", 10, 0)->result();
    }
    
    public function mypaged($paged) {
        $this->db->select('*');
        $this->db->order_by("assemblydate", "asc");
        return $this->db->get("assembly", 10, ($paged*10))->result();
    }
	
	public function searchmenu($searchlabel) {
        $this->db->like("assemblytopic", $searchlabel);
        $this->db->or_like("assemblyid", $searchlabel);
        $this->db->order_by("assemblydate", "asc");
        return $this->db->get("assembly")->result();
    }
    
    function getAssemblyid() {
        return $this->assemblyid;
    }

    function getAssemblytopic() {
        return $this->assemblytopic;
    }

    function getAssemblydate() {
        return $this->assemblydate;
    }

    function getAssemblyplace() {
        return $this->assemblyplace;
    }

    function getAssemblycallnotice() {
        return $this->assemblycallnotice;
    }

    function getAssemblyminutes() {
        return $this->assemblyminutes;
    }

    function getAssemblyattending() {
        return $this->assemblyattending;
    }

    function getAssemblystatus() {
        return $this->assemblystatus;
    }

    function setAssemblyid($assemblyid) {
        $this->assemblyid = $assemblyid;
    }

    function setAssemblytopic($assemblytopic) {
        $this->assemblytopic = $assemblytopic;
    }

    function setAssemblydate($assemblydate) {
        $this->assemblydate = $assemblydate;
    }

    function setAssemblyplace($assemblyplace) {
        $this->assemblyplace = $assemblyplace;
    }

    function setAssemblycallnotice($assemblycallnotice) {
        $this->assemblycallnotice = $assemblycallnotice;
    }

    function setAssemblyminutes($assemblyminutes) {
        $this->assemblyminutes = $assemblyminutes;
    }

    function setAssemblyattending($assemblyattending) {
        $this->assemblyattending = $assemblyattending;
    }

    function setAssemblystatus($assemblystatus) {
        $this->assemblystatus = $assemblystatus;
    }


}