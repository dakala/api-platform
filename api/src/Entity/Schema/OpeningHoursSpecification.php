<?php

declare(strict_types=1);

namespace App\Entity\Schema;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Enum\Schema\DayOfWeek;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A structured value providing information about the opening hours of a place or a certain service inside a place.\\n\\n The place is \_\_open\_\_ if the \[\[opens\]\] property is specified, and \_\_closed\_\_ otherwise.\\n\\nIf the value for the \[\[closes\]\] property is less than the value for the \[\[opens\]\] property then the hour range is assumed to span over the next day.
 *
 * @see http://schema.org/OpeningHoursSpecification Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/OpeningHoursSpecification")
 */
class OpeningHoursSpecification extends Thing
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
     * @var \DateTimeInterface|null the closing hour of the place or service on the given day(s) of the week
     *
     * @ORM\Column(type="time", nullable=true)
     * @ApiProperty(iri="http://schema.org/closes")
     * @Assert\Time
     */
    private $close;

    /**
     * @var string[]|null the day of the week for which these opening hours are valid
     *
     * @ORM\Column(type="simple_array", nullable=true)
     * @ApiProperty(iri="http://schema.org/dayOfWeek")
     * @Assert\Choice(callback={"DayOfWeek", "toArray"}, multiple=true)
     */
    private $dayOfWeeks = [];

    /**
     * @var \DateTimeInterface|null the opening hour of the place or service on the given day(s) of the week
     *
     * @ORM\Column(type="time", nullable=true)
     * @ApiProperty(iri="http://schema.org/opens")
     * @Assert\Time
     */
    private $open;

    /**
     * @var \DateTimeInterface|null the date when the item becomes valid
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @ApiProperty(iri="http://schema.org/validFrom")
     * @Assert\DateTime
     */
    private $validFrom;

    /**
     * @var \DateTimeInterface|null The date after when the item is not valid. For example the end of an offer, salary period, or a period of opening hours.
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @ApiProperty(iri="http://schema.org/validThrough")
     * @Assert\DateTime
     */
    private $validThrough;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setClose(?\DateTimeInterface $close): self
    {
        $this->close = $close;

        return $this;
    }

    public function getClose(): ?\DateTimeInterface
    {
        return $this->close;
    }

    public function addDayOfWeek($dayOfWeek): self
    {
        $this->dayOfWeeks[] = (string) $dayOfWeek;

        return $this;
    }

    public function removeDayOfWeek(string $dayOfWeek): self
    {
        $key = array_search((string) $dayOfWeek, $this->dayOfWeeks, true);
        if (false !== $key) {
            unset($this->dayOfWeeks[$key]);
        }

        return $this;
    }

    public function getDayOfWeeks(): Collection
    {
        return $this->dayOfWeeks;
    }

    public function setOpen(?\DateTimeInterface $open): self
    {
        $this->open = $open;

        return $this;
    }

    public function getOpen(): ?\DateTimeInterface
    {
        return $this->open;
    }

    public function setValidFrom(?\DateTimeInterface $validFrom): self
    {
        $this->validFrom = $validFrom;

        return $this;
    }

    public function getValidFrom(): ?\DateTimeInterface
    {
        return $this->validFrom;
    }

    public function setValidThrough(?\DateTimeInterface $validThrough): self
    {
        $this->validThrough = $validThrough;

        return $this;
    }

    public function getValidThrough(): ?\DateTimeInterface
    {
        return $this->validThrough;
    }
}
