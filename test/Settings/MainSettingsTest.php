<?php
namespace Matters\GeneticSim\Test\Settings;

use Matters\GeneticSim\Settings\MainSettings;
use Matters\GeneticSim\Test\TestCase;
use Solarwinds\Oauth2\Utilities\HelperFunctionWrapper;

class MainSettingsTest extends TestCase
{

    public function testOne(){
        $subject = new MainSettings(new HelperFunctionWrapper());
    }
}