<?php
namespace HtCountryModuleTest\Factory\Hydrator\Strategy;

use Zend\ServiceManager\ServiceManager;
use HtCountryModule\Factory\Hydrator\Strategy\CountryStrategyFactory;
use Phine\Country\Loader\Loader;

class CountryStrategyFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $factory = new CountryStrategyFactory();
        $serviceManager = new ServiceManager;
        $serviceManager->setService('Phine\Country\Loader\Loader', new Loader);
        $this->assertInstanceOf('HtCountryModule\Hydrator\Strategy\CountryStrategy', $factory->createService($serviceManager));
    }
}
