<?php
// src/InvoiceBundle/Entity/Invoice.php
namespace InvoiceBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="invoice")
 */
class Invoice {
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank
     */
    private $billTo;
    
    /**
     * @ORM\Column(type="date", length=20)
     */
    private $date;
    
    /**
     * @ORM\Column(type="text", length=100)
     * @Assert\NotBlank
     */
    private $description;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\NotBlank
     */
    private $hourlyPrice;
    
    /**
     * @ORM\Column(type="integer", length=20)
     * @Assert\NotBlank
     */
    private $hours;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId(){
        return $this->id;
    }

    /**
     * Set billTo
     *
     * @param string $billTo
     *
     * @return Invoice
     */
    public function setBillTo($billTo){
        $this->billTo = $billTo;

        return $this;
    }

    /**
     * Get billTo
     *
     * @return string
     */
    public function getBillTo(){
        return $this->billTo;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Invoice
     */
    public function setDate(\DateTime $date = null){
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate(){
        return $this->date;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Invoice
     */
    public function setDescription($description){
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription(){
        return $this->description;
    }

    /**
     * Set hourlyPrice
     *
     * @param string $hourlyPrice
     *
     * @return Invoice
     */
    public function setHourlyPrice($hourlyPrice){
        $this->hourlyPrice = $hourlyPrice;

        return $this;
    }

    /**
     * Get hourlyPrice
     *
     * @return string
     */
    public function getHourlyPrice(){
        return $this->hourlyPrice;
    }

    /**
     * Set hours
     *
     * @param integer $hours
     *
     * @return Invoice
     */
    public function setHours($hours){
        $this->hours = $hours;

        return $this;
    }

    /**
     * Get hours
     *
     * @return integer
     */
    public function getHours(){
        return $this->hours;
    }
    
        /**
     * Set datetime
     * @param datetime $date
     * @return Invoice
     */
    //public function setDate(){
    //    $this->date = new \DateTime("now");
//
    //    return $this;
    //}

    /**
     * Get datetime
     * @return Invoice
     */
    //public function getDate(){
    //    return $this->date;
    //}
}
