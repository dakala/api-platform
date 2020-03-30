<?php

declare(strict_types=1);

namespace App\Entity\Schema;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * An accommodation is a place that can accommodate human beings, e.g. a hotel room, a camping pitch, or a meeting room. Many accommodations are for overnight stays, but this is not a mandatory requirement. For more specific types of accommodations not defined in schema.org, one can use additionalType with external vocabularies.
 *
 * See also the [dedicated document on the use of schema.org for marking up hotels and other forms of accommodations](/docs/hotels.html).
 *
 * @see http://schema.org/Accommodation Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\MappedSuperclass
 * @ApiResource(iri="http://schema.org/Accommodation")
 */
abstract class Accommodation
{
    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $accommodationCategory;

    /**
     * @var Collection<LocationFeatureSpecification>|null An amenity feature (e.g. a characteristic or service) of the Accommodation. This generic property does not make a statement about whether the feature is included in an offer for the main accommodation or available at extra costs.
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Schema\LocationFeatureSpecification")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/amenityFeature")
     */
    private $amenityFeatures;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $floorLevel;

    /**
     * @var Collection<QuantitativeValue>|null The size of the accommodation, e.g. in square meter or squarefoot. Typical unit code(s): MTK for square meter, FTK for square foot, or YDK for square yard
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Schema\QuantitativeValue")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/floorSize")
     */
    private $floorSizes;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numberOfBathroomsTotal;

    /**
     * @var int[]|null The number of rooms (excluding bathrooms and closets) of the acccommodation or lodging business. Typical unit code(s): ROM for room or C62 for no unit. The type of room can be put in the unitText property of the QuantitativeValue.
     *
     * @ORM\Column(type="simple_array", nullable=true)
     * @ApiProperty(iri="http://schema.org/numberOfRooms")
     */
    private $numberOfRooms;

    /**
     * @var bool|null Indicates whether pets are allowed to enter the accommodation or lodging business. More detailed information can be put in a text value.
     *
     * @ORM\Column(type="boolean", nullable=true)
     * @ApiProperty(iri="http://schema.org/petsAllowed")
     */
    private $petsAllowed;

    /**
     * @var string|null indications regarding the permitted usage of the accommodation
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/permittedUsage")
     */
    private $permittedUsage;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $yearBuilt;

    public function __construct()
    {
        $this->amenityFeatures = new ArrayCollection();
        $this->floorSizes = new ArrayCollection();
        $this->numberOfRooms = new ArrayCollection();
    }

    public function setAccommodationCategory(?string $accommodationCategory): self
    {
        $this->accommodationCategory = $accommodationCategory;

        return $this;
    }

    public function getAccommodationCategory(): ?string
    {
        return $this->accommodationCategory;
    }

    public function addAmenityFeature(LocationFeatureSpecification $amenityFeature): self
    {
        $this->amenityFeatures[] = $amenityFeature;

        return $this;
    }

    public function removeAmenityFeature(LocationFeatureSpecification $amenityFeature): self
    {
        $this->amenityFeatures->removeElement($amenityFeature);

        return $this;
    }

    public function getAmenityFeatures(): Collection
    {
        return $this->amenityFeatures;
    }

    public function setFloorLevel(?string $floorLevel): self
    {
        $this->floorLevel = $floorLevel;

        return $this;
    }

    public function getFloorLevel(): ?string
    {
        return $this->floorLevel;
    }

    public function addFloorSize(QuantitativeValue $floorSize): self
    {
        $this->floorSizes[] = $floorSize;

        return $this;
    }

    public function removeFloorSize(QuantitativeValue $floorSize): self
    {
        $this->floorSizes->removeElement($floorSize);

        return $this;
    }

    public function getFloorSizes(): Collection
    {
        return $this->floorSizes;
    }

    public function setNumberOfBathroomsTotal(?int $numberOfBathroomsTotal): self
    {
        $this->numberOfBathroomsTotal = $numberOfBathroomsTotal;

        return $this;
    }

    public function getNumberOfBathroomsTotal(): ?int
    {
        return $this->numberOfBathroomsTotal;
    }

    public function addNumberOfRoom(int $numberOfRoom): self
    {
        $this->numberOfRooms[] = $numberOfRoom;

        return $this;
    }

    public function removeNumberOfRoom(int $numberOfRoom): self
    {
        $this->numberOfRooms->removeElement($numberOfRoom);

        return $this;
    }

    public function getNumberOfRooms(): Collection
    {
        return $this->numberOfRooms;
    }

    public function setPetsAllowed(?bool $petsAllowed): self
    {
        $this->petsAllowed = $petsAllowed;

        return $this;
    }

    public function getPetsAllowed(): ?bool
    {
        return $this->petsAllowed;
    }

    public function setPermittedUsage(?string $permittedUsage): self
    {
        $this->permittedUsage = $permittedUsage;

        return $this;
    }

    public function getPermittedUsage(): ?string
    {
        return $this->permittedUsage;
    }

    public function setYearBuilt(?int $yearBuilt): self
    {
        $this->yearBuilt = $yearBuilt;

        return $this;
    }

    public function getYearBuilt(): ?int
    {
        return $this->yearBuilt;
    }
}
