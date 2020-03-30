<?php

declare(strict_types=1);

namespace App\Entity\Schema;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * An educational organization.
 *
 * @see http://schema.org/EducationalOrganization Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/EducationalOrganization")
 */
class EducationalOrganization extends Organization
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
