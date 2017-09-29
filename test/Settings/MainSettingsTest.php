<?php
namespace Matters\GeneticSim\Test\Settings;

use Matters\GeneticSim\Settings\MainSettings;
use Matters\GeneticSim\Test\TestCase;
use PDO;
use Solarwinds\Oauth2\Utilities\HelperFunctionWrapper;

class MainSettingsTest extends TestCase
{

    public function testOne(){
        $subject = new MainSettings(new HelperFunctionWrapper());
        $db1 = new PDO('mysql:host=localhost;dbname=hounddog','root','');
        $a = $subject->getDsn();
        $db = new PDO($subject->getDsn(), $subject->getDbUsername(), $subject->getDbPassword());
        $a = 1;
    }
}