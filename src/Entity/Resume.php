<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ResumeRepository")
 */
class Resume
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $bio;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $catchy;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Skill", mappedBy="resume")
     */
    private $skills;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Formation", mappedBy="resume")
     */
    private $formations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Hobby", mappedBy="resume")
     */
    private $Hobbies;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Information", cascade={"persist", "remove"})
     */
    private $information;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\XpPro", mappedBy="resume")
     */
    private $xppros;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
        $this->formations = new ArrayCollection();
        $this->Hobbies = new ArrayCollection();
        $this->xppros = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    public function getCatchy(): ?string
    {
        return $this->catchy;
    }

    public function setCatchy(?string $catchy): self
    {
        $this->catchy = $catchy;

        return $this;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
            $skill->setResume($this);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        if ($this->skills->contains($skill)) {
            $this->skills->removeElement($skill);
            // set the owning side to null (unless already changed)
            if ($skill->getResume() === $this) {
                $skill->setResume(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->setResume($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formations->contains($formation)) {
            $this->formations->removeElement($formation);
            // set the owning side to null (unless already changed)
            if ($formation->getResume() === $this) {
                $formation->setResume(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Hobby[]
     */
    public function getHobbies(): Collection
    {
        return $this->Hobbies;
    }

    public function addHobby(Hobby $hobby): self
    {
        if (!$this->Hobbies->contains($hobby)) {
            $this->Hobbies[] = $hobby;
            $hobby->setResume($this);
        }

        return $this;
    }

    public function removeHobby(Hobby $hobby): self
    {
        if ($this->Hobbies->contains($hobby)) {
            $this->Hobbies->removeElement($hobby);
            // set the owning side to null (unless already changed)
            if ($hobby->getResume() === $this) {
                $hobby->setResume(null);
            }
        }

        return $this;
    }

    public function getInformation(): ?Information
    {
        return $this->information;
    }

    public function setInformation(?Information $information): self
    {
        $this->information = $information;

        return $this;
    }

    /**
     * @return Collection|XpPro[]
     */
    public function getXppros(): Collection
    {
        return $this->xppros;
    }

    public function addXppro(XpPro $xppro): self
    {
        if (!$this->xppros->contains($xppro)) {
            $this->xppros[] = $xppro;
            $xppro->setResume($this);
        }

        return $this;
    }

    public function removeXppro(XpPro $xppro): self
    {
        if ($this->xppros->contains($xppro)) {
            $this->xppros->removeElement($xppro);
            // set the owning side to null (unless already changed)
            if ($xppro->getResume() === $this) {
                $xppro->setResume(null);
            }
        }

        return $this;
    }
}
