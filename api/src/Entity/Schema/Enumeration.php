<?php

declare(strict_types=1);

namespace App\Entity\Schema;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * Lists or enumerations—for example, a list of cuisines or music genres, etc.
 *
 * @see http://schema.org/Enumeration Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\MappedSuperclass
 * @ApiResource(iri="http://schema.org/Enumeration")
 */
abstract class Enumeration
{
}
