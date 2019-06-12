<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bookings
 *
 * @ORM\Table(name="bookings")
 * @ORM\Entity(repositoryClass="App\Repository\BookingsRepository")
 */
class Bookings
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
     * @ORM\Column(name="_fk_property", type="integer", nullable=true,
     *                                  options={"unsigned"=true})
     */
    private $fkProperty;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="start_date", type="date", nullable=true)
     */
    private $startDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="end_date", type="date", nullable=true)
     */
    private $endDate;

    public function getPk(): ?int
    {
        return $this->pk;
    }

    public function getFkProperty(): ?int
    {
        return $this->fkProperty;
    }

    public function setFkProperty(?int $fkProperty): self
    {
        $this->fkProperty = $fkProperty;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }
}
