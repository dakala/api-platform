<?php

declare(strict_types=1);

namespace App\Enum\Schema;

use ApiPlatform\Core\Annotation\ApiResource;
use MyCLabs\Enum\Enum;

/**
 * Enumerated options related to a ContactPoint.
 *
 * @see http://schema.org/ContactPointOption Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 * @ApiResource(iri="http://schema.org/ContactPointOption")
 */
class ContactPointOption extends Enum
{
    /**
     * @var string uses devices to support users with hearing impairments
     */
    public const HEARING_IMPAIRED_SUPPORTED = 'http://schema.org/HearingImpairedSupported';

    /**
     * @var string the associated telephone number is toll free
     */
    public const TOLL_FREE = 'http://schema.org/TollFree';
}
