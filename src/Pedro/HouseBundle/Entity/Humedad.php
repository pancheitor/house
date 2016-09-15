<?php

namespace Pedro\HouseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="humedad")
 */

class Humedad
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="integer")
     */
    protected $sensor;
    /**
     * @ORM\Column(type="decimal")
     */
    protected $valor;
    /**
    * @ORM\Column(type="datetime")
    */
    protected $created;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sensor
     *
     * @param integer $sensor
     * @return Humedad
     */
    public function setSensor($sensor)
    {
        $this->sensor = $sensor;

        return $this;
    }

    /**
     * Get sensor
     *
     * @return integer 
     */
    public function getSensor()
    {
        return $this->sensor;
    }

    /**
     * Set valor
     *
     * @param string $valor
     * @return Humedad
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Humedad
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }
}
