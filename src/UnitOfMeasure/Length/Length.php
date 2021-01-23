<?php
/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

namespace PHPCoord\UnitOfMeasure\Length;

use PHPCoord\Exception\UnknownUnitOfMeasureException;
use PHPCoord\UnitOfMeasure\UnitOfMeasure;

abstract class Length implements UnitOfMeasure
{
    /**
     * British chain (Benoit 1895 B)
     * Uses Benoit's 1895 British yard-metre ratio as given by Bomford as 39.370113 inches per metre.  Used in West
     * Malaysian mapping.
     */
    public const EPSG_BRITISH_CHAIN_BENOIT_1895_B = 'urn:ogc:def:uom:EPSG::9062';

    /**
     * British chain (Sears 1922 truncated)
     * Uses Sear's 1922 British yard-metre ratio (UoM code 9040) truncated to 6 significant figures; this truncated
     * ratio (0.914398, UoM code 9099) then converted to other imperial units. 1 chSe(T) = 22 ydSe(T). Used in
     * metrication of Malaya RSO grid.
     */
    public const EPSG_BRITISH_CHAIN_SEARS_1922_TRUNCATED = 'urn:ogc:def:uom:EPSG::9301';

    /**
     * British chain (Sears 1922)
     * Uses Sear's 1922 British yard-metre ratio as given by Bomford as 39.370147 inches per metre.  Used in East
     * Malaysian and older New Zealand mapping.
     */
    public const EPSG_BRITISH_CHAIN_SEARS_1922 = 'urn:ogc:def:uom:EPSG::9042';

    /**
     * British foot (1936)
     * For the 1936 retriangulation OSGB defines the relationship of 10 feet of 1796 to the International metre through
     * the logarithmic relationship (10^0.48401603 exactly). 1 ft = 0.3048007491…m. Also used for metric conversions
     * in Ireland.
     */
    public const EPSG_BRITISH_FOOT_1936 = 'urn:ogc:def:uom:EPSG::9095';

    /**
     * British foot (Sears 1922)
     * Uses Sear's 1922 British yard-metre ratio as given by Bomford as 39.370147 inches per metre.  Used in East
     * Malaysian and older New Zealand mapping.
     */
    public const EPSG_BRITISH_FOOT_SEARS_1922 = 'urn:ogc:def:uom:EPSG::9041';

    /**
     * British yard (Sears 1922)
     * Uses Sear's 1922 British yard-metre ratio as given by Bomford as 39.370147 inches per metre.  Used in East
     * Malaysian and older New Zealand mapping.
     */
    public const EPSG_BRITISH_YARD_SEARS_1922 = 'urn:ogc:def:uom:EPSG::9040';

    /**
     * Clarke's foot
     * Assumes Clarke's 1865 ratio of 1 British foot = 0.3047972654 French legal metres applies to the international
     * metre.   Used in older Australian, southern African & British West Indian mapping.
     */
    public const EPSG_CLARKES_FOOT = 'urn:ogc:def:uom:EPSG::9005';

    /**
     * Clarke's link
     * =1/100 Clarke's chain. Assumes Clarke's 1865 ratio of 1 British foot = 0.3047972654 French legal metres applies
     * to the international metre.   Used in older Australian, southern African & British West Indian mapping.
     */
    public const EPSG_CLARKES_LINK = 'urn:ogc:def:uom:EPSG::9039';

    /**
     * Clarke's yard
     * =3 Clarke's feet.  Assumes Clarke's 1865 ratio of 1 British foot = 0.3047972654 French legal metres applies to
     * the international metre.   Used in older Australian, southern African & British West Indian mapping.
     */
    public const EPSG_CLARKES_YARD = 'urn:ogc:def:uom:EPSG::9037';

    /**
     * German legal metre
     * Used in Namibia.
     */
    public const EPSG_GERMAN_LEGAL_METRE = 'urn:ogc:def:uom:EPSG::9031';

