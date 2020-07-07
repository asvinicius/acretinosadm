<?php
class RequestModel extends CI_Model{
    protected $requestid;
    protected $requestauthor;
    protected $requesttitle;
    protected $requestdescription;
    protected $requestdate;
    protected $requestterm;
    protected $requestattachment;
    protected $requeststatus;
    
    function getRequestid() {
        return $this->requestid;
    }

    function getRequestauthor() {
        return $this->requestauthor;
    }

    function getRequesttitle() {
        return $this->requesttitle;
    }

    function getRequestdescription() {
        return $this->requestdescription;
    }

    function getRequestdate() {
        return $this->requestdate;
    }

    function getRequestterm() {
        return $this->requestterm;
    }

    function getRequestattachment() {
        return $this->requestattachment;
    }

    function getRequeststatus() {
        return $this->requeststatus;
    }

    function setRequestid($requestid) {
        $this->requestid = $requestid;
    }

    function setRequestauthor($requestauthor) {
        $this->requestauthor = $requestauthor;
    }

    function setRequesttitle($requesttitle) {
        $this->requesttitle = $requesttitle;
    }

    function setRequestdescription($requestdescription) {
        $this->requestdescription = $requestdescription;
    }

    function setRequestdate($requestdate) {
        $this->requestdate = $requestdate;
    }

    function setRequestterm($requestterm) {
        $this->requestterm = $requestterm;
    }

    function setRequestattachment($requestattachment) {
        $this->requestattachment = $requestattachment;
    }

    function setRequeststatus($requeststatus) {
        $this->requeststatus = $requeststatus;
    }


}