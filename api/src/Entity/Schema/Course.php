<?php

declare(strict_types=1);

namespace App\Entity\Schema;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * A description of an educational course which may be offered as distinct instances at which take place at different times or take place at different locations, or be offered through different media or modes of study. An educational course is a sequence of one or more educational events and/or creative works which aims to build knowledge, competence or ability of learners.
 *
 * @see http://schema.org/Course Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/Course")
 */
class Course extends CreativeWork
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
     * @var string|null The identifier for the \[\[Course\]\] used by the course \[\[provider\]\] (e.g. CS101 or 6.001).
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/courseCode")
     */
    private $courseCode;

    /**
     * @var string|null Requirements for taking the Course. May be completion of another \[\[Course\]\] or a textual description like "permission of instructor". Requirements may be a pre-requisite competency, referenced using \[\[AlignmentObject\]\].
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/coursePrerequisites")
     */
    private $coursePrerequisite;

    /**
     * @var EducationalOccupationalCredential|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\EducationalOccupationalCredential")
     * @ORM\JoinColumn(nullable=false)
     */
    private $educationalCredentialAwarded;

    /**
     * @var Collection<CourseInstance>|null an offering of the course at a specific time and place or through specific media or mode of study or to a specific section of students
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Schema\CourseInstance")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/hasCourseInstance")
     */
    private $hasCourseInstances;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numberOfCredit;

    /**
     * @var EducationalOccupationalCredential|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\EducationalOccupationalCredential")
     * @ORM\JoinColumn(nullable=false)
     */
    private $occupationalCredentialAwarded;

    public function __construct()
    {
        parent::__construct();

        $this->hasCourseInstances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setCourseCode(?string $courseCode): self
    {
        $this->courseCode = $courseCode;

        return $this;
    }

    public function getCourseCode(): ?string
    {
        return $this->courseCode;
    }

    public function setCoursePrerequisite(?string $coursePrerequisite): self
    {
        $this->coursePrerequisite = $coursePrerequisite;

        return $this;
    }

    public function getCoursePrerequisite(): ?string
    {
        return $this->coursePrerequisite;
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

    public function addHasCourseInstance(CourseInstance $hasCourseInstance): self
    {
        $this->hasCourseInstances[] = $hasCourseInstance;

        return $this;
    }

    public function removeHasCourseInstance(CourseInstance $hasCourseInstance): self
    {
        $this->hasCourseInstances->removeElement($hasCourseInstance);

        return $this;
    }

    public function getHasCourseInstances(): Collection
    {
        return $this->hasCourseInstances;
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

    public function setOccupationalCredentialAwarded(?EducationalOccupationalCredential $occupationalCredentialAwarded): self
    {
        $this->occupationalCredentialAwarded = $occupationalCredentialAwarded;

        return $this;
    }

    public function getOccupationalCredentialAwarded(): ?EducationalOccupationalCredential
    {
        return $this->occupationalCredentialAwarded;
    }
}
