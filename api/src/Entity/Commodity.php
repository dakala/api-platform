<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CommodityRepository")
 *  @ORM\Table(name="commodities")
 */
class Commodity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Classification", inversedBy="commodities")
     * @ORM\JoinColumn(nullable=false)
     */
    private $class_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $commodity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commodity_name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClassId(): ?Classification
    {
        return $this->class_id;
    }

    public function setClassId(?Classification $class_id): self
    {
        $this->class_id = $class_id;

        return $this;
    }

    public function getCommodity(): ?int
    {
        return $this->commodity;
    }

    public function setCommodity(int $commodity): self
    {
        $this->commodity = $commodity;

        return $this;
    }

    public function getCommodityName(): ?string
    {
        return $this->commodity_name;
    }

    public function setCommodityName(string $commodity_name): self
    {
        $this->commodity_name = $commodity_name;

        return $this;
    }
}
