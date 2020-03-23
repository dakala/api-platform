<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\FamilyRepository")
 *  @ORM\Table(name="families")
 */
class Family
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Segment", inversedBy="families")
     * @ORM\JoinColumn(nullable=false)
     */
    private $segment_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $family;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $family_name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Classification", mappedBy="family_id", orphanRemoval=true)
     */
    private $classifications;

    public function __construct()
    {
        $this->classifications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSegmentId(): ?Segment
    {
        return $this->segment_id;
    }

    public function setSegmentId(?Segment $segment_id): self
    {
        $this->segment_id = $segment_id;

        return $this;
    }

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(int $family): self
    {
        $this->family = $family;

        return $this;
    }

    public function getFamilyName(): ?string
    {
        return $this->family_name;
    }

    public function setFamilyName(string $family_name): self
    {
        $this->family_name = $family_name;

        return $this;
    }

    /**
     * @return Collection|Classification[]
     */
    public function getClassifications(): Collection
    {
        return $this->classifications;
    }

    public function addClassification(Classification $classification): self
    {
        if (!$this->classifications->contains($classification)) {
            $this->classifications[] = $classification;
            $classification->setFamilyId($this);
        }

        return $this;
    }

    public function removeClassification(Classification $classification): self
    {
        if ($this->classifications->contains($classification)) {
            $this->classifications->removeElement($classification);
            // set the owning side to null (unless already changed)
            if ($classification->getFamilyId() === $this) {
                $classification->setFamilyId(null);
            }
        }

        return $this;
    }
}
