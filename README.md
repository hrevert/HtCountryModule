HtCountryModule
===============

A Zend Framework 2 module for country and subdivision data. This module integrates [lib-country](https://github.com/phine/lib-country) with [Zend Framework 2](https://github.com/zendframework/zf2).

## Requirements
* [lib-country](https://github.com/phine/lib-country)
* [Zend Framework 2](https://github.com/zendframework/zf2)

## Usage
Please read the docs of [lib-country](https://github.com/phine/lib-country) first.
### Using Services
```php
// From ServiceManager
/** @var Phine\Country\Loader\Loader */
$countryLoader = $serviceManager->get('CountryLoader');
```

### Using hydrator strategy
```php
$strategy = new HtCountryModule\Hydrator\Strategy\CountryStrategy;

/** @var Phine\Country\Country */
$country = $strategy->hydrate('US');

echo $strategy->extract($country); // will print US
```

## Installation
* Add `"hrevert/ht-country-module": "0.0.*"` to composer.json and run `php composer.phar update`
* Register `HtCountryModule` as module in `config/application.config.php`
