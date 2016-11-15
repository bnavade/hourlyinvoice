<?php
// src/InvoiceBundle/Entity/Invoice.php
namespace InvoiceBundle\Entity;

class Invoice {
    
    /**
     * @var string
     */
    private $billTo;
    /**
     * @var string
     */
    private $date;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $hourlyPrice;
    /**
     * @var integer
     */
    private $hours;
    
    /**
     * 
     */
    public function __construct() {
        $this->date = new \DateTime();
    }
    
    /**
     * Set billTo
     * @param string $billTo
     * @return  Invoice
     */
    public function setBillTo($billTo) {
        $this->billTo = $billTo;
        return $this;
    }
    
    /**
     * Get billTo
     * @return string
     */
    public function getBillTo() {
        return $this->billTo;
    }
    
    /**
     * Set description
     * @param string $description
     * @return  Invoice
     */
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }
    
    /**
     * Get description
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }
    
    /**
     * Set hourlyPrice
     * @param string $hourlyPrice
     * @return  Invoice
     */
    public function setHourlyPrice($hourlyPrice) {
        $this->hourlyPrice = $hourlyPrice;
        return $this;
    }
    
    /**
     * Get hourlyPrice
     * @return Invoice
     */
    public function getHourlyPrice() {
        return $this->getHourlyPrice;
    }
    
    /**
     * Set hours
     * @param string $hours
     * @return  Invoice
     */
    public function setHours($hours) {
        $this->hours = $hours;
        return $this;
    }
    
    /**
     * Get hours
     * @return string
     */
    public function getHours() {
        return $this->hours;
    }
}
