<?php
namespace HtCountryModuleTest;

use HtCountryModule\Module;

class ModuleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers HtCountryModule\Module::getConfig
     * @covers HtCountryModule\Module::getAutoloaderConfig
     */
    public function testConfigIsArray()
    {
        $module = new Module();
        $this->assertInternalType('array', $module->getConfig());
        $this->assertInternalType('array', $module->getAutoloaderConfig());
    }
}
