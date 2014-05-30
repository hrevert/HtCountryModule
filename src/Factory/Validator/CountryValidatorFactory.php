<?php
namespace HtCountryModule\Factory\Validator;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtCountryModule\Validator\CountryValidator;

class CountryValidatorFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $validators
     *
     * @return CountryValidator
     */
    public function createService(ServiceLocatorInterface $validators)
    {
        return new CountryValidator($validators->getServiceLocator()->get('Phine\Country\Loader\Loader'));
    }
}
