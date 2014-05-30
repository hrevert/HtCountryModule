<?php
namespace HtCountryModule\Factory\Hydrator\Strategy;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtCountryModule\Hydrator\Strategy\CountryStrategy;

class CountryStrategyFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $hydrators
     *
     * @return CountryStrategy
     */
    public function createService(ServiceLocatorInterface $hydrators)
    {
        return new CountryStrategy($hydrators->getServiceLocator()->get('Phine\Country\Loader\Loader'));
    }
}
