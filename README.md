HtCountryModule
===============
[![Master Branch Build Status](https://travis-ci.org/hrevert/HtCountryModule.svg?branch=master)](http://travis-ci.org/hrevert/HtCountryModule)
[![Latest Stable Version](https://poser.pugx.org/hrevert/ht-country-module/v/stable.png)](https://packagist.org/packages/hrevert/ht-country-module)
[![Total Downloads](https://poser.pugx.org/hrevert/ht-country-module/downloads.png)](https://packagist.org/packages/hrevert/ht-country-module)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/hrevert/HtCountryModule/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/hrevert/HtCountryModule/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/hrevert/HtCountryModule/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/hrevert/HtCountryModule/?branch=master)


A Zend Framework 2 module for country and subdivision data. This module integrates [lib-country](https://github.com/phine/lib-country) with [Zend Framework 2](https://github.com/zendframework/zf2).

## Requirements
* [lib-country](https://github.com/phine/lib-country)
* [Zend Framework 2](https://github.com/zendframework/zf2)

## Usage
Please read the docs of [lib-country](https://github.com/phine/lib-country) first.
### Using Services
```php
// From ServiceManager
/** @var Phine\Country\Loader\Loader $countryLoader */
$countryLoader = $serviceManager->get('CountryLoader');
```

### Using hydrator strategy
```php
$strategy = new HtCountryModule\Hydrator\Strategy\CountryStrategy;
// or $strategy = $serviceManager->get('HtCountryModule\Hydrator\Strategy\CountryStrategy');

/** @var Phine\Country\Country $country */
$country = $strategy->hydrate('US');

echo $strategy->extract($country); // will print US
```

### Using country validator
```php
$validator = new HtCountryModule\Validator\CountryValidator;
// or $validator = $serviceManager->get('ValidatorManager')->get('CountryValidator');
var_dump($validator->isValid('asdfasfd')); // bool(false)
var_dump($validator->isValid('US')); // bool(true)
```

## Installation
* Add `"hrevert/ht-country-module": "1.0.*"` to composer.json and run `php composer.phar update`
* Register `HtCountryModule` as module in `config/application.config.php`
