<?php

namespace App\Entity;

use App\Repository\CoursesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoursesRepository::class)]
class Courses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2)]
    private ?string $coefficient = null;

    #[ORM\Column(length: 50)]
    private ?string $day = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $started_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $end_at = null;

    #[ORM\ManyToOne(inversedBy: 'courses')]
    private ?ClassRooms $classroom = null;

    #[ORM\ManyToOne(inversedBy: 'courses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Subjects $subjects = null;

    /**
     * @var Collection<int, Ressources>
     */
    #[ORM\ManyToMany(targetEntity: Ressources::class, inversedBy: 'courses')]
    private Collection $ressources;

    /**
     * @var Collection<int, Users>
     */
    #[ORM\ManyToMany(targetEntity: Users::class, mappedBy: 'courses')]
    private Collection $users;

    /**
     * @var Collection<int, Results>
     */
    #[ORM\OneToMany(targetEntity: Results::class, mappedBy: 'courses')]
    private Collection $resulats;

    public function __construct()
    {
        $this->ressources = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->resulats = new ArrayCollection();
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

    public function getCoefficient(): ?string
    {
        return $this->coefficient;
    }

    public function setCoefficient(string $coefficient): static
    {
        $this->coefficient = $coefficient;

        return $this;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): static
    {
        $this->day = $day;

        return $this;
    }

    public function getStartedAt(): ?\DateTimeImmutable
    {
        return $this->started_at;
    }

    public function setStartedAt(\DateTimeImmutable $started_at): static
    {
        $this->started_at = $started_at;

        return $this;
    }

    public function getEndAt(): ?\DateTimeImmutable
    {
        return $this->end_at;
    }

    public function setEndAt(\DateTimeImmutable $end_at): static
    {
        $this->end_at = $end_at;

        return $this;
    }

    public function getClassroom(): ?ClassRooms
    {
        return $this->classroom;
    }

    public function setClassroom(?ClassRooms $classroom): static
    {
        $this->classroom = $classroom;

        return $this;
    }

    public function getSubjects(): ?Subjects
    {
        return $this->subjects;
    }

    public function setSubjects(?Subjects $subjects): static
    {
        $this->subjects = $subjects;

        return $this;
    }

    /**
     * @return Collection<int, Ressources>
     */
    public function getRessources(): Collection
    {
        return $this->ressources;
    }

    public function addRessource(Ressources $ressource): static
    {
        if (!$this->ressources->contains($ressource)) {
            $this->ressources->add($ressource);
        }

        return $this;
    }

    public function removeRessource(Ressources $ressource): static
    {
        $this->ressources->removeElement($ressource);

        return $this;
    }

    /**
     * @return Collection<int, Users>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(Users $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addCourse($this);
        }

        return $this;
    }

    public function removeUser(Users $user): static
    {
        if ($this->users->removeElement($user)) {
            $user->removeCourse($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Results>
     */
    public function getResulats(): Collection
    {
        return $this->resulats;
    }

    public function addResulat(Results $resulat): static
    {
        if (!$this->resulats->contains($resulat)) {
            $this->resulats->add($resulat);
            $resulat->setCourses($this);
        }

        return $this;
    }

    public function removeResulat(Results $resulat): static
    {
        if ($this->resulats->removeElement($resulat)) {
            // set the owning side to null (unless already changed)
            if ($resulat->getCourses() === $this) {
                $resulat->setCourses(null);
            }
        }

        return $this;
    }
}
