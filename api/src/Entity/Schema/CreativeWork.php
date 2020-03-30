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
 * The most generic kind of creative work, including books, movies, photographs, software programs, etc.
 *
 * @see http://schema.org/CreativeWork Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\MappedSuperclass
 * @ApiResource(iri="http://schema.org/CreativeWork")
 */
abstract class CreativeWork
{
    /**
     * @var Thing|null the subject matter of the content
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\Thing")
     * @ApiProperty(iri="http://schema.org/about")
     */
    private $about;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $abstract;

    /**
     * @var string|null The human sensory perceptual system or cognitive faculty through which a person may process or perceive information. Expected values include: auditory, tactile, textual, visual, colorDependent, chartOnVisual, chemOnVisual, diagramOnVisual, mathOnVisual, musicOnVisual, textOnVisual.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/accessMode")
     */
    private $accessMode;

    /**
     * @var Person|null The author of this content or rating. Please note that author is special in that HTML 5 provides a special mechanism for indicating authorship via the rel tag. That is equivalent to this and may be used interchangeably.
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\Person")
     * @ApiProperty(iri="http://schema.org/author")
     */
    private $author;

    /**
     * @var string|null an award won by or for this item
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/award")
     */
    private $award;

    /**
     * @var CreativeWork|null a citation or reference to another creative work, such as another publication, web page, scholarly article, etc
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Schema\CreativeWork")
     * @ApiProperty(iri="http://schema.org/citation")
     */
    private $citation;

    /**
     * @var Place|null The location depicted or described in the content. For example, the location in a photograph or painting.
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\Place")
     * @ApiProperty(iri="http://schema.org/contentLocation")
     */
    private $contentLocation;

    /**
     * @var Collection<Person>|null a secondary contributor to the CreativeWork or Event
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Schema\Person")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/contributor")
     */
    private $contributors;

    /**
     * @var Collection<Person>|null the party holding the legal copyright to the CreativeWork
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Schema\Person")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/copyrightHolder")
     */
    private $copyrightHolders;

    /**
     * @var string|null the year during which the claimed copyright for the CreativeWork was first asserted
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/copyrightYear")
     */
    private $copyrightYear;

    /**
     * @var \DateTimeInterface|null the date on which the CreativeWork was created or the item was added to a DataFeed
     *
     * @ORM\Column(type="date", nullable=true)
     * @ApiProperty(iri="http://schema.org/dateCreated")
     * @Assert\Date
     */
    private $dateCreated;

    /**
     * @var \DateTimeInterface|null the date on which the CreativeWork was most recently modified or when the item's entry was modified within a DataFeed
     *
     * @ORM\Column(type="date", nullable=true)
     * @ApiProperty(iri="http://schema.org/dateModified")
     * @Assert\Date
     */
    private $dateModified;

    /**
     * @var \DateTimeInterface|null date of first broadcast/publication
     *
     * @ORM\Column(type="date", nullable=true)
     * @ApiProperty(iri="http://schema.org/datePublished")
     * @Assert\Date
     */
    private $datePublished;

    /**
     * @var string|null the purpose of a work in the context of education; for example, 'assignment', 'group work'
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/educationalUse")
     */
    private $educationalUse;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $encodingFormat;

    /**
     * @var \DateTimeInterface|null Date the content expires and is no longer useful or available. For example a \[\[VideoObject\]\] or \[\[NewsArticle\]\] whose availability or relevance is time-limited, or a \[\[ClaimReview\]\] fact check whose publisher wants to indicate that it may no longer be relevant (or helpful to highlight) after some date.
     *
     * @ORM\Column(type="date", nullable=true)
     * @ApiProperty(iri="http://schema.org/expires")
     * @Assert\Date
     */
    private $expire;

    /**
     * @var string|null genre of the creative work, broadcast channel or group
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/genre")
     */
    private $genre;

    /**
     * @var CreativeWork|null indicates a CreativeWork that is (in some sense) a part of this CreativeWork
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Schema\CreativeWork")
     * @ApiProperty(iri="http://schema.org/hasPart")
     */
    private $hasPart;

    /**
     * @var Language|null The language of the content or performance or used in an action. Please use one of the language codes from the \[IETF BCP 47 standard\](http://tools.ietf.org/html/bcp47). See also \[\[availableLanguage\]\].
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\Language")
     * @ApiProperty(iri="http://schema.org/inLanguage")
     */
    private $inLanguage;

