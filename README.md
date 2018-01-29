# Country Flags

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A small package to convert a country code to the corresponding country flag emoji.

## Installation

You can install the package via Composer:

``` bash
$ composer require stidges/country-flags
```

## Basic Usage

``` php
$countryFlag = new CountryFlag;

echo $countryFlag->get('NL'); // "🇳🇱"
```

## Aliasing

If you would like to make country codes available under a custom aliases, you can pass these to the constructor:

``` php
$countryFlag = new CountryFlag([
    'AA' => 'NL',
]);

echo $countryFlag->get('AA'); // "🇳🇱"
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email info@stidges.com instead of using the issue tracker.

## Credits

- [Stidges][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see License File for more information.

[ico-version]: https://img.shields.io/packagist/v/stidges/country-flags.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/stidges/country-flags/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/stidges/country-flags.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/stidges/country-flags.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/stidges/country-flags.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/stidges/country-flags
[link-travis]: https://travis-ci.org/stidges/country-flags
[link-scrutinizer]: https://scrutinizer-ci.com/g/stidges/country-flags/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/stidges/country-flags
[link-downloads]: https://packagist.org/packages/stidges/country-flags
[link-author]: https://github.com/stidges
[link-contributors]: ../../contributors
