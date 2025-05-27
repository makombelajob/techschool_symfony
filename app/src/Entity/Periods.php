<?php

namespace App\Entity;

use App\Repository\PeriodsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeriodsRepository::class)]
class Periods
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    /**
     * @var Collection<int, ClassRooms>
     */
    #[ORM\OneToMany(targetEntity: ClassRooms::class, mappedBy: 'periods')]
    private Collection $classRooms;

    /**
     * @var Collection<int, Payments>
     */
    #[ORM\ManyToMany(targetEntity: Payments::class, mappedBy: 'periods')]
    private Collection $payments;

    public function __construct()
    {
        $this->classRooms = new ArrayCollection();
        $this->payments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, ClassRooms>
     */
    public function getClassRooms(): Collection
    {
        return $this->classRooms;
    }

    public function addClassRoom(ClassRooms $classRoom): static
    {
        if (!$this->classRooms->contains($classRoom)) {
            $this->classRooms->add($classRoom);
            $classRoom->setPeriods($this);
        }

        return $this;
    }

    public function removeClassRoom(ClassRooms $classRoom): static
    {
        if ($this->classRooms->removeElement($classRoom)) {
            // set the owning side to null (unless already changed)
            if ($classRoom->getPeriods() === $this) {
                $classRoom->setPeriods(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Payments>
     */
    public function getPayments(): Collection
    {
        return $this->payments;
    }

    public function addPayment(Payments $payment): static
    {
        if (!$this->payments->contains($payment)) {
            $this->payments->add($payment);
            $payment->addPeriod($this);
        }

        return $this;
    }

    public function removePayment(Payments $payment): static
    {
        if ($this->payments->removeElement($payment)) {
            $payment->removePeriod($this);
        }

        return $this;
    }
}
