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
 * A person (alive, dead, undead, or fictional).
 *
 * @see http://schema.org/Person Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/Person")
 */
class Person
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
     * @var string|null an additional name for a Person, can be used for a middle name
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/additionalName")
     */
    private $additionalName;

    /**
     * @var PostalAddress|null physical address of the item
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Schema\PostalAddress")
     * @ApiProperty(iri="http://schema.org/address")
     */
    private $address;

    /**
     * @var EducationalOrganization|null an organization that the person is an alumni of
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Schema\EducationalOrganization")
     * @ApiProperty(iri="http://schema.org/alumniOf")
     */
    private $alumniOf;

    /**
     * @var string|null awards won by or for this item
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/awards")
     */
    private $award;

    /**
     * @var \DateTimeInterface|null date of birth
     *
     * @ORM\Column(type="date", nullable=true)
     * @ApiProperty(iri="http://schema.org/birthDate")
     * @Assert\Date
     */
    private $birthDate;

    /**
     * @var Place|null the place where the person was born
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\Place")
     * @ApiProperty(iri="http://schema.org/birthPlace")
     */
    private $birthPlace;

    /**
     * @var \DateTimeInterface|null date of death
     *
     * @ORM\Column(type="date", nullable=true)
     * @ApiProperty(iri="http://schema.org/deathDate")
     * @Assert\Date
     */
    private $deathDate;

    /**
     * @var Place|null the place where the person died
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\Place")
     * @ApiProperty(iri="http://schema.org/deathPlace")
     */
    private $deathPlace;

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
     * @var string Family name. In the U.S., the last name of an Person. This can be used along with givenName instead of the name property.
     *
     * @ORM\Column(type="text")
     * @ApiProperty(iri="http://schema.org/familyName")
     * @Assert\NotNull
     */
    private $familyName;

    /**
     * @var string|null the fax number
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/faxNumber")
     */
    private $faxNumber;

    /**
     * @var string|null Gender of the person. While http://schema.org/Male and http://schema.org/Female may be used, text strings are also acceptable for people who do not identify as a binary gender.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/gender")
     */
    private $gender;

    /**
     * @var string Given name. In the U.S., the first name of a Person. This can be used along with familyName instead of the name property.
     *
     * @ORM\Column(type="text")
     * @ApiProperty(iri="http://schema.org/givenName")
     * @Assert\NotNull
     */
    private $givenName;

    /**
     * @var EducationalOccupationalCredential|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\EducationalOccupationalCredential")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hasCredential;

    /**
     * @var Occupation|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\Occupation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hasOccupation;

    /**
     * @var QuantitativeValue|null the height of the item
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\QuantitativeValue")
     * @ApiProperty(iri="http://schema.org/height")
     */
    private $height;

    /**
     * @var Place|null a contact location for a person's residence
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Schema\Place")
     * @ApiProperty(iri="http://schema.org/homeLocation")
     */
    private $homeLocation;

    /**
     * @var string|null an honorific prefix preceding a Person's name such as Dr/Mrs/Mr
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/honorificPrefix")
     */
    private $honorificPrefix;

    /**
     * @var string|null An honorific suffix preceding a Person's name such as M.D. /PhD/MSCSW.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/honorificSuffix")
     */
    private $honorificSuffix;

    /**
     * @var string|null the job title of the person (for example, Financial Manager)
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/jobTitle")
     */
    private $jobTitle;

    /**
     * @var Language|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\Language")
     * @ORM\JoinColumn(nullable=false)
     */
    private $knowsLanguage;

    /**
     * @var Country|null nationality of the person
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Schema\Country")
     * @ApiProperty(iri="http://schema.org/nationality")
     */
    private $nationality;

    /**
     * @var Collection<Person>|null a sibling of the person
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Schema\Person")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/siblings")
     */
    private $siblings;

    /**
     * @var Person|null the person's spouse
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\Person")
     * @ApiProperty(iri="http://schema.org/spouse")
     */
    private $spouse;

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

    /**
     * @var QuantitativeValue|null the weight of the product or person
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\QuantitativeValue")
     * @ApiProperty(iri="http://schema.org/weight")
     */
    private $weight;

    public function __construct()
    {
        $this->siblings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setAdditionalName(?string $additionalName): self
    {
        $this->additionalName = $additionalName;

        return $this;
    }

    public function getAdditionalName(): ?string
    {
        return $this->additionalName;
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

    public function setAlumniOf(?EducationalOrganization $alumniOf): self
    {
        $this->alumniOf = $alumniOf;

        return $this;
    }

    public function getAlumniOf(): ?EducationalOrganization
    {
        return $this->alumniOf;
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

    public function setBirthDate(?\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthPlace(?Place $birthPlace): self
    {
        $this->birthPlace = $birthPlace;

        return $this;
    }

    public function getBirthPlace(): ?Place
    {
        return $this->birthPlace;
    }

    public function setDeathDate(?\DateTimeInterface $deathDate): self
    {
        $this->deathDate = $deathDate;

        return $this;
    }

    public function getDeathDate(): ?\DateTimeInterface
    {
        return $this->deathDate;
    }

    public function setDeathPlace(?Place $deathPlace): self
    {
        $this->deathPlace = $deathPlace;

        return $this;
    }

    public function getDeathPlace(): ?Place
    {
        return $this->deathPlace;
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

    public function setFamilyName(string $familyName): self
    {
        $this->familyName = $familyName;

        return $this;
    }

    public function getFamilyName(): string
    {
        return $this->familyName;
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

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGivenName(string $givenName): self
    {
        $this->givenName = $givenName;

        return $this;
    }

    public function getGivenName(): string
    {
        return $this->givenName;
    }

    public function setHasCredential(?EducationalOccupationalCredential $hasCredential): self
    {
        $this->hasCredential = $hasCredential;

        return $this;
    }

    public function getHasCredential(): ?EducationalOccupationalCredential
    {
        return $this->hasCredential;
    }

    public function setHasOccupation(?Occupation $hasOccupation): self
    {
        $this->hasOccupation = $hasOccupation;

        return $this;
    }

    public function getHasOccupation(): ?Occupation
    {
        return $this->hasOccupation;
    }

    public function setHeight(?QuantitativeValue $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getHeight(): ?QuantitativeValue
    {
        return $this->height;
    }

    public function setHomeLocation(?Place $homeLocation): self
    {
        $this->homeLocation = $homeLocation;

        return $this;
    }

    public function getHomeLocation(): ?Place
    {
        return $this->homeLocation;
    }

    public function setHonorificPrefix(?string $honorificPrefix): self
    {
        $this->honorificPrefix = $honorificPrefix;

        return $this;
    }

    public function getHonorificPrefix(): ?string
    {
        return $this->honorificPrefix;
    }

    public function setHonorificSuffix(?string $honorificSuffix): self
    {
        $this->honorificSuffix = $honorificSuffix;

        return $this;
    }

    public function getHonorificSuffix(): ?string
    {
        return $this->honorificSuffix;
    }

    public function setJobTitle(?string $jobTitle): self
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setKnowsLanguage(?Language $knowsLanguage): self
    {
        $this->knowsLanguage = $knowsLanguage;

        return $this;
    }

    public function getKnowsLanguage(): ?Language
    {
        return $this->knowsLanguage;
    }

    public function setNationality(?Country $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getNationality(): ?Country
    {
        return $this->nationality;
    }

    public function addSibling(Person $sibling): self
    {
        $this->siblings[] = $sibling;

        return $this;
    }

    public function removeSibling(Person $sibling): self
    {
        $this->siblings->removeElement($sibling);

        return $this;
    }

    public function getSiblings(): Collection
    {
        return $this->siblings;
    }

    public function setSpouse(?Person $spouse): self
    {
        $this->spouse = $spouse;

        return $this;
    }

    public function getSpouse(): ?Person
    {
        return $this->spouse;
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

    public function setWeight(?QuantitativeValue $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getWeight(): ?QuantitativeValue
    {
        return $this->weight;
    }
}
