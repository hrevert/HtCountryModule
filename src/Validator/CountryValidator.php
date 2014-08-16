<?php
namespace HtCountryModule\Validator;

use Zend\Validator\AbstractValidator;
use Phine\Country\Loader;
use Phine\Country\CountryInterface;

/**
 * Validates ISO 3166-1 alpha-2 code
 */
class CountryValidator extends AbstractValidator
{
    const INVALID               = 'countryInvalid';
    const COUNTRY_NOT_FOUND     = 'countryNotFound';

    /**
     * @var array
     */
    protected $messageTemplates = array(
        self::INVALID               => 'Invalid type given. String expected',
        self::COUNTRY_NOT_FOUND     => 'Country %value% was not found',
    );

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
        if ($loader !== null) {
            $this->setLoader($loader);
        }
    }

    /**
     * Sets country loader
     *
     * @param  Loader\LoaderInterface $loader
     * @return self
     */
    public function setLoader(Loader\LoaderInterface $loader)
    {
        $this->loader = $loader;

        return $this;
    }

    /**
     * Gets country loader
     *
     * @return Loader\LoaderInterface
     */
    public function getLoader()
    {
        if (!$this->loader instanceof Loader\LoaderInterface) {
            $this->loader = new Loader\Loader();
        }

        return $this->loader;
    }

    /**
     * Returns true if $value is valid ISO 3166-1 alpha-2 or instance of Phine\Country\CountryInterface
     *
     * @return string|CountryInterface $value
     * @return bool
     */
    public function isValid($value)
    {
        $this->setValue($value);

        if ($value instanceof CountryInterface) {
            return true;
        }

        if (!is_string($value)) {
            $this->error(static::INVALID);

            return false;
        }

        $country = $this->getLoader()->loadCountry($value);
        if (!$country instanceof CountryInterface) {
            $this->error(static::COUNTRY_NOT_FOUND);

            return false;
        }

        return true;
    }
}
