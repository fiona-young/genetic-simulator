<?php
namespace Matters\GeneticSim\Settings;
use Solarwinds\Oauth2\Utilities\HelperFunctionWrapper;

class MainSettings{
    private $stdObj;
    public function __construct(HelperFunctionWrapper $helperFunctionWrapper)
    {
        $settingsFile = realpath(__DIR__).'/../../Settings/settings.json';
        $this->stdObj = json_decode($helperFunctionWrapper->fileGetContents($settingsFile));
    }


}