<?php
class ModelsModel extends CI_Model{
    protected $modelsid;
    protected $modelsname;
    protected $modelsattachment;
    protected $modelsstatus;
	
	function __construct() {
        parent::__construct();
        $this->setModelsid(null);
        $this->setModelsname(null);
        $this->setModelsattachment(null);
        $this->setModelsstatus(null);
    }
	
	public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('models', $data)) {
                return true;
            }
        }
    }
	
    public function update($data = null) {
        if ($data != null) {
            $this->db->where("modelsid", $data['modelsid']);
            if ($this->db->update('models', $data)) {
                return true;
            }
        }
    }
	
    public function delete($modelsid) {
        if ($modelsid != null) {
            $this->db->where("modelsid", $modelsid);
            if ($this->db->delete("models")) {
                return true;
            }
        }
    }
	
    public function search($modelsid) {
        if ($modelsid != null) {
            $this->db->where("modelsid", $modelsid);
			return $this->db->get("models")->row_array();
        }
    }
    
    public function listing() {
        $this->db->select('*');
        $this->db->order_by("modelsname", "asc");
        return $this->db->get("models")->result();
    }
    
    function getModelsid() {
        return $this->modelsid;
    }

    function getModelsname() {
        return $this->modelsname;
    }

    function getModelsattachment() {
        return $this->modelsattachment;
    }

    function getModelsstatus() {
        return $this->modelsstatus;
    }

    function setModelsid($modelsid) {
        $this->modelsid = $modelsid;
    }

    function setModelsname($modelsname) {
        $this->modelsname = $modelsname;
    }

    function setModelsattachment($modelsattachment) {
        $this->modelsattachment = $modelsattachment;
    }

    function setModelsstatus($modelsstatus) {
        $this->modelsstatus = $modelsstatus;
    }


}