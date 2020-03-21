<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\SegmentRepository")
 *  @ORM\Table(name="segments")
 */
class Segment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $segment;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $segment_name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Family", mappedBy="segment_id", orphanRemoval=true)
     */
    private $families;

    public function __construct()
    {
        $this->families = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSegment(): ?int
    {
        return $this->segment;
    }

    public function setSegment(int $segment): self
    {
        $this->segment = $segment;

        return $this;
    }

    public function getSegmentName(): ?string
    {
        return $this->segment_name;
    }

    public function setSegmentName(string $segment_name): self
    {
        $this->segment_name = $segment_name;

        return $this;
    }

    /**
     * @return Collection|Family[]
     */
    public function getFamilies(): Collection
    {
        return $this->families;
    }

    public function addFamily(Family $family): self
    {
        if (!$this->families->contains($family)) {
            $this->families[] = $family;
            $family->setSegmentId($this);
        }

        return $this;
    }

    public function removeFamily(Family $family): self
    {
        if ($this->families->contains($family)) {
            $this->families->removeElement($family);
            // set the owning side to null (unless already changed)
            if ($family->getSegmentId() === $this) {
                $family->setSegmentId(null);
            }
        }

        return $this;
    }
}
