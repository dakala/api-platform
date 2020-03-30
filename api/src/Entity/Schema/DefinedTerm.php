<?php

declare(strict_types=1);

namespace App\Entity\Schema;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * The most generic type of item.
 *
 * @see http://schema.org/Thing Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/Thing")
 */
class DefinedTerm extends Thing
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
     * @var DefinedTermSet|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\DefinedTermSet")
     * @ORM\JoinColumn(nullable=false)
     */
    private $inDefinedTermSet;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $termCode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setInDefinedTermSet(?DefinedTermSet $inDefinedTermSet): self
    {
        $this->inDefinedTermSet = $inDefinedTermSet;

        return $this;
    }

    public function getInDefinedTermSet(): ?DefinedTermSet
    {
        return $this->inDefinedTermSet;
    }

    public function setTermCode(?string $termCode): self
    {
        $this->termCode = $termCode;

        return $this;
    }

    public function getTermCode(): ?string
    {
        return $this->termCode;
    }
}
