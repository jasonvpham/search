<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Properties
 *
 * @ORM\Table(name="properties")
 * @ORM\Entity(repositoryClass="App\Repository\PropertiesRepository")
 */
class Properties
{

    /**
     * @var int
     *
     * @ORM\Column(name="__pk", type="integer", nullable=false,
     *                          options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pk;

    /**
     * @var int|null
     *
     * @ORM\Column(name="_fk_location", type="integer", nullable=true,
     *                                  options={"unsigned"=true})
     */
    private $fkLocation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="property_name", type="string", length=255,
     *                                   nullable=true)
     */
    private $propertyName;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="near_beach", type="boolean", nullable=true)
     */
    private $nearBeach;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="accepts_pets", type="boolean", nullable=true)
     */
    private $acceptsPets;

    /**
     * @var integer|null
     *
     * @ORM\Column(name="sleeps", type="integer", nullable=true)
     */
    private $sleeps;

    /**
     * @var integer|null
     *
     * @ORM\Column(name="beds", type="integer", nullable=true)
     */
    private $beds;

    public function getPk(): ?int
    {
        return $this->pk;
    }

    public function getFkLocation(): ?int
    {
        return $this->fkLocation;
    }

    public function setFkLocation(?int $fkLocation): self
    {
        $this->fkLocation = $fkLocation;

        return $this;
    }

    public function getPropertyName(): ?string
    {
        return $this->propertyName;
    }

    public function setPropertyName(?string $propertyName): self
    {
        $this->propertyName = $propertyName;

        return $this;
    }

    public function getNearBeach(): ?bool
    {
        return $this->nearBeach;
    }

    public function setNearBeach(?bool $nearBeach): self
    {
        $this->nearBeach = $nearBeach;

        return $this;
    }

    public function getAcceptsPets(): ?bool
    {
        return $this->acceptsPets;
    }

    public function setAcceptsPets(?bool $acceptsPets): self
    {
        $this->acceptsPets = $acceptsPets;

        return $this;
    }

    public function getSleeps(): ?int
    {
        return $this->sleeps;
    }

    public function setSleeps(?int $sleeps): self
    {
        $this->sleeps = $sleeps;

        return $this;
    }

    public function getBeds(): ?int
    {
        return $this->beds;
    }

    public function setBeds(?int $beds): self
    {
        $this->beds = $beds;

        return $this;
    }
}
