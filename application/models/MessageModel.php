<?php
class MessageModel extends CI_Model{
    protected $messageid;
    protected $messagedestinity;
    protected $messagetitle;
    protected $messagedescription;
    protected $messagedate;
    protected $messagestatus;
    
    function getMessageid() {
        return $this->messageid;
    }

    function getMessagedestinity() {
        return $this->messagedestinity;
    }

    function getMessagetitle() {
        return $this->messagetitle;
    }

    function getMessagedescription() {
        return $this->messagedescription;
    }

    function getMessagedate() {
        return $this->messagedate;
    }

    function getMessagestatus() {
        return $this->messagestatus;
    }

    function setMessageid($messageid) {
        $this->messageid = $messageid;
    }

    function setMessagedestinity($messagedestinity) {
        $this->messagedestinity = $messagedestinity;
    }

    function setMessagetitle($messagetitle) {
        $this->messagetitle = $messagetitle;
    }

    function setMessagedescription($messagedescription) {
        $this->messagedescription = $messagedescription;
    }

    function setMessagedate($messagedate) {
        $this->messagedate = $messagedate;
    }

    function setMessagestatus($messagestatus) {
        $this->messagestatus = $messagestatus;
    }


}