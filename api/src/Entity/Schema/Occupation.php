<?php

declare(strict_types=1);

namespace App\Entity\Schema;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * The most generic type of item.
 *
 * @see http://schema.org/Thing Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/Thing")
 */
class Occupation extends Thing
{
    /**
     * @var int|null
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $experienceRequirement;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $qualification;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $responsibility;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setExperienceRequirement(?string $experienceRequirement): self
    {
        $this->experienceRequirement = $experienceRequirement;

        return $this;
    }

    public function getExperienceRequirement(): ?string
    {
        return $this->experienceRequirement;
    }

    public function setQualification(?string $qualification): self
    {
        $this->qualification = $qualification;

        return $this;
    }

    public function getQualification(): ?string
    {
        return $this->qualification;
    }

    public function setResponsibility(?string $responsibility): self
    {
        $this->responsibility = $responsibility;

        return $this;
    }

    public function getResponsibility(): ?string
    {
        return $this->responsibility;
    }
}