    /**
     * @var CreativeWork|null A resource that was used in the creation of this resource. This term can be repeated for multiple sources. For example, http://example.com/great-multiplication-intro.html.
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\CreativeWork")
     * @ApiProperty(iri="http://schema.org/isBasedOn")
     */
    private $isBasedOn;

    /**
     * @var bool|null indicates whether this content is family friendly
     *
     * @ORM\Column(type="boolean", nullable=true)
     * @ApiProperty(iri="http://schema.org/isFamilyFriendly")
     */
    private $isFamilyFriendly;

    /**
     * @var CreativeWork|null indicates a CreativeWork that this CreativeWork is (in some sense) part of
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\CreativeWork")
     * @ApiProperty(iri="http://schema.org/isPartOf")
     */
    private $isPartOf;

    /**
     * @var string|null Keywords or tags used to describe this content. Multiple entries in a keywords list are typically delimited by commas.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/keywords")
     */
    private $keyword;

    /**
     * @var string|null The predominant type or kind characterizing the learning resource. For example, 'presentation', 'handout'.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/learningResourceType")
     */
    private $learningResourceType;

    /**
     * @var CreativeWork|null a license document that applies to this content, typically indicated by URL
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Schema\CreativeWork")
     * @ApiProperty(iri="http://schema.org/license")
     */
    private $license;

    /**
     * @var Thing|null indicates the primary entity described in some page or other CreativeWork
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Schema\Thing")
     * @ApiProperty(iri="http://schema.org/mainEntity")
     */
    private $mainEntity;

    /**
     * @var string|null A material that something is made from, e.g. leather, wool, cotton, paper.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/material")
     */
    private $material;

    /**
     * @var int|null the position of an item in a series or sequence of items
     *
     * @ORM\Column(type="integer", nullable=true)
     * @ApiProperty(iri="http://schema.org/position")
     */
    private $position;

    /**
     * @var Organization|null the publisher of the creative work
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\Organization")
     * @ApiProperty(iri="http://schema.org/publisher")
     */
    private $publisher;

    /**
     * @var string|null the textual content of this CreativeWork
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/text")
     */
    private $text;

    /**
     * @var string|null Approximate or typical time it takes to work with or through this learning resource for the typical intended target audience, e.g. 'P30M', 'P1H25M'.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/timeRequired")
     */
    private $timeRequired;

    /**
     * @var string|null The typical expected age range, e.g. '7-9', '11-'.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/typicalAgeRange")
     */
    private $typicalAgeRange;

    /**
     * @var string|null the version of the CreativeWork embodied by a specified resource
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/version")
     */
    private $version;

    public function __construct()
    {
        $this->contributors = new ArrayCollection();
        $this->copyrightHolders = new ArrayCollection();
    }

    public function setAbout(?Thing $about): self
    {
        $this->about = $about;

        return $this;
    }

    public function getAbout(): ?Thing
    {
        return $this->about;
    }

    public function setAbstract(?string $abstract): self
    {
        $this->abstract = $abstract;

        return $this;
    }

    public function getAbstract(): ?string
    {
        return $this->abstract;
    }

    public function setAccessMode(?string $accessMode): self
    {
        $this->accessMode = $accessMode;

        return $this;
    }

    public function getAccessMode(): ?string
    {
        return $this->accessMode;
    }

