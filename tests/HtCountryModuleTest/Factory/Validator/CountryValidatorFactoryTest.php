<?php
namespace HtCountryModuleTest\Factory\Validator;

use Zend\ServiceManager\ServiceManager;
use HtCountryModule\Factory\Validator\CountryValidatorFactory;
use Zend\Validator\ValidatorPluginManager;
use Phine\Country\Loader\Loader;

class CountryValidatorFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $factory = new CountryValidatorFactory();
        $serviceManager = new ServiceManager;
        $serviceManager->setService('Phine\Country\Loader\Loader', new Loader);
        $validators = new ValidatorPluginManager;
        $validators->setServiceLocator($serviceManager);
        $this->assertInstanceOf('HtCountryModule\Validator\CountryValidator', $factory->createService($validators));
    }
}
