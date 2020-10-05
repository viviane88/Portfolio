<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormationRepository::class)
 */
class Formation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Ce champs ne peut pas être vide.")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Ce champs ne peut pas être vide.")
     */
    private $school;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank(message="Ce champs ne peut pas être vide.")
     */
    private $gradeLevel;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\NotBlank(message="Ce champs ne peut pas être vide.")
     */
    private $description;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSchool(): ?string
    {
        return $this->school;
    }

    public function setSchool(?string $school): self
    {
        $this->school = $school;

        return $this;
    }

    public function getGradeLevel(): ?int
    {
        return $this->gradeLevel;
    }

    public function setGradeLevel(?int $gradeLevel): self
    {
        $this->gradeLevel = $gradeLevel;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    
}
