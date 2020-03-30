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
 * An organization such as a school, NGO, corporation, club, etc.
 *
 * @see http://schema.org/Organization Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\MappedSuperclass
 * @ApiResource(iri="http://schema.org/Organization")
 */
abstract class Organization extends Thing
{
    /**
     * @var PostalAddress|null physical address of the item
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Schema\PostalAddress")
     * @ApiProperty(iri="http://schema.org/address")
     */
    private $address;

    /**
     * @var Collection<Person>|null alumni of an organization
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Schema\Person")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/alumni")
     */
    private $alumnis;

    /**
     * @var string|null an award won by or for this item
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/award")
     */
    private $award;

    /**
     * @var Collection<ContactPoint>|null a contact point for a person or organization
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Schema\ContactPoint")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/contactPoints")
     */
    private $contactPoints;

    /**
     * @var Organization|null A relationship between an organization and a department of that organization, also described as an organization (allowing different urls, logos, opening hours). For example: a store with a pharmacy, or a bakery with a cafe.
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Schema\Organization")
     * @ApiProperty(iri="http://schema.org/department")
     */
    private $department;

    /**
     * @var \DateTimeInterface|null the date that this organization was dissolved
     *
     * @ORM\Column(type="date", nullable=true)
     * @ApiProperty(iri="http://schema.org/dissolutionDate")
     * @Assert\Date
     */
    private $dissolutionDate;

    /**
     * @var string|null the Dun &amp; Bradstreet DUNS number for identifying an organization or business person
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/duns")
     */
    private $dun;

    /**
     * @var string|null email address
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/email")
     * @Assert\Email
     */
    private $email;

    /**
     * @var Collection<Person>|null people working for this organization
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Schema\Person")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/employees")
     */
    private $employees;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $ethicsPolicy;

    /**
     * @var string|null the fax number
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/faxNumber")
     */
    private $faxNumber;

    /**
     * @var Collection<Person>|null a person who founded this organization
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Schema\Person")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/founders")
     */
    private $founders;

    /**
     * @var \DateTimeInterface|null the date that this organization was founded
     *
     * @ORM\Column(type="date", nullable=true)
     * @ApiProperty(iri="http://schema.org/foundingDate")
     * @Assert\Date
     */
    private $foundingDate;

    /**
     * @var Place|null the place where the Organization was founded
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\Place")
     * @ApiProperty(iri="http://schema.org/foundingLocation")
     */
    private $foundingLocation;

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
     * @var string|null The official name of the organization, e.g. the registered company name.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/legalName")
     */
    private $legalName;

    /**
     * @var string|null an organization identifier that uniquely identifies a legal entity as defined in ISO 17442
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/leiCode")
     */
    private $leiCode;

    /**
     * @var PostalAddress|null the location of for example where the event is happening, an organization is located, or where an action takes place
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\PostalAddress")
     * @ApiProperty(iri="http://schema.org/location")
     */
    private $location;

    /**
     * @var Organization|null an Organization (or ProgramMembership) to which this Person or Organization belongs
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Schema\Organization")
     * @ApiProperty(iri="http://schema.org/memberOf")
     */
    private $memberOf;

    /**
     * @var string[]|null the North American Industry Classification System (NAICS) code for a particular organization or business person
     *
     * @ORM\Column(type="simple_array", nullable=true)
     * @ApiProperty(iri="http://schema.org/naics")
     */
    private $naics;

    /**
     * @var QuantitativeValue|null The number of employees in an organization e.g. business.
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\QuantitativeValue")
     * @ApiProperty(iri="http://schema.org/numberOfEmployees")
     */
    private $numberOfEmployee;

    /**
     * @var Organization|null the larger organization that this organization is a \[\[subOrganization\]\] of, if any
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\Organization")
     * @ApiProperty(iri="http://schema.org/parentOrganization")
     */
    private $parentOrganization;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $slogan;

    /**
     * @var Organization|null A relationship between two organizations where the first includes the second, e.g., as a subsidiary. See also: the more specific 'department' property.
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Schema\Organization")
     * @ApiProperty(iri="http://schema.org/subOrganization")
     */
    private $subOrganization;

    /**
     * @var string|null The Tax / Fiscal ID of the organization or person, e.g. the TIN in the US or the CIF/NIF in Spain.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/taxID")
     */
    private $taxID;

    /**
     * @var string|null the telephone number
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/telephone")
     */
    private $telephone;

    /**
     * @var string|null the Value-added Tax ID of the organization or person
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/vatID")
     */
    private $vatID;

