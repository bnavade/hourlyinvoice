<?php
// src/InvoiceBundle/Entity/Invoice.php
namespace InvoiceBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
class Invoice {
    
    /**
     * @var string
     * @Assert\NotBlank
     */
    private $billTo;
    
    /**
     * @var string
     */
    private $date;
    
    /**
     * @var string
     * @Assert\NotBlank
     */
    private $description;
    
    /**
     * @var string
     * @Assert\NotBlank
     */
    private $hourlyPrice;
    
    /**
     * @var integer
     * @Assert\NotBlank
     */
    private $hours;
    
    /**
     * Set billTo
     * @param string $billTo
     * @return  Invoice
     */
    public function setBillTo($billTo) {
        $this->billTo = $billTo;
        //return $this;
    }
    
    /**
     * Get billTo
     * @return string
     */
    public function getBillTo() {
        return $this->billTo;
    }
    
     /**
     * Set date
     * @param string $date
     * @return  Invoice
     */
    public function setDate($date) {
        $this->date = $date;
    }
    
    /**
     * Get billTo
     * @return string
     */
    public function getDate() {
        return $this->billTo;
    }
    
    
    /**
     * Set description
     * @param string $description
     * @return  Invoice
     */
    public function setDescription($description) {
        $this->description = $description;
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
    }
    
    /**
     * Get hourlyPrice
     * @return Invoice
     */
    public function getHourlyPrice() {
        return $this->hourlyPrice;
    }
    
    /**
     * Set hours
     * @param string $hours
     * @return  Invoice
     */
    public function setHours($hours) {
        $this->hours = $hours;
    }
    
    /**
     * Get hours
     * @return string
     */
    public function getHours() {
        return $this->hours;
    }
}
