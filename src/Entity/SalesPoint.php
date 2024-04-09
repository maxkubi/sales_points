<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sales_point")
 * @ORM\HasLifecycleCallbacks()
 */
class SalesPoint
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pidId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $openingHoursFrom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $openingHoursTo;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=8)
     */
    private $lat;

    /**
     * @ORM\Column(type="decimal", precision=11, scale=8)
     */
    private $lon;

    /**
     * @ORM\Column(type="integer")
     */
    private $services;

    /**
     * @ORM\Column(type="integer")
     */
    private $payMethods;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    // Getters and Setters for all properties

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPidId(): ?string
    {
        return $this->pidId;
    }

    public function setPidId(string $pidId): self
    {
        $this->pidId = $pidId;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getOpeningHoursFrom(): ?int
    {
        return $this->openingHoursFrom;
    }

    public function setOpeningHoursFrom(?int $openingHoursFrom): self
    {
        $this->openingHoursFrom = $openingHoursFrom;

        return $this;
    }

    public function getOpeningHoursTo(): ?int
    {
        return $this->openingHoursTo;
    }

    public function setOpeningHoursTo(?int $openingHoursTo): self
    {
        $this->openingHoursTo = $openingHoursTo;

        return $this;
    }

    public function getLat(): ?string
    {
        return $this->lat;
    }

    public function setLat(string $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLon(): ?string
    {
        return $this->lon;
    }

    public function setLon(string $lon): self
    {
        $this->lon = $lon;

        return $this;
    }

    public function getServices(): ?int
    {
        return $this->services;
    }

    public function setServices(int $services): self
    {
        $this->services = $services;

        return $this;
    }

    public function getPayMethods(): ?int
    {
        return $this->payMethods;
    }

    public function setPayMethods(int $payMethods): self
    {
        $this->payMethods = $payMethods;

        return $this;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setUpdatedAt(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }
}
