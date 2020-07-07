<?php
class AddressModel extends CI_Model{
    
    protected $addressid;
    protected $addressuser;
    protected $addressstreet;
    protected $addressnumber;
    protected $addresscep;
    protected $addressdistrict;
    protected $addresscounty;
    protected $addressstate;
    protected $addresscomplement;
    
    function __construct() {
        parent::__construct();
        $this->setAddressid(null);
        $this->setAddressuser(null);
        $this->setAddressstreet(null);
        $this->setAddressnumber(null);
        $this->setAddresscep(null);
        $this->setAddressdistrict(null);
        $this->setAddresscounty(null);
        $this->setAddressstate(null);
        $this->setAddresscomplement(null);
    }
    
    function getAddressid() {
        return $this->addressid;
    }

    function getAddressuser() {
        return $this->addressuser;
    }

    function getAddressstreet() {
        return $this->addressstreet;
    }

    function getAddressnumber() {
        return $this->addressnumber;
    }

    function getAddresscep() {
        return $this->addresscep;
    }

    function getAddressdistrict() {
        return $this->addressdistrict;
    }

    function getAddresscounty() {
        return $this->addresscounty;
    }

    function getAddressstate() {
        return $this->addressstate;
    }

    function getAddresscomplement() {
        return $this->addresscomplement;
    }

    function setAddressid($addressid) {
        $this->addressid = $addressid;
    }

    function setAddressuser($addressuser) {
        $this->addressuser = $addressuser;
    }

    function setAddressstreet($addressstreet) {
        $this->addressstreet = $addressstreet;
    }

    function setAddressnumber($addressnumber) {
        $this->addressnumber = $addressnumber;
    }

    function setAddresscep($addresscep) {
        $this->addresscep = $addresscep;
    }

    function setAddressdistrict($addressdistrict) {
        $this->addressdistrict = $addressdistrict;
    }

    function setAddresscounty($addresscounty) {
        $this->addresscounty = $addresscounty;
    }

    function setAddressstate($addressstate) {
        $this->addressstate = $addressstate;
    }

    function setAddresscomplement($addresscomplement) {
        $this->addresscomplement = $addresscomplement;
    }
}