    public function __construct()
    {
        $this->alumnis = new ArrayCollection();
        $this->contactPoints = new ArrayCollection();
        $this->employees = new ArrayCollection();
        $this->founders = new ArrayCollection();
        $this->isicV4 = new ArrayCollection();
        $this->naics = new ArrayCollection();
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

    public function addAlumni(Person $alumni): self
    {
        $this->alumnis[] = $alumni;

        return $this;
    }

    public function removeAlumni(Person $alumni): self
    {
        $this->alumnis->removeElement($alumni);

        return $this;
    }

    public function getAlumnis(): Collection
    {
        return $this->alumnis;
    }

    public function setAward(?string $award): self
    {
        $this->award = $award;

        return $this;
    }

    public function getAward(): ?string
    {
        return $this->award;
    }

    public function addContactPoint(ContactPoint $contactPoint): self
    {
        $this->contactPoints[] = $contactPoint;

        return $this;
    }

    public function removeContactPoint(ContactPoint $contactPoint): self
    {
        $this->contactPoints->removeElement($contactPoint);

        return $this;
    }

    public function getContactPoints(): Collection
    {
        return $this->contactPoints;
    }

    public function setDepartment(?Organization $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getDepartment(): ?Organization
    {
        return $this->department;
    }

    public function setDissolutionDate(?\DateTimeInterface $dissolutionDate): self
    {
        $this->dissolutionDate = $dissolutionDate;

        return $this;
    }

    public function getDissolutionDate(): ?\DateTimeInterface
    {
        return $this->dissolutionDate;
    }

    public function setDun(?string $dun): self
    {
        $this->dun = $dun;

        return $this;
    }

    public function getDun(): ?string
    {
        return $this->dun;
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

    public function addEmployee(Person $employee): self
    {
        $this->employees[] = $employee;

        return $this;
    }

    public function removeEmployee(Person $employee): self
    {
        $this->employees->removeElement($employee);

        return $this;
    }

    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    public function setEthicsPolicy(?string $ethicsPolicy): self
    {
        $this->ethicsPolicy = $ethicsPolicy;

        return $this;
    }

    public function getEthicsPolicy(): ?string
    {
        return $this->ethicsPolicy;
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

    public function addFounder(Person $founder): self
    {
        $this->founders[] = $founder;

        return $this;
    }

    public function removeFounder(Person $founder): self
    {
        $this->founders->removeElement($founder);

        return $this;
    }

    public function getFounders(): Collection
    {
        return $this->founders;
    }

    public function setFoundingDate(?\DateTimeInterface $foundingDate): self
    {
        $this->foundingDate = $foundingDate;

        return $this;
    }

    public function getFoundingDate(): ?\DateTimeInterface
    {
        return $this->foundingDate;
    }

    public function setFoundingLocation(?Place $foundingLocation): self
    {
        $this->foundingLocation = $foundingLocation;

        return $this;
    }

    public function getFoundingLocation(): ?Place
    {
        return $this->foundingLocation;
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

    public function setLegalName(?string $legalName): self
    {
        $this->legalName = $legalName;

        return $this;
    }

    public function getLegalName(): ?string
    {
        return $this->legalName;
    }

    public function setLeiCode(?string $leiCode): self
    {
        $this->leiCode = $leiCode;

        return $this;
    }

    public function getLeiCode(): ?string
    {
        return $this->leiCode;
    }

    public function setLocation(?PostalAddress $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getLocation(): ?PostalAddress
    {
        return $this->location;
    }

    public function setMemberOf(?Organization $memberOf): self
    {
        $this->memberOf = $memberOf;

        return $this;
    }

    public function getMemberOf(): ?Organization
    {
        return $this->memberOf;
    }

    public function addNaic(string $naic): self
    {
        $this->naics[] = $naic;

        return $this;
    }

    public function removeNaic(string $naic): self
    {
        $this->naics->removeElement($naic);

        return $this;
    }

    public function getNaics(): Collection
    {
        return $this->naics;
    }

    public function setNumberOfEmployee(?QuantitativeValue $numberOfEmployee): self
    {
        $this->numberOfEmployee = $numberOfEmployee;

        return $this;
    }

    public function getNumberOfEmployee(): ?QuantitativeValue
    {
        return $this->numberOfEmployee;
    }

    public function setParentOrganization(?Organization $parentOrganization): self
    {
        $this->parentOrganization = $parentOrganization;

        return $this;
    }

    public function getParentOrganization(): ?Organization
    {
        return $this->parentOrganization;
    }

    public function setSlogan(?string $slogan): self
    {
        $this->slogan = $slogan;

        return $this;
    }

    public function getSlogan(): ?string
    {
        return $this->slogan;
    }

    public function setSubOrganization(?Organization $subOrganization): self
    {
        $this->subOrganization = $subOrganization;

        return $this;
    }

    public function getSubOrganization(): ?Organization
    {
        return $this->subOrganization;
    }

    public function setTaxID(?string $taxID): self
    {
        $this->taxID = $taxID;

        return $this;
    }

    public function getTaxID(): ?string
    {
        return $this->taxID;
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

    public function setVatID(?string $vatID): self
    {
        $this->vatID = $vatID;

        return $this;
    }

    public function getVatID(): ?string
    {
        return $this->vatID;
    }
}
