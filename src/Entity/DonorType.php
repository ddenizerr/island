<?php

namespace App\Entity;

use App\Repository\DonorTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DonorTypeRepository::class)]
class DonorType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: Donor::class, orphanRemoval: true)]
    private Collection $donors;

    public function __construct()
    {
        $this->donors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Donor>
     */
    public function getDonors(): Collection
    {
        return $this->donors;
    }

    public function addDonor(Donor $donor): self
    {
        if (!$this->donors->contains($donor)) {
            $this->donors->add($donor);
            $donor->setType($this);
        }

        return $this;
    }

    public function removeDonor(Donor $donor): self
    {
        if ($this->donors->removeElement($donor)) {
            // set the owning side to null (unless already changed)
            if ($donor->getType() === $this) {
                $donor->setType(null);
            }
        }

        return $this;
    }
}
