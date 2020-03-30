<?php

declare(strict_types=1);

namespace App\Entity\Schema;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * An instance of a \[\[Course\]\] which is distinct from other instances because it is offered at a different time or location or through different media or modes of study or to a specific section of students.
 *
 * @see http://schema.org/CourseInstance Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/CourseInstance")
 */
class CourseInstance extends Event
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
     * @var string|null The medium or means of delivery of the course instance or the mode of study, either as a text label (e.g. "online", "onsite" or "blended"; "synchronous" or "asynchronous"; "full-time" or "part-time") or as a URL reference to a term from a controlled vocabulary (e.g. https://ceds.ed.gov/element/001311#Asynchronous ).
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/courseMode")
     */
    private $courseMode;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $courseWorkload;

    /**
     * @var Collection<Person>|null a person assigned to instruct or provide instructional assistance for the \[\[CourseInstance\]\]
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Schema\Person")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/instructor")
     */
    private $instructors;

    public function __construct()
    {
        $this->instructors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setCourseMode(?string $courseMode): self
    {
        $this->courseMode = $courseMode;

        return $this;
    }

    public function getCourseMode(): ?string
    {
        return $this->courseMode;
    }

    public function setCourseWorkload(?string $courseWorkload): self
    {
        $this->courseWorkload = $courseWorkload;

        return $this;
    }

    public function getCourseWorkload(): ?string
    {
        return $this->courseWorkload;
    }

    public function addInstructor(Person $instructor): self
    {
        $this->instructors[] = $instructor;

        return $this;
    }

    public function removeInstructor(Person $instructor): self
    {
        $this->instructors->removeElement($instructor);

        return $this;
    }

    public function getInstructors(): Collection
    {
        return $this->instructors;
    }
}
