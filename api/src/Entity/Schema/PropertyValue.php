<?php

declare(strict_types=1);

namespace App\Entity\Schema;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * A property-value pair, e.g. representing a feature of a product or place. Use the 'name' property for the name of the property. If there is an additional human-readable version of the value, put that into the 'description' property.\\n\\n Always use specific schema.org properties when a) they exist and b) you can populate them. Using PropertyValue as a substitute will typically not trigger the same effect as using the original, specific property.
 *
 * @see http://schema.org/PropertyValue Documentation on Schema.org
 *
 * @author Deji Akala <dejiakala@gmail.com>
 *
 * @ORM\MappedSuperclass
 * @ApiResource(iri="http://schema.org/PropertyValue")
 */
abstract class PropertyValue extends Thing
{
    /**
     * @var float|null the upper value of some characteristic or property
     *
     * @ORM\Column(type="float", nullable=true)
     * @ApiProperty(iri="http://schema.org/maxValue")
     */
    private $maxValue;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $measurementTechnique;

    /**
     * @var float|null the lower value of some characteristic or property
     *
     * @ORM\Column(type="float", nullable=true)
     * @ApiProperty(iri="http://schema.org/minValue")
     */
    private $minValue;

    /**
     * @var string|null A commonly used identifier for the characteristic represented by the property, e.g. a manufacturer or a standard code for a property. propertyID can be (1) a prefixed string, mainly meant to be used with standards for product properties; (2) a site-specific, non-prefixed string (e.g. the primary key of the property or the vendor-specific id of the property), or (3) a URL indicating the type of the property, either pointing to an external vocabulary, or a Web resource that describes the property (e.g. a glossary entry). Standards bodies should promote a standard prefix for the identifiers of properties from their standards.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/propertyID")
     */
    private $propertyID;

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

    public function setMeasurementTechnique(?string $measurementTechnique): self
    {
        $this->measurementTechnique = $measurementTechnique;

        return $this;
    }

    public function getMeasurementTechnique(): ?string
    {
        return $this->measurementTechnique;
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

    public function setPropertyID(?string $propertyID): self
    {
        $this->propertyID = $propertyID;

        return $this;
    }

    public function getPropertyID(): ?string
    {
        return $this->propertyID;
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
