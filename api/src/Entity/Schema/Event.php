<?php

declare(strict_types=1);

namespace App\Entity\Schema;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Enum\Schema\EventStatusType;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * An event happening at a certain time and location, such as a concert, lecture, or festival. Ticketing information may be added via the \[\[offers\]\] property. Repeated events may be structured as separate Event objects.
 *
 * @see http://schema.org/Event Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\MappedSuperclass
 * @ApiResource(iri="http://schema.org/Event")
 */
abstract class Event extends Thing
{
    /**
     * @var Person|null a person attending the event
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Schema\Person")
     * @ApiProperty(iri="http://schema.org/attendees")
     */
    private $attendee;

    /**
     * @var \DateTimeInterface|null the time admission will commence
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @ApiProperty(iri="http://schema.org/doorTime")
     * @Assert\DateTime
     */
    private $doorTime;

    /**
     * @var int|null The duration of the item (movie, audio recording, event, etc.) in \[ISO 8601 date format\](http://en.wikipedia.org/wiki/ISO\_8601).
     *
     * @ORM\Column(type="integer", nullable=true)
     * @ApiProperty(iri="http://schema.org/duration")
     */
    private $duration;

    /**
     * @var \DateTimeInterface|null The end date and time of the item (in \[ISO 8601 date format\](http://en.wikipedia.org/wiki/ISO\_8601)).
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @ApiProperty(iri="http://schema.org/endDate")
     * @Assert\DateTime
     */
    private $endDate;

    /**
     * @var EventAttendanceModeEnumeration|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\EventAttendanceModeEnumeration")
     * @ORM\JoinColumn(nullable=false)
     */
    private $eventAttendanceMode;

    /**
     * @var string|null an eventStatus of an event represents its status; particularly useful when an event is cancelled or rescheduled
     *
     * @ORM\Column(nullable=true)
     * @ApiProperty(iri="http://schema.org/eventStatus")
     * @Assert\Choice(callback={"EventStatusType", "toArray"})
     */
    private $eventStatus;

    /**
     * @var Language|null The language of the content or performance or used in an action. Please use one of the language codes from the \[IETF BCP 47 standard\](http://tools.ietf.org/html/bcp47). See also \[\[availableLanguage\]\].
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\Language")
     * @ApiProperty(iri="http://schema.org/inLanguage")
     */
    private $inLanguage;

    /**
     * @var Place|null the location of for example where the event is happening, an organization is located, or where an action takes place
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\Place")
     * @ApiProperty(iri="http://schema.org/location")
     */
    private $location;

    /**
     * @var \DateTimeInterface|null The start date and time of the item (in \[ISO 8601 date format\](http://en.wikipedia.org/wiki/ISO\_8601)).
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @ApiProperty(iri="http://schema.org/startDate")
     * @Assert\DateTime
     */
    private $startDate;

    /**
     * @var Event|null Events that are a part of this event. For example, a conference event includes many presentations, each subEvents of the conference.
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Schema\Event")
     * @ApiProperty(iri="http://schema.org/subEvents")
     */
    private $subEvent;

    /**
     * @var Event|null An event that this event is a part of. For example, a collection of individual music performances might each have a music festival as their superEvent.
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Schema\Event")
     * @ApiProperty(iri="http://schema.org/superEvent")
     */
    private $superEvent;

    public function setAttendee(?Person $attendee): self
    {
        $this->attendee = $attendee;

        return $this;
    }

    public function getAttendee(): ?Person
    {
        return $this->attendee;
    }

    public function setDoorTime(?\DateTimeInterface $doorTime): self
    {
        $this->doorTime = $doorTime;

        return $this;
    }

    public function getDoorTime(): ?\DateTimeInterface
    {
        return $this->doorTime;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setEndDate(?\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEventAttendanceMode(?EventAttendanceModeEnumeration $eventAttendanceMode): self
    {
        $this->eventAttendanceMode = $eventAttendanceMode;

        return $this;
    }

    public function getEventAttendanceMode(): ?EventAttendanceModeEnumeration
    {
        return $this->eventAttendanceMode;
    }

    public function setEventStatus(?string $eventStatus): self
    {
        $this->eventStatus = $eventStatus;

        return $this;
    }

    public function getEventStatus(): ?string
    {
        return $this->eventStatus;
    }

    public function setInLanguage(?Language $inLanguage): self
    {
        $this->inLanguage = $inLanguage;

        return $this;
    }

    public function getInLanguage(): ?Language
    {
        return $this->inLanguage;
    }

    public function setLocation(?Place $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getLocation(): ?Place
    {
        return $this->location;
    }

    public function setStartDate(?\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setSubEvent(?Event $subEvent): self
    {
        $this->subEvent = $subEvent;

        return $this;
    }

    public function getSubEvent(): ?Event
    {
        return $this->subEvent;
    }

    public function setSuperEvent(?Event $superEvent): self
    {
        $this->superEvent = $superEvent;

        return $this;
    }

    public function getSuperEvent(): ?Event
    {
        return $this->superEvent;
    }
}
