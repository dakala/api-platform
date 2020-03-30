<?php

declare(strict_types=1);

namespace App\Entity\Schema;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * A book.
 *
 * @see http://schema.org/Book Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/Book")
 */
class Book extends CreativeWork
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
     * @var bool|null
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $abridged;

    /**
     * @var string|null the edition of the book
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/bookEdition")
     */
    private $bookEdition;

    /**
     * @var Collection<Person>|null the illustrator of the book
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Schema\Person")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/illustrator")
     */
    private $illustrators;

    /**
     * @var string|null the ISBN of the book
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/isbn")
     */
    private $isbn;

    /**
     * @var int|null the number of pages in the book
     *
     * @ORM\Column(type="integer", nullable=true)
     * @ApiProperty(iri="http://schema.org/numberOfPages")
     */
    private $numberOfPage;

    public function __construct()
    {
        parent::__construct();

        $this->illustrators = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setAbridged(?bool $abridged): self
    {
        $this->abridged = $abridged;

        return $this;
    }

    public function getAbridged(): ?bool
    {
        return $this->abridged;
    }

    public function setBookEdition(?string $bookEdition): self
    {
        $this->bookEdition = $bookEdition;

        return $this;
    }

    public function getBookEdition(): ?string
    {
        return $this->bookEdition;
    }

    public function addIllustrator(Person $illustrator): self
    {
        $this->illustrators[] = $illustrator;

        return $this;
    }

    public function removeIllustrator(Person $illustrator): self
    {
        $this->illustrators->removeElement($illustrator);

        return $this;
    }

    public function getIllustrators(): Collection
    {
        return $this->illustrators;
    }

    public function setIsbn(?string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setNumberOfPage(?int $numberOfPage): self
    {
        $this->numberOfPage = $numberOfPage;

        return $this;
    }

    public function getNumberOfPage(): ?int
    {
        return $this->numberOfPage;
    }
}
