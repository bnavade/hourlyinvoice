<?php
// src/AppBundle/Entity/Invoice.php
namespace AppBundle\Entity;

class Invoice {
    
    protected $billTo;
    protected $date;
    protected $description;
    protected $hourlyPrice;
    protected $hours;
    
    public function getBillTo() {
        return $this->billTo;
    }
    
    public function setBillTo($billTo) {
        $this->billTo = $billTo;
    }

    public function getDate() {
        return $this->date;
    }
    
    public function setDate($date) {
        $this->date = $date;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function getHourlyPrice() {
        return $this->getHourlyPrice;
    }
    
    public function setHourlyPrice($hourlyPrice) {
        $this->hourlyPrice = $hourlyPrice;
    }
    
    public function getHours() {
        return $this->hours;
    }
    
    public function setHours($hours) {
        $this->hours = $hours;
    }
    
}
