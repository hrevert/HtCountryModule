<?php
namespace HtCountryModule;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements 
    AutoloaderProviderInterface,
    ConfigProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return [
            'services' => [
                'invokables' => [
                    'Phine\Country\Loader\Loader' => 'Phine\Country\Loader\Loader',
                ],
                'aliases' => [
                    'CountryLoader' => 'Phine\Country\Loader\Loader',
                ]                
            ],
            'hydrators' => [
                'invokables' => [
                    'CountryStrategy' => 'Application\Factory\Hydrator\Strategy\CountryStrategyFactory',
                ]
            ]
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }
}
