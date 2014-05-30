<?php
namespace HtCountryModule\Hydrator\Strategy;

use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;
use Phine\Country\Loader;
use Phine\Country\CountryInterface;

/**
 * Hydrator strategy to convert ISO 3166-1 alpha-2 to instance of "Phine\Country\CountryInterface" and vice versa
 */
class CountryStrategy implements StrategyInterface
{
    /**
     * @var Loader\LoaderInterface
     */
    protected $loader;

    /**
     * Constructor
     *
     * @param Loader\LoaderInterface|null $loader
     */
    public function __construct(Loader\LoaderInterface $loader = null)
    {
        if ($loader === null) {
            $loader = new Loader\Loader();
        }
        $this->loader = $loader;
    }

    /**
     * Loads country from ISO 3166-1 alpha-2
     *
     * @param string $alpha2Code
     * @return CountryInterface
     */
    public function hydrate($alpha2Code)
    {
        return $this->loader->loadCountry($alpha2Code);
    }

    /**
     * Gets ISO 3166-1 alpha-2 of a country
     *
     * @param CountryInterface $country
     * @return string
     * @throws Exception\InvalidArgumentException
     */
    public function extract($country)
    {
        if (!$country instanceof CountryInterface) {
            throw new Exception\InvalidArgumentException(
                sprintf(
                    '%s expects parameter 1 to be an instance of Phine\Country\CountryInterface, %s provided instead',
                    __METHOD__,
                    is_object($country) ? get_class($country) : gettype($country)
                )
            );
        }

        return $country->getAlpha2Code();
    }
}
