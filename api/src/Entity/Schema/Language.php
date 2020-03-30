<?php

declare(strict_types=1);

namespace App\Entity\Schema;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Natural languages such as Spanish, Tamil, Hindi, English, etc. Formal language code tags expressed in \[BCP 47\](https://en.wikipedia.org/wiki/IETF\_language\_tag) can be used via the \[\[alternateName\]\] property. The Language type previously also covered programming languages such as Scheme and Lisp, which are now best represented using \[\[ComputerLanguage\]\].
 *
 * @see http://schema.org/Language Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/Language")
 */
class Language extends Thing
{
    /**
     * @var int|null
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
