<?php

namespace Stidges\CountryFlags;

class CountryFlag
{
    /**
     * The number by which to offset the character code to get the regional indicator
     *
     * @var int
     */
    const INDICATOR_OFFSET = 127397;

    /**
     * A map of aliases for country codes.
     *
     * @var array
     */
    private $aliases = [];

    /**
     * Create a new country flag converter.
     *
     * @param  array  $aliases
     */
    public function __construct(array $aliases = [])
    {
        $this->setAliases($aliases);
    }

    /**
     * Get the flag for the given country code.
     *
     * @param  string  $countryCode
     * @return string
     */
    public function get($countryCode)
    {
        if (strlen($countryCode) !== 2) {
            throw new \InvalidArgumentException('Please provide a 2 character country code.');
        }

        $countryCode = strtoupper($countryCode);

        if (array_key_exists($countryCode, $this->aliases)) {
            $countryCode = $this->aliases[$countryCode];
        }

        return implode('', array_map([$this, 'toUnicode'], str_split($countryCode)));
    }

    /**
     * Set the country code aliases.
     *
     * @param  array  $aliases
     */
    public function setAliases(array $aliases)
    {
        $this->aliases = [];

        foreach ($aliases as $alias => $countryCode) {
            $this->aliases[strtoupper($alias)] = strtoupper($countryCode);
        }
    }

    /**
     * Convert the given character to unicode.
     *
     * @param  string  $char
     * @return string
     */
    private function toUnicode($char)
    {
        return mb_convert_encoding('&#'.self::toRegionalIndicator($char).';', 'UTF-8', 'HTML-ENTITIES');
    }

    /**
     * Convert the given characters to it's regional indicator codepoint.
     *
     * @param  string  $char
     * @return int
     */
    private function toRegionalIndicator($char)
    {
        return ord($char) + self::INDICATOR_OFFSET;
    }
}
