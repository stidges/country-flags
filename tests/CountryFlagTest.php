<?php

namespace Stidges\Tests;

use PHPUnit\Framework\TestCase;
use Stidges\CountryFlags\CountryFlag;

class CountryFlagTest extends TestCase
{
    /** @test */
    public function it_throws_an_exception_if_a_country_code_of_less_than_2_characters_is_provided()
    {
        $this->expectException(\InvalidArgumentException::class);

        (new CountryFlag)->get('a');
    }

    /** @test */
    public function it_throws_an_exception_if_a_country_code_of_more_than_2_characters_is_provided()
    {
        $this->expectException(\InvalidArgumentException::class);

        (new CountryFlag)->get('aaa');
    }

    /**
     * @test
     * @dataProvider flagsProvider
     */
    public function it_converts_country_codes_to_the_correct_flag($code, $flag)
    {
        $result = (new CountryFlag)->get($code);

        $this->assertEquals($flag, $result);
    }

    /** @test */
    public function it_converts_a_lowercase_country_code_to_the_correct_flag()
    {
        $result = (new CountryFlag)->get('nl');

        $this->assertEquals('🇳🇱', $result);
    }

    /** @test */
    public function it_allows_aliases_to_be_defined()
    {
        $countryFlag = new CountryFlag(['uk' => 'gb']);

        $result = $countryFlag->get('uk');

        $this->assertEquals('🇬🇧', $result);
    }

    /** @test */
    public function it_matches_aliases_in_a_case_insensitive_manner()
    {
        $countryFlag = new CountryFlag(['uk' => 'gb']);

        $result = $countryFlag->get('UK');

        $this->assertEquals('🇬🇧', $result);
    }

