<?php

declare(strict_types=1);

namespace App\Entity\Schema;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * A geographical region, typically under the jurisdiction of a particular government.
 *
 * @see http://schema.org/AdministrativeArea Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\MappedSuperclass
 * @ApiResource(iri="http://schema.org/AdministrativeArea")
 */
abstract class AdministrativeArea
{
}
