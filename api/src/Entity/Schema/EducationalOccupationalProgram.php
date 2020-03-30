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
class EducationalOccupationalProgram extends Thing
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
     * @var EducationalOccupationalCredential|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\EducationalOccupationalCredential")
     * @ORM\JoinColumn(nullable=false)
     */
    private $educationalCredentialAwarded;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $educationalProgramMode;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numberOfCredit;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $programPrerequisite;

    /**
     * @var DefinedTerm|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\DefinedTerm")
     * @ORM\JoinColumn(nullable=false)
     */
    private $programType;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $termDuration;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $termsPerYear;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $timeOfDay;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $timeToComplete;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $typicalCreditsPerTerm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setEducationalCredentialAwarded(?EducationalOccupationalCredential $educationalCredentialAwarded): self
    {
        $this->educationalCredentialAwarded = $educationalCredentialAwarded;

        return $this;
    }

    public function getEducationalCredentialAwarded(): ?EducationalOccupationalCredential
    {
        return $this->educationalCredentialAwarded;
    }

    public function setEducationalProgramMode(?string $educationalProgramMode): self
    {
        $this->educationalProgramMode = $educationalProgramMode;

        return $this;
    }

    public function getEducationalProgramMode(): ?string
    {
        return $this->educationalProgramMode;
    }

    public function setNumberOfCredit(?int $numberOfCredit): self
    {
        $this->numberOfCredit = $numberOfCredit;

        return $this;
    }

    public function getNumberOfCredit(): ?int
    {
        return $this->numberOfCredit;
    }

    public function setProgramPrerequisite(?string $programPrerequisite): self
    {
        $this->programPrerequisite = $programPrerequisite;

        return $this;
    }

    public function getProgramPrerequisite(): ?string
    {
        return $this->programPrerequisite;
    }

    public function setProgramType(?DefinedTerm $programType): self
    {
        $this->programType = $programType;

        return $this;
    }

    public function getProgramType(): ?DefinedTerm
    {
        return $this->programType;
    }

    public function setTermDuration(?int $termDuration): self
    {
        $this->termDuration = $termDuration;

        return $this;
    }

    public function getTermDuration(): ?int
    {
        return $this->termDuration;
    }

    public function setTermsPerYear(?int $termsPerYear): self
    {
        $this->termsPerYear = $termsPerYear;

        return $this;
    }

    public function getTermsPerYear(): ?int
    {
        return $this->termsPerYear;
    }

    public function setTimeOfDay(?string $timeOfDay): self
    {
        $this->timeOfDay = $timeOfDay;

        return $this;
    }

    public function getTimeOfDay(): ?string
    {
        return $this->timeOfDay;
    }

    public function setTimeToComplete(?int $timeToComplete): self
    {
        $this->timeToComplete = $timeToComplete;

        return $this;
    }

    public function getTimeToComplete(): ?int
    {
        return $this->timeToComplete;
    }

    public function setTypicalCreditsPerTerm(?int $typicalCreditsPerTerm): self
    {
        $this->typicalCreditsPerTerm = $typicalCreditsPerTerm;

        return $this;
    }

    public function getTypicalCreditsPerTerm(): ?int
    {
        return $this->typicalCreditsPerTerm;
    }
}