    public function flagsProvider()
    {
        return [
            ['AD', '🇦🇩'],
            ['AE', '🇦🇪'],
            ['AF', '🇦🇫'],
            ['AG', '🇦🇬'],
            ['AI', '🇦🇮'],
            ['AL', '🇦🇱'],
            ['AM', '🇦🇲'],
            ['AO', '🇦🇴'],
            ['AQ', '🇦🇶'],
            ['AR', '🇦🇷'],
            ['AS', '🇦🇸'],
            ['AT', '🇦🇹'],
            ['AU', '🇦🇺'],
            ['AW', '🇦🇼'],
            ['AX', '🇦🇽'],
            ['AZ', '🇦🇿'],
            ['BA', '🇧🇦'],
            ['BB', '🇧🇧'],
            ['BD', '🇧🇩'],
            ['BE', '🇧🇪'],
            ['BF', '🇧🇫'],
            ['BG', '🇧🇬'],
            ['BH', '🇧🇭'],
            ['BI', '🇧🇮'],
            ['BJ', '🇧🇯'],
            ['BL', '🇧🇱'],
            ['BM', '🇧🇲'],
            ['BN', '🇧🇳'],
            ['BO', '🇧🇴'],
            ['BQ', '🇧🇶'],
            ['BR', '🇧🇷'],
            ['BS', '🇧🇸'],
            ['BT', '🇧🇹'],
            ['BV', '🇧🇻'],
            ['BW', '🇧🇼'],
            ['BY', '🇧🇾'],
            ['BZ', '🇧🇿'],
            ['CA', '🇨🇦'],
            ['CC', '🇨🇨'],
            ['CD', '🇨🇩'],
            ['CF', '🇨🇫'],
            ['CG', '🇨🇬'],
            ['CH', '🇨🇭'],
            ['CI', '🇨🇮'],
            ['CK', '🇨🇰'],
            ['CL', '🇨🇱'],
            ['CM', '🇨🇲'],
            ['CN', '🇨🇳'],
            ['CO', '🇨🇴'],
            ['CR', '🇨🇷'],
            ['CU', '🇨🇺'],
            ['CV', '🇨🇻'],
            ['CW', '🇨🇼'],
            ['CX', '🇨🇽'],
            ['CY', '🇨🇾'],
            ['CZ', '🇨🇿'],
            ['DE', '🇩🇪'],
            ['DJ', '🇩🇯'],
            ['DK', '🇩🇰'],
            ['DM', '🇩🇲'],
            ['DO', '🇩🇴'],
            ['DZ', '🇩🇿'],
            ['EC', '🇪🇨'],
            ['EE', '🇪🇪'],
            ['EG', '🇪🇬'],
            ['EH', '🇪🇭'],
            ['ER', '🇪🇷'],
            ['ES', '🇪🇸'],
            ['ET', '🇪🇹'],
            ['FI', '🇫🇮'],
            ['FJ', '🇫🇯'],
            ['FK', '🇫🇰'],
            ['FM', '🇫🇲'],
            ['FO', '🇫🇴'],
            ['FR', '🇫🇷'],
            ['GA', '🇬🇦'],
            ['GB', '🇬🇧'],
            ['GD', '🇬🇩'],
            ['GE', '🇬🇪'],
            ['GF', '🇬🇫'],
            ['GG', '🇬🇬'],
            ['GH', '🇬🇭'],
            ['GI', '🇬🇮'],
            ['GL', '🇬🇱'],
            ['GM', '🇬🇲'],
            ['GN', '🇬🇳'],
            ['GP', '🇬🇵'],
            ['GQ', '🇬🇶'],
            ['GR', '🇬🇷'],
            ['GS', '🇬🇸'],
            ['GT', '🇬🇹'],
            ['GU', '🇬🇺'],
            ['GW', '🇬🇼'],
            ['GY', '🇬🇾'],
            ['HK', '🇭🇰'],
            ['HM', '🇭🇲'],
            ['HN', '🇭🇳'],
            ['HR', '🇭🇷'],
            ['HT', '🇭🇹'],
            ['HU', '🇭🇺'],
            ['ID', '🇮🇩'],
            ['IE', '🇮🇪'],
            ['IL', '🇮🇱'],
            ['IM', '🇮🇲'],
            ['IN', '🇮🇳'],
            ['IO', '🇮🇴'],
            ['IQ', '🇮🇶'],
            ['IR', '🇮🇷'],
            ['IS', '🇮🇸'],
            ['IT', '🇮🇹'],
            ['JE', '🇯🇪'],
            ['JM', '🇯🇲'],
            ['JO', '🇯🇴'],
            ['JP', '🇯🇵'],
            ['KE', '🇰🇪'],
            ['KG', '🇰🇬'],
            ['KH', '🇰🇭'],
            ['KI', '🇰🇮'],
            ['KM', '🇰🇲'],
            ['KN', '🇰🇳'],
            ['KP', '🇰🇵'],
            ['KR', '🇰🇷'],
            ['KW', '🇰🇼'],
            ['KY', '🇰🇾'],
            ['KZ', '🇰🇿'],
            ['LA', '🇱🇦'],
            ['LB', '🇱🇧'],
            ['LC', '🇱🇨'],
            ['LI', '🇱🇮'],
            ['LK', '🇱🇰'],
            ['LR', '🇱🇷'],
            ['LS', '🇱🇸'],
            ['LT', '🇱🇹'],
            ['LU', '🇱🇺'],
            ['LV', '🇱🇻'],
            ['LY', '🇱🇾'],
            ['MA', '🇲🇦'],
            ['MC', '🇲🇨'],
            ['MD', '🇲🇩'],
            ['ME', '🇲🇪'],
            ['MF', '🇲🇫'],
            ['MG', '🇲🇬'],
            ['MH', '🇲🇭'],
            ['MK', '🇲🇰'],
            ['ML', '🇲🇱'],
            ['MM', '🇲🇲'],
            ['MN', '🇲🇳'],
            ['MO', '🇲🇴'],
            ['MP', '🇲🇵'],
            ['MQ', '🇲🇶'],
            ['MR', '🇲🇷'],
            ['MS', '🇲🇸'],
            ['MT', '🇲🇹'],
            ['MU', '🇲🇺'],
            ['MV', '🇲🇻'],
            ['MW', '🇲🇼'],
            ['MX', '🇲🇽'],
            ['MY', '🇲🇾'],
            ['MZ', '🇲🇿'],
            ['NA', '🇳🇦'],
            ['NC', '🇳🇨'],
            ['NE', '🇳🇪'],
            ['NF', '🇳🇫'],
            ['NG', '🇳🇬'],
            ['NI', '🇳🇮'],
            ['NL', '🇳🇱'],
            ['NO', '🇳🇴'],
            ['NP', '🇳🇵'],
            ['NR', '🇳🇷'],
            ['NU', '🇳🇺'],
            ['NZ', '🇳🇿'],
            ['OM', '🇴🇲'],
            ['PA', '🇵🇦'],
            ['PE', '🇵🇪'],
            ['PF', '🇵🇫'],
            ['PG', '🇵🇬'],
            ['PH', '🇵🇭'],
            ['PK', '🇵🇰'],
            ['PL', '🇵🇱'],
            ['PM', '🇵🇲'],
            ['PN', '🇵🇳'],
            ['PR', '🇵🇷'],
            ['PS', '🇵🇸'],
            ['PT', '🇵🇹'],
            ['PW', '🇵🇼'],
            ['PY', '🇵🇾'],
            ['QA', '🇶🇦'],
            ['RE', '🇷🇪'],
            ['RO', '🇷🇴'],
            ['RS', '🇷🇸'],
            ['RU', '🇷🇺'],
            ['RW', '🇷🇼'],
            ['SA', '🇸🇦'],
            ['SB', '🇸🇧'],
            ['SC', '🇸🇨'],
            ['SD', '🇸🇩'],
            ['SE', '🇸🇪'],
            ['SG', '🇸🇬'],
            ['SH', '🇸🇭'],
            ['SI', '🇸🇮'],
            ['SJ', '🇸🇯'],
            ['SK', '🇸🇰'],
            ['SL', '🇸🇱'],
            ['SM', '🇸🇲'],
            ['SN', '🇸🇳'],
            ['SO', '🇸🇴'],
            ['SR', '🇸🇷'],
            ['SS', '🇸🇸'],
            ['ST', '🇸🇹'],
            ['SV', '🇸🇻'],
            ['SX', '🇸🇽'],
            ['SY', '🇸🇾'],
            ['SZ', '🇸🇿'],
            ['TC', '🇹🇨'],
            ['TD', '🇹🇩'],
            ['TF', '🇹🇫'],
            ['TG', '🇹🇬'],
            ['TH', '🇹🇭'],
            ['TJ', '🇹🇯'],
            ['TK', '🇹🇰'],
            ['TL', '🇹🇱'],
            ['TM', '🇹🇲'],
            ['TN', '🇹🇳'],
            ['TO', '🇹🇴'],
            ['TR', '🇹🇷'],
            ['TT', '🇹🇹'],
            ['TV', '🇹🇻'],
            ['TW', '🇹🇼'],
            ['TZ', '🇹🇿'],
            ['UA', '🇺🇦'],
            ['UG', '🇺🇬'],
            ['UM', '🇺🇲'],
            ['US', '🇺🇸'],
            ['UY', '🇺🇾'],
            ['UZ', '🇺🇿'],
            ['VA', '🇻🇦'],
            ['VC', '🇻🇨'],
            ['VE', '🇻🇪'],
            ['VG', '🇻🇬'],
            ['VI', '🇻🇮'],
            ['VN', '🇻🇳'],
            ['VU', '🇻🇺'],
            ['WF', '🇼🇫'],
            ['WS', '🇼🇸'],
            ['YE', '🇾🇪'],
            ['YT', '🇾🇹'],
            ['ZA', '🇿🇦'],
            ['ZM', '🇿🇲'],
            ['ZW', '🇿🇼'],
        ];
    }
}
