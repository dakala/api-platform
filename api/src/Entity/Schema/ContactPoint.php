<?php

declare(strict_types=1);

namespace App\Entity\Schema;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Enum\Schema\ContactPointOption;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A contact point—for example, a Customer Complaints department.
 *
 * @see http://schema.org/ContactPoint Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/ContactPoint")
 */
class ContactPoint extends Thing
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
     * @var string|null the geographic area where a service or offered item is provided
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/areaServed")
     */
    private $areaServed;

    /**
     * @var string|null An option available on this contact point (e.g. a toll-free number or support for hearing-impaired callers).
     *
     * @ORM\Column(nullable=true)
     * @ApiProperty(iri="http://schema.org/contactOption")
     * @Assert\Choice(callback={"ContactPointOption", "toArray"})
     */
    private $contactOption;

    /**
     * @var string|null A person or organization can have different contact points, for different purposes. For example, a sales contact point, a PR contact point and so on. This property is used to specify the kind of contact point.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/contactType")
     */
    private $contactType;

    /**
     * @var string|null email address
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/email")
     * @Assert\Email
     */
    private $email;

    /**
     * @var string|null the fax number
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/faxNumber")
     */
    private $faxNumber;

    /**
     * @var Collection<OpeningHoursSpecification>|null the hours during which this service or contact is available
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Schema\OpeningHoursSpecification")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/hoursAvailable")
     */
    private $hoursAvailables;

    /**
     * @var string[]|null The product or service this support contact point is related to (such as product support for a particular product line). This can be a specific product or product line (e.g. "iPhone") or a general category of products or services (e.g. "smartphones").
     *
     * @ORM\Column(type="simple_array", nullable=true)
     * @ApiProperty(iri="http://schema.org/productSupported")
     */
    private $productSupporteds;

    /**
     * @var string|null the telephone number
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/telephone")
     */
    private $telephone;

    public function __construct()
    {
        $this->hoursAvailables = new ArrayCollection();
        $this->productSupporteds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setAreaServed(?string $areaServed): self
    {
        $this->areaServed = $areaServed;

        return $this;
    }

    public function getAreaServed(): ?string
    {
        return $this->areaServed;
    }

    public function setContactOption(?string $contactOption): self
    {
        $this->contactOption = $contactOption;

        return $this;
    }

    public function getContactOption(): ?string
    {
        return $this->contactOption;
    }

    public function setContactType(?string $contactType): self
    {
        $this->contactType = $contactType;

        return $this;
    }

    public function getContactType(): ?string
    {
        return $this->contactType;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
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

    public function addProductSupported(string $productSupported): self
    {
        $this->productSupporteds[] = $productSupported;

        return $this;
    }

    public function removeProductSupported(string $productSupported): self
    {
        $this->productSupporteds->removeElement($productSupported);

        return $this;
    }

    public function getProductSupporteds(): Collection
    {
        return $this->productSupporteds;
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
