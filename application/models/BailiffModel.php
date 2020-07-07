<?php
class BailiffModel extends CI_Model{
    
    protected $bailiffid;
    protected $bailiffuser;
    protected $bailiffnacionality;
    protected $bailiffnatcounty;
    protected $bailiffnatstate;
    protected $bailiffbirth;
    protected $bailiffrg;
    protected $bailiffmaritalstatus;
    protected $bailiffschooling;
    protected $bailiffvoterreg;
    protected $bailiffvoterzone;
    protected $bailiffvotersection;
    protected $bailiffregistration;
    protected $bailiffoffice;
    protected $bailiffdesignated;
    protected $bailiffjudicialdistrict;
    protected $bailifftrustposition;
    protected $bailiffattachment;
    
    function __construct() {
        parent::__construct();
        $this->setBailiffid(null);
        $this->setBailiffuser(null);
        $this->setBailiffnacionality(null);
        $this->setBailiffnatcounty(null);
        $this->setBailiffnatstate(null);
        $this->setBailiffbirth(null);
        $this->setBailiffrg(null);
        $this->setBailiffmaritalstatus(null);
        $this->setBailiffschooling(null);
        $this->setBailiffvoterreg(null);
        $this->setBailiffvoterzone(null);
        $this->setBailiffvotersection(null);
        $this->setBailiffregistration(null);
        $this->setBailiffoffice(null);
        $this->setBailiffdesignated(null);
        $this->setBailiffjudicialdistrict(null);
        $this->setBailifftrustposition(null);
        $this->setBailiffattachment(null);
    }
    
    function getBailiffid() {
        return $this->bailiffid;
    }

    function getBailiffuser() {
        return $this->bailiffuser;
    }

    function getBailiffnacionality() {
        return $this->bailiffnacionality;
    }

    function getBailiffnatcounty() {
        return $this->bailiffnatcounty;
    }

    function getBailiffnatstate() {
        return $this->bailiffnatstate;
    }

    function getBailiffbirth() {
        return $this->bailiffbirth;
    }

    function getBailiffrg() {
        return $this->bailiffrg;
    }

    function getBailiffmaritalstatus() {
        return $this->bailiffmaritalstatus;
    }

    function getBailiffschooling() {
        return $this->bailiffschooling;
    }

    function getBailiffvoterreg() {
        return $this->bailiffvoterreg;
    }

    function getBailiffvoterzone() {
        return $this->bailiffvoterzone;
    }

    function getBailiffvotersection() {
        return $this->bailiffvotersection;
    }

    function getBailiffregistration() {
        return $this->bailiffregistration;
    }

    function getBailiffoffice() {
        return $this->bailiffoffice;
    }

    function getBailiffdesignated() {
        return $this->bailiffdesignated;
    }

    function getBailiffjudicialdistrict() {
        return $this->bailiffjudicialdistrict;
    }

    function getBailifftrustposition() {
        return $this->bailifftrustposition;
    }

    function getBailiffattachment() {
        return $this->bailiffattachment;
    }

    function setBailiffid($bailiffid) {
        $this->bailiffid = $bailiffid;
    }

    function setBailiffuser($bailiffuser) {
        $this->bailiffuser = $bailiffuser;
    }

    function setBailiffnacionality($bailiffnacionality) {
        $this->bailiffnacionality = $bailiffnacionality;
    }

    function setBailiffnatcounty($bailiffnatcounty) {
        $this->bailiffnatcounty = $bailiffnatcounty;
    }

    function setBailiffnatstate($bailiffnatstate) {
        $this->bailiffnatstate = $bailiffnatstate;
    }

    function setBailiffbirth($bailiffbirth) {
        $this->bailiffbirth = $bailiffbirth;
    }

    function setBailiffrg($bailiffrg) {
        $this->bailiffrg = $bailiffrg;
    }

    function setBailiffmaritalstatus($bailiffmaritalstatus) {
        $this->bailiffmaritalstatus = $bailiffmaritalstatus;
    }

    function setBailiffschooling($bailiffschooling) {
        $this->bailiffschooling = $bailiffschooling;
    }

    function setBailiffvoterreg($bailiffvoterreg) {
        $this->bailiffvoterreg = $bailiffvoterreg;
    }

    function setBailiffvoterzone($bailiffvoterzone) {
        $this->bailiffvoterzone = $bailiffvoterzone;
    }

    function setBailiffvotersection($bailiffvotersection) {
        $this->bailiffvotersection = $bailiffvotersection;
    }

    function setBailiffregistration($bailiffregistration) {
        $this->bailiffregistration = $bailiffregistration;
    }

    function setBailiffoffice($bailiffoffice) {
        $this->bailiffoffice = $bailiffoffice;
    }

    function setBailiffdesignated($bailiffdesignated) {
        $this->bailiffdesignated = $bailiffdesignated;
    }

    function setBailiffjudicialdistrict($bailiffjudicialdistrict) {
        $this->bailiffjudicialdistrict = $bailiffjudicialdistrict;
    }

    function setBailifftrustposition($bailifftrustposition) {
        $this->bailifftrustposition = $bailifftrustposition;
    }

    function setBailiffattachment($bailiffattachment) {
        $this->bailiffattachment = $bailiffattachment;
    }


}