    public function setAuthor(?Person $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getAuthor(): ?Person
    {
        return $this->author;
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

    public function setCitation(?CreativeWork $citation): self
    {
        $this->citation = $citation;

        return $this;
    }

    public function getCitation(): ?CreativeWork
    {
        return $this->citation;
    }

    public function setContentLocation(?Place $contentLocation): self
    {
        $this->contentLocation = $contentLocation;

        return $this;
    }

    public function getContentLocation(): ?Place
    {
        return $this->contentLocation;
    }

    public function addContributor(Person $contributor): self
    {
        $this->contributors[] = $contributor;

        return $this;
    }

    public function removeContributor(Person $contributor): self
    {
        $this->contributors->removeElement($contributor);

        return $this;
    }

    public function getContributors(): Collection
    {
        return $this->contributors;
    }

    public function addCopyrightHolder(Person $copyrightHolder): self
    {
        $this->copyrightHolders[] = $copyrightHolder;

        return $this;
    }

    public function removeCopyrightHolder(Person $copyrightHolder): self
    {
        $this->copyrightHolders->removeElement($copyrightHolder);

        return $this;
    }

    public function getCopyrightHolders(): Collection
    {
        return $this->copyrightHolders;
    }

    public function setCopyrightYear(?string $copyrightYear): self
    {
        $this->copyrightYear = $copyrightYear;

        return $this;
    }

    public function getCopyrightYear(): ?string
    {
        return $this->copyrightYear;
    }

    public function setDateCreated(?\DateTimeInterface $dateCreated): self
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateModified(?\DateTimeInterface $dateModified): self
    {
        $this->dateModified = $dateModified;

        return $this;
    }

    public function getDateModified(): ?\DateTimeInterface
    {
        return $this->dateModified;
    }

    public function setDatePublished(?\DateTimeInterface $datePublished): self
    {
        $this->datePublished = $datePublished;

        return $this;
    }

    public function getDatePublished(): ?\DateTimeInterface
    {
        return $this->datePublished;
    }

    public function setEducationalUse(?string $educationalUse): self
    {
        $this->educationalUse = $educationalUse;

        return $this;
    }

    public function getEducationalUse(): ?string
    {
        return $this->educationalUse;
    }

    public function setEncodingFormat(?string $encodingFormat): self
    {
        $this->encodingFormat = $encodingFormat;

        return $this;
    }

    public function getEncodingFormat(): ?string
    {
        return $this->encodingFormat;
    }

    public function setExpire(?\DateTimeInterface $expire): self
    {
        $this->expire = $expire;

        return $this;
    }

    public function getExpire(): ?\DateTimeInterface
    {
        return $this->expire;
    }

    public function setGenre(?string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setHasPart(?CreativeWork $hasPart): self
    {
        $this->hasPart = $hasPart;

        return $this;
    }

    public function getHasPart(): ?CreativeWork
    {
        return $this->hasPart;
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

    public function setIsBasedOn(?CreativeWork $isBasedOn): self
    {
        $this->isBasedOn = $isBasedOn;

        return $this;
    }

    public function getIsBasedOn(): ?CreativeWork
    {
        return $this->isBasedOn;
    }

    public function setIsFamilyFriendly(?bool $isFamilyFriendly): self
    {
        $this->isFamilyFriendly = $isFamilyFriendly;

        return $this;
    }

    public function getIsFamilyFriendly(): ?bool
    {
        return $this->isFamilyFriendly;
    }

    public function setIsPartOf(?CreativeWork $isPartOf): self
    {
        $this->isPartOf = $isPartOf;

        return $this;
    }

    public function getIsPartOf(): ?CreativeWork
    {
        return $this->isPartOf;
    }

    public function setKeyword(?string $keyword): self
    {
        $this->keyword = $keyword;

        return $this;
    }

    public function getKeyword(): ?string
    {
        return $this->keyword;
    }

    public function setLearningResourceType(?string $learningResourceType): self
    {
        $this->learningResourceType = $learningResourceType;

        return $this;
    }

    public function getLearningResourceType(): ?string
    {
        return $this->learningResourceType;
    }

    public function setLicense(?CreativeWork $license): self
    {
        $this->license = $license;

        return $this;
    }

    public function getLicense(): ?CreativeWork
    {
        return $this->license;
    }

    public function setMainEntity(?Thing $mainEntity): self
    {
        $this->mainEntity = $mainEntity;

        return $this;
    }

    public function getMainEntity(): ?Thing
    {
        return $this->mainEntity;
    }

    public function setMaterial(?string $material): self
    {
        $this->material = $material;

        return $this;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPublisher(?Organization $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getPublisher(): ?Organization
    {
        return $this->publisher;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setTimeRequired(?string $timeRequired): self
    {
        $this->timeRequired = $timeRequired;

        return $this;
    }

    public function getTimeRequired(): ?string
    {
        return $this->timeRequired;
    }

    public function setTypicalAgeRange(?string $typicalAgeRange): self
    {
        $this->typicalAgeRange = $typicalAgeRange;

        return $this;
    }

    public function getTypicalAgeRange(): ?string
    {
        return $this->typicalAgeRange;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }
}
