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
class EducationalOccupationalCredential extends Thing
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
    private $competencyRequired;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $credentialCategory;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $educationalLevel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setCompetencyRequired(?string $competencyRequired): self
    {
        $this->competencyRequired = $competencyRequired;

        return $this;
    }

    public function getCompetencyRequired(): ?string
    {
        return $this->competencyRequired;
    }

    public function setCredentialCategory(?string $credentialCategory): self
    {
        $this->credentialCategory = $credentialCategory;

        return $this;
    }

    public function getCredentialCategory(): ?string
    {
        return $this->credentialCategory;
    }

    public function setEducationalLevel(?string $educationalLevel): self
    {
        $this->educationalLevel = $educationalLevel;

        return $this;
    }

    public function getEducationalLevel(): ?string
    {
        return $this->educationalLevel;
    }
}
