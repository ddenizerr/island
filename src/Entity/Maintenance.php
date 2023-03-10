<?php

namespace App\Entity;

use App\Repository\MaintenanceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaintenanceRepository::class)]
class Maintenance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $last_service = null;

    #[ORM\ManyToOne(inversedBy: 'maintenances')]
    #[ORM\JoinColumn(nullable: false)]
    private ?MaintenanceType $type = null;

    #[ORM\ManyToOne(inversedBy: 'maintenance')]
    private ?Habitat $habitat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastService(): ?\DateTimeInterface
    {
        return $this->last_service;
    }

    public function setLastService(?\DateTimeInterface $last_service): self
    {
        $this->last_service = $last_service;

        return $this;
    }

  /**
   * @return MaintenanceType|null
   */
  public function getType(): ?MaintenanceType
  {
    return $this->type;
  }

  /**
   * @param MaintenanceType|null $type
   */
  public function setType(?MaintenanceType $type): void
  {
    $this->type = $type;
  }

  public function getHabitat(): ?Habitat
  {
      return $this->habitat;
  }

  public function setHabitat(?Habitat $habitat): self
  {
      $this->habitat = $habitat;

      return $this;
  }
}
