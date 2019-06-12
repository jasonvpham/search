<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Locations
 *
 * @ORM\Table(name="locations")
 * @ORM\Entity(repositoryClass="App\Repository\LocationsRepository")
 */
class Locations
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
     * @var string|null
     *
     * @ORM\Column(name="location_name", type="string", length=255,
     *                                   nullable=true)
     */
    private $locationName;

    public function getPk(): ?int
    {
        return $this->pk;
    }

    public function getLocationName(): ?string
    {
        return $this->locationName;
    }

    public function setLocationName(?string $locationName): self
    {
        $this->locationName = $locationName;

        return $this;
    }
}
