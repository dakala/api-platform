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
class DefinedTermSet extends Thing
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
     * @var DefinedTerm|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Schema\DefinedTerm")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hasDefinedTerm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setHasDefinedTerm(?DefinedTerm $hasDefinedTerm): self
    {
        $this->hasDefinedTerm = $hasDefinedTerm;

        return $this;
    }

    public function getHasDefinedTerm(): ?DefinedTerm
    {
        return $this->hasDefinedTerm;
    }
}
