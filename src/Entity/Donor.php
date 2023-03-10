<?php

namespace App\Entity;

use App\Repository\DonorRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DonorRepository::class)]
class Donor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $contact_info = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $donation_amount = null;

    #[ORM\ManyToOne(inversedBy: 'donors')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DonorType $type = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getContactInfo(): ?int
    {
        return $this->contact_info;
    }

    public function setContactInfo(?int $contact_info): self
    {
        $this->contact_info = $contact_info;

        return $this;
    }

    public function getDonationAmount(): ?string
    {
        return $this->donation_amount;
    }

    public function setDonationAmount(?string $donation_amount): self
    {
        $this->donation_amount = $donation_amount;

        return $this;
    }

    public function getType(): ?DonorType
    {
        return $this->type;
    }

    public function setType(?DonorType $type): self
    {
        $this->type = $type;

        return $this;
    }
}
