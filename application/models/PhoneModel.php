<?php
class PhoneModel extends CI_Model{
    
    protected $phoneid;
    protected $phoneuser;
    protected $phonenumber;
    protected $phonestatus;
    
    function __construct() {
        parent::__construct();
        $this->setPhoneid(null);
        $this->setPhoneuser(null);
        $this->setPhonenumber(null);
        $this->setPhonestatus(null);
    }
    
    function getPhoneid() {
        return $this->phoneid;
    }

    function getPhoneuser() {
        return $this->phoneuser;
    }

    function getPhonenumber() {
        return $this->phonenumber;
    }

    function getPhonestatus() {
        return $this->phonestatus;
    }

    function setPhoneid($phoneid) {
        $this->phoneid = $phoneid;
    }

    function setPhoneuser($phoneuser) {
        $this->phoneuser = $phoneuser;
    }

    function setPhonenumber($phonenumber) {
        $this->phonenumber = $phonenumber;
    }

    function setPhonestatus($phonestatus) {
        $this->phonestatus = $phonestatus;
    }


}