    /**
     * Gold Coast foot
     * Used in Ghana and some adjacent parts of British west Africa prior to metrication, except for the metrication of
     * projection defining parameters when British foot (Sears 1922) used.
     */
    public const EPSG_GOLD_COAST_FOOT = 'urn:ogc:def:uom:EPSG::9094';

    /**
     * Indian foot
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British yard (= 3 British feet) taken to be
     * J.S.Clark's 1865 value of 0.9144025 metres.
     */
    public const EPSG_INDIAN_FOOT = 'urn:ogc:def:uom:EPSG::9080';

    /**
     * Indian yard
     * Indian Foot = 0.99999566 British feet (A.R.Clarke 1865).  British yard (= 3 British feet) taken to be
     * J.S.Clark's 1865 value of 0.9144025 metres.
     */
    public const EPSG_INDIAN_YARD = 'urn:ogc:def:uom:EPSG::9084';

    /**
     * US survey foot
     * Used in USA.
     */
    public const EPSG_US_SURVEY_FOOT = 'urn:ogc:def:uom:EPSG::9003';

    /**
     * centimetre.
     */
    public const EPSG_CENTIMETRE = 'urn:ogc:def:uom:EPSG::1033';

    /**
     * foot.
     */
    public const EPSG_FOOT = 'urn:ogc:def:uom:EPSG::9002';

    /**
     * kilometre.
     */
    public const EPSG_KILOMETRE = 'urn:ogc:def:uom:EPSG::9036';

    /**
     * link
     * =1/100 international chain.
     */
    public const EPSG_LINK = 'urn:ogc:def:uom:EPSG::9098';

    /**
     * metre
     * SI base unit for length.
     */
    public const EPSG_METRE = 'urn:ogc:def:uom:EPSG::9001';

    /**
     * millimetre.
     */
    public const EPSG_MILLIMETRE = 'urn:ogc:def:uom:EPSG::1025';

    protected static array $sridData = [
        'urn:ogc:def:uom:EPSG::1025' => [
            'name' => 'millimetre',
        ],
        'urn:ogc:def:uom:EPSG::1033' => [
            'name' => 'centimetre',
        ],
        'urn:ogc:def:uom:EPSG::9001' => [
            'name' => 'metre',
        ],
        'urn:ogc:def:uom:EPSG::9002' => [
            'name' => 'foot',
        ],
        'urn:ogc:def:uom:EPSG::9003' => [
            'name' => 'US survey foot',
        ],
        'urn:ogc:def:uom:EPSG::9005' => [
            'name' => 'Clarke\'s foot',
        ],
        'urn:ogc:def:uom:EPSG::9031' => [
            'name' => 'German legal metre',
        ],
        'urn:ogc:def:uom:EPSG::9036' => [
            'name' => 'kilometre',
        ],
        'urn:ogc:def:uom:EPSG::9037' => [
            'name' => 'Clarke\'s yard',
        ],
        'urn:ogc:def:uom:EPSG::9039' => [
            'name' => 'Clarke\'s link',
        ],
        'urn:ogc:def:uom:EPSG::9040' => [
            'name' => 'British yard (Sears 1922)',
        ],
        'urn:ogc:def:uom:EPSG::9041' => [
            'name' => 'British foot (Sears 1922)',
        ],
        'urn:ogc:def:uom:EPSG::9042' => [
            'name' => 'British chain (Sears 1922)',
        ],
        'urn:ogc:def:uom:EPSG::9062' => [
            'name' => 'British chain (Benoit 1895 B)',
        ],
        'urn:ogc:def:uom:EPSG::9080' => [
            'name' => 'Indian foot',
        ],
        'urn:ogc:def:uom:EPSG::9084' => [
            'name' => 'Indian yard',
        ],
        'urn:ogc:def:uom:EPSG::9094' => [
            'name' => 'Gold Coast foot',
        ],
        'urn:ogc:def:uom:EPSG::9095' => [
            'name' => 'British foot (1936)',
        ],
        'urn:ogc:def:uom:EPSG::9098' => [
            'name' => 'link',
        ],
        'urn:ogc:def:uom:EPSG::9301' => [
            'name' => 'British chain (Sears 1922 truncated)',
        ],
    ];

