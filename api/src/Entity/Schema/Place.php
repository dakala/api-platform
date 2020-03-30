<?php

declare(strict_types=1);

namespace App\Entity\Schema;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Entities that have a somewhat fixed, physical extension.
 *
 * @see http://schema.org/Place Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/Place")
 */
class Place extends Thing
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
     * @var PostalAddress|null physical address of the item
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Schema\PostalAddress")
     * @ApiProperty(iri="http://schema.org/address")
     */
    private $address;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $latitude;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $longitude;

    /**
     * @var Collection<PropertyValue>|null A property-value pair representing an additional characteristics of the entity, e.g. a product feature or another characteristic for which there is no matching property in schema.org.\\n\\nNote: Publishers should be aware that applications designed to use specific schema.org properties (e.g. http://schema.org/width, http://schema.org/color, http://schema.org/gtin13, ...) will typically expect such data to be provided using those properties, rather than using the generic property/value mechanism.
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Schema\PropertyValue")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/additionalProperty")
     */
    private $additionalProperties;

    /**
     * @var string|null A short textual code (also called "store code") that uniquely identifies a place of business. The code is typically assigned by the parentOrganization and used in structured URLs.\\n\\nFor example, in the URL http://www.starbucks.co.uk/store-locator/etc/detail/3047 the code "3047" is a branchCode for a particular branch.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/branchCode")
     */
    private $branchCode;

    /**
     * @var string|null the fax number
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/faxNumber")
     */
    private $faxNumber;

    /**
     * @var string|null The \[Global Location Number\](http://www.gs1.org/gln) (GLN, sometimes also referred to as International Location Number or ILN) of the respective organization, person, or place. The GLN is a 13-digit number used to identify parties and physical locations.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/globalLocationNumber")
     */
    private $globalLocationNumber;

    /**
     * @var string[]|null the International Standard of Industrial Classification of All Economic Activities (ISIC), Revision 4 code for a particular organization, business person, or place
     *
     * @ORM\Column(type="simple_array", nullable=true)
     * @ApiProperty(iri="http://schema.org/isicV4")
     */
    private $isicV4;

    /**
     * @var string|null the telephone number
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/telephone")
     */
    private $telephone;

    public function __construct()
    {
        $this->additionalProperties = new ArrayCollection();
        $this->isicV4 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setAddress(?PostalAddress $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getAddress(): ?PostalAddress
    {
        return $this->address;
    }

    public function setLatitude(?string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLongitude(?string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function addAdditionalProperty(PropertyValue $additionalProperty): self
    {
        $this->additionalProperties[] = $additionalProperty;

        return $this;
    }

    public function removeAdditionalProperty(PropertyValue $additionalProperty): self
    {
        $this->additionalProperties->removeElement($additionalProperty);

        return $this;
    }

    public function getAdditionalProperties(): Collection
    {
        return $this->additionalProperties;
    }

    public function setBranchCode(?string $branchCode): self
    {
        $this->branchCode = $branchCode;

        return $this;
    }

    public function getBranchCode(): ?string
    {
        return $this->branchCode;
    }

    public function setFaxNumber(?string $faxNumber): self
    {
        $this->faxNumber = $faxNumber;

        return $this;
    }

    public function getFaxNumber(): ?string
    {
        return $this->faxNumber;
    }

    public function setGlobalLocationNumber(?string $globalLocationNumber): self
    {
        $this->globalLocationNumber = $globalLocationNumber;

        return $this;
    }

    public function getGlobalLocationNumber(): ?string
    {
        return $this->globalLocationNumber;
    }

    public function addIsicV4(string $isicV4): self
    {
        $this->isicV4[] = $isicV4;

        return $this;
    }

    public function removeIsicV4(string $isicV4): self
    {
        $this->isicV4->removeElement($isicV4);

        return $this;
    }

    public function getIsicV4(): Collection
    {
        return $this->isicV4;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }
}
