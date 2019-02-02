<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="item")
 */
class Item {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, unique=true, nullable=false)
     */
    private $name;
    
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $sell_in; // denotes the number of days we have to sell the item

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $quality; // denotes how valuable the item is

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of sell_in
     */ 
    public function getSell_in()
    {
        return $this->sell_in;
    }

    /**
     * Set the value of sell_in
     *
     * @return  self
     */ 
    public function setSell_in($sell_in)
    {
        $this->sell_in = $sell_in;

        return $this;
    }

    /**
     * Get the value of quality
     */ 
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * Set the value of quality
     *
     * @return  self
     */ 
    public function setQuality($quality)
    {
        $this->quality = $quality;

        return $this;
    }
}