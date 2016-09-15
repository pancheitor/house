<?php

namespace Pedro\HouseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="temperatura")
 */

class Temperatura
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
     * @return Temperatura
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
     * @return Temperatura
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
     * @return Temperatura
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