    abstract public function asMetres(): Metre;

    public function add(self $unit): self
    {
        $resultAsMetres = new Metre($this->asMetres()->getValue() + $unit->asMetres()->getValue());
        $conversionRatio = (new static(1))->asMetres()->getValue();

        return new static($resultAsMetres->getValue() / $conversionRatio);
    }

    public function subtract(self $unit): self
    {
        $resultAsMetres = new Metre($this->asMetres()->getValue() - $unit->asMetres()->getValue());
        $conversionRatio = (new static(1))->asMetres()->getValue();

        return new static($resultAsMetres->getValue() / $conversionRatio);
    }

    public function multiply(float $multiplicand): self
    {
        return new static($this->getValue() * $multiplicand);
    }

    public function divide(float $divisor): self
    {
        return new static($this->getValue() / $divisor);
    }

    public static function makeUnit(float $measurement, string $srid): self
    {
        switch ($srid) {
            case self::EPSG_METRE:
                return new Metre($measurement);
            case self::EPSG_KILOMETRE:
                return new Kilometre($measurement);
            case self::EPSG_CENTIMETRE:
                return new Centimetre($measurement);
            case self::EPSG_MILLIMETRE:
                return new Millimetre($measurement);
            case self::EPSG_FOOT:
                return new Foot($measurement);
            case self::EPSG_LINK:
                return new Link($measurement);
            case self::EPSG_BRITISH_CHAIN_BENOIT_1895_B:
                return new BritishChain1895BenoitB($measurement);
            case self::EPSG_BRITISH_FOOT_SEARS_1922:
                return new BritishFoot1922Sears($measurement);
            case self::EPSG_BRITISH_YARD_SEARS_1922:
                return new BritishYard1922Sears($measurement);
            case self::EPSG_BRITISH_CHAIN_SEARS_1922:
                return new BritishChain1922Sears($measurement);
            case self::EPSG_BRITISH_CHAIN_SEARS_1922_TRUNCATED:
                return new BritishChain1922SearsTruncated($measurement);
            case self::EPSG_BRITISH_FOOT_1936:
                return new BritishFoot1936($measurement);
            case self::EPSG_US_SURVEY_FOOT:
                return new USSurveyFoot($measurement);
            case self::EPSG_CLARKES_FOOT:
                return new ClarkeFoot($measurement);
            case self::EPSG_CLARKES_YARD:
                return new ClarkeYard($measurement);
            case self::EPSG_CLARKES_LINK:
                return new ClarkeLink($measurement);
            case self::EPSG_INDIAN_FOOT:
                return new IndianFoot($measurement);
            case self::EPSG_INDIAN_YARD:
                return new IndianYard($measurement);
            case self::EPSG_GOLD_COAST_FOOT:
                return new GoldCoastFoot($measurement);
            case self::EPSG_GERMAN_LEGAL_METRE:
                return new GermanLegalMetre($measurement);
        }

        throw new UnknownUnitOfMeasureException($srid);
    }

    public static function getSupportedSRIDs(): array
    {
        $supported = [];
        foreach (static::$sridData as $srid => $data) {
            $supported[$srid] = $data['name'];
        }

        return $supported;
    }

    public static function convert(self $length, string $targetSRID): self
    {
        $conversionRatio = static::makeUnit(1, $targetSRID)->asMetres()->getValue();

        return self::makeUnit($length->asMetres()->getValue() / $conversionRatio, $targetSRID);
    }

    public function __toString(): string
    {
        return (string) $this->getValue();
    }
}
