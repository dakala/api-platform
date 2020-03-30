<?php

declare(strict_types=1);

namespace App\Entity\Schema;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Specifies a location feature by providing a structured value representing a feature of an accommodation as a property-value pair of varying degrees of formality.
 *
 * @see http://schema.org/LocationFeatureSpecification Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/LocationFeatureSpecification")
 */
class LocationFeatureSpecification extends PropertyValue
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
     * @var Collection<OpeningHoursSpecification>|null the hours during which this service or contact is available
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Schema\OpeningHoursSpecification")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/hoursAvailable")
     */
    private $hoursAvailables;

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
        $this->hoursAvailables = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function addHoursAvailable(OpeningHoursSpecification $hoursAvailable): self
    {
        $this->hoursAvailables[] = $hoursAvailable;

        return $this;
    }

    public function removeHoursAvailable(OpeningHoursSpecification $hoursAvailable): self
    {
        $this->hoursAvailables->removeElement($hoursAvailable);

        return $this;
    }

    public function getHoursAvailables(): Collection
    {
        return $this->hoursAvailables;
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
