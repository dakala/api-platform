<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ClassificationRepository")
 * @ORM\Table(name="classes")
 */
class Classification
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Family", inversedBy="classifications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $family_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $class;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $class_name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commodity", mappedBy="class_id", orphanRemoval=true)
     */
    private $commodities;

    public function __construct()
    {
        $this->commodities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFamilyId(): ?Family
    {
        return $this->family_id;
    }

    public function setFamilyId(?Family $family_id): self
    {
        $this->family_id = $family_id;

        return $this;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(int $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getClassName(): ?string
    {
        return $this->class_name;
    }

    public function setClassName(string $class_name): self
    {
        $this->class_name = $class_name;

        return $this;
    }

    /**
     * @return Collection|Commodity[]
     */
    public function getCommodities(): Collection
    {
        return $this->commodities;
    }

    public function addCommodity(Commodity $commodity): self
    {
        if (!$this->commodities->contains($commodity)) {
            $this->commodities[] = $commodity;
            $commodity->setClassId($this);
        }

        return $this;
    }

    public function removeCommodity(Commodity $commodity): self
    {
        if ($this->commodities->contains($commodity)) {
            $this->commodities->removeElement($commodity);
            // set the owning side to null (unless already changed)
            if ($commodity->getClassId() === $this) {
                $commodity->setClassId(null);
            }
        }

        return $this;
    }
}
