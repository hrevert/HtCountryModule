<?php
namespace HtCountryModuleTest\Validator;

use HtCountryModule\Validator\CountryValidator;
use Phine\Country\Loader\Loader;

class CountryValidatorTest extends \PHPUnit_Framework_TestCase
{
    public function testSetterAndGetters()
    {
        $loader = new Loader;
        $validator = new CountryValidator($loader);
        $this->assertEquals($loader, $validator->getLoader());

        $validator = new CountryValidator($loader);
        $this->assertInstanceOf('Phine\Country\Loader\Loader', $validator->getLoader());
    }

    public function testIsValid()
    {
        $loader = new Loader;
        $validator = new CountryValidator($loader);

        $this->assertTrue($validator->isValid('NP'));
        $this->assertTrue($validator->isValid($loader->loadCountry('NP')));
        $this->assertFalse($validator->isValid('asfdasf'));
        $this->assertFalse($validator->isValid([]));
    }
}
