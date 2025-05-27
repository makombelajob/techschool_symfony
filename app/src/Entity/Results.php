<?php

namespace App\Entity;

use App\Repository\ResultsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResultsRepository::class)]
class Results
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $grade = null;

    #[ORM\Column]
    private ?int $monthly = null;

    #[ORM\Column]
    private ?int $yearly = null;

    #[ORM\Column(length: 1000)]
    private ?string $remark = null;

    #[ORM\ManyToOne(inversedBy: 'results')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $users = null;

    #[ORM\ManyToOne(inversedBy: 'resulats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Courses $courses = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGrade(): ?int
    {
        return $this->grade;
    }

    public function setGrade(int $grade): static
    {
        $this->grade = $grade;

        return $this;
    }

    public function getMonthly(): ?int
    {
        return $this->monthly;
    }

    public function setMonthly(int $monthly): static
    {
        $this->monthly = $monthly;

        return $this;
    }

    public function getYearly(): ?int
    {
        return $this->yearly;
    }

    public function setYearly(int $yearly): static
    {
        $this->yearly = $yearly;

        return $this;
    }

    public function getRemark(): ?string
    {
        return $this->remark;
    }

    public function setRemark(string $remark): static
    {
        $this->remark = $remark;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): static
    {
        $this->users = $users;

        return $this;
    }

    public function getCourses(): ?Courses
    {
        return $this->courses;
    }

    public function setCourses(?Courses $courses): static
    {
        $this->courses = $courses;

        return $this;
    }
}
