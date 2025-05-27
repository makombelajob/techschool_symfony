<?php

namespace App\Entity;

use App\Repository\ClassRoomsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassRoomsRepository::class)]
class ClassRooms
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    private ?string $level = null;

    /**
     * @var Collection<int, Courses>
     */
    #[ORM\OneToMany(targetEntity: Courses::class, mappedBy: 'classroom')]
    private Collection $courses;

    #[ORM\ManyToOne(inversedBy: 'classRooms')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Periods $periods = null;

    /**
     * @var Collection<int, Users>
     */
    #[ORM\OneToMany(targetEntity: Users::class, mappedBy: 'classroom')]
    private Collection $users;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
        $this->users = new ArrayCollection();
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

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): static
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection<int, Courses>
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Courses $course): static
    {
        if (!$this->courses->contains($course)) {
            $this->courses->add($course);
            $course->setClassroom($this);
        }

        return $this;
    }

    public function removeCourse(Courses $course): static
    {
        if ($this->courses->removeElement($course)) {
            // set the owning side to null (unless already changed)
            if ($course->getClassroom() === $this) {
                $course->setClassroom(null);
            }
        }

        return $this;
    }

    public function getPeriods(): ?Periods
    {
        return $this->periods;
    }

    public function setPeriods(?Periods $periods): static
    {
        $this->periods = $periods;

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
            $user->setClassroom($this);
        }

        return $this;
    }

    public function removeUser(Users $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getClassroom() === $this) {
                $user->setClassroom(null);
            }
        }

        return $this;
    }
}
