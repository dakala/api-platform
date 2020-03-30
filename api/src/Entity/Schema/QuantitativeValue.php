<?php

declare(strict_types=1);

namespace App\Entity\Schema;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * A point value or interval for product characteristics and other purposes.
 *
 * @see http://schema.org/QuantitativeValue Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/QuantitativeValue")
 */
class QuantitativeValue extends Thing
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
     * @var PropertyValue|null A property-value pair representing an additional characteristics of the entity, e.g. a product feature or another characteristic for which there is no matching property in schema.org.\\n\\nNote: Publishers should be aware that applications designed to use specific schema.org properties (e.g. http://schema.org/width, http://schema.org/color, http://schema.org/gtin13, ...) will typically expect such data to be provided using those properties, rather than using the generic property/value mechanism.
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Schema\PropertyValue")
     * @ApiProperty(iri="http://schema.org/additionalProperty")
     */
    private $additionalProperty;

    /**
     * @var float|null the upper value of some characteristic or property
     *
     * @ORM\Column(type="float", nullable=true)
     * @ApiProperty(iri="http://schema.org/maxValue")
     */
    private $maxValue;

    /**
     * @var float|null the lower value of some characteristic or property
     *
     * @ORM\Column(type="float", nullable=true)
     * @ApiProperty(iri="http://schema.org/minValue")
     */
    private $minValue;

    /**
     * @var string|null The unit of measurement given using the UN/CEFACT Common Code (3 characters) or a URL. Other codes than the UN/CEFACT Common Code may be used with a prefix followed by a colon.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/unitCode")
     */
    private $unitCode;

    /**
     * @var string|null A string or text indicating the unit of measurement. Useful if you cannot provide a standard unit code for [unitCode](unitCode).
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/unitText")
     */
    private $unitText;

    /**
     * @var string|null The value of the quantitative value or property value node.\\n\\n\* For \[\[QuantitativeValue\]\] and \[\[MonetaryAmount\]\], the recommended type for values is 'Number'.\\n\* For \[\[PropertyValue\]\], it can be 'Text;', 'Number', 'Boolean', or 'StructuredValue'.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/value")
     */
    private $value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setAdditionalProperty(?PropertyValue $additionalProperty): self
    {
        $this->additionalProperty = $additionalProperty;

        return $this;
    }

    public function getAdditionalProperty(): ?PropertyValue
    {
        return $this->additionalProperty;
    }

    /**
     * @param float|null $maxValue
     */
    public function setMaxValue($maxValue): self
    {
        $this->maxValue = $maxValue;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getMaxValue()
    {
        return $this->maxValue;
    }

    /**
     * @param float|null $minValue
     */
    public function setMinValue($minValue): self
    {
        $this->minValue = $minValue;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getMinValue()
    {
        return $this->minValue;
    }

    public function setUnitCode(?string $unitCode): self
    {
        $this->unitCode = $unitCode;

        return $this;
    }

    public function getUnitCode(): ?string
    {
        return $this->unitCode;
    }

    public function setUnitText(?string $unitText): self
    {
        $this->unitText = $unitText;

        return $this;
    }

    public function getUnitText(): ?string
    {
        return $this->unitText;
    }

    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }
}
