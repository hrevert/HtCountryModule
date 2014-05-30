<?php
namespace HtCountryModuleTest\Hydrator\Strategy;

use HtCountryModule\Hydrator\Strategy\CountryStrategy;
use Phine\Country\Loader\Loader;

class CountryStrategyTest extends \PHPUnit_Framework_TestCase
{
    protected $strategy;

    public function setUp()
    {
        $this->strategy = new CountryStrategy;
    }

    public function testHydrate()
    {
        $loader = new Loader;
        $this->assertEquals($loader->loadCountry('NP'), $this->strategy->hydrate('NP'));
    }

    public function testExtract()
    {
        $loader = new Loader;
        $country = $loader->loadCountry('NP');
        $this->assertEquals($country->getAlpha2Code(), $this->strategy->extract($country));
    }

    public function testGetExceptionWithInvalidCountryOnExtraction()
    {
        $this->setExpectedException('HtCountryModule\Hydrator\Strategy\Exception\InvalidArgumentException');
        $this->strategy->extract('');
    }
}
