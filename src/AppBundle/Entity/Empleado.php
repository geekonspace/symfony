<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Empleado
 *
 * @ORM\Table(name="empleado")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\EmpleadoRepository")
 */
class Empleado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255, nullable=false)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=255, nullable=false)
     */
    private $dni;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=false)
     * 
     */
    private $fechaNacimiento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_incorporacion", type="date", nullable=false)
     * 
     */
    private $fechaIncorporacion;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_electronico", type="string", length=100, nullable=false)
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     */
    private $correoElectronico;

    /**
     * @var string
     *
     * @ORM\Column(name="departamento", type="string", length=100, nullable=false)
     */
    private $departamento;

    

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
     * Set nombre
     *
     * @param string $nombre
     * @return Empleado
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Empleado
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set dni
     *
     * @param string $dni
     * @return Empleado
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string 
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return Empleado
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime 
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set fechaIncorporacion
     *
     * @param \DateTime $fechaIncorporacion
     * @return Empleado
     */
    public function setFechaIncorporacion($fechaIncorporacion)
    {
        $this->fechaIncorporacion = $fechaIncorporacion;

        return $this;
    }

    /**
     * Get fechaIncorporacion
     *
     * @return \DateTime 
     */
    public function getFechaIncorporacion()
    {
        return $this->fechaIncorporacion;
    }

    /**
     * Set correoElectronico
     *
     * @param string $correoElectronico
     * @return Empleado
     */
    public function setCorreoElectronico($correoElectronico)
    {
        $this->correoElectronico = $correoElectronico;

        return $this;
    }

    /**
     * Get correoElectronico
     *
     * @return string 
     */
    public function getCorreoElectronico()
    {
        return $this->correoElectronico;
    }

    /**
     * Set departamento
     *
     * @param string $departamento
     * @return Empleado
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return string 
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }
}
