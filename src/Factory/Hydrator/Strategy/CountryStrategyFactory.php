<?php
namespace HtCountryModule\Factory\Hydrator\Strategy;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtCountryModule\Hydrator\Strategy\CountryStrategy;

class CountryStrategyFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return CountryStrategy
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new CountryStrategy($serviceLocator->get('Phine\Country\Loader\Loader'));
    }
}
