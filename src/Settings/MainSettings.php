<?php

namespace Matters\GeneticSim\Settings;

use Solarwinds\Oauth2\Utilities\HelperFunctionWrapper;

class MainSettings
{
    const DSN_FORMAT = '%s:host=%s;dbname=%s;charset=UTF8';
    private $stdObj;
    public function __construct(HelperFunctionWrapper $helperFunctionWrapper)
    {
        $settingsFile = realpath(__DIR__).'/../../Settings/settings.json';
        $this->stdObj = json_decode($helperFunctionWrapper->fileGetContents($settingsFile));
    }

    public function getDsn()
    {
        return sprintf(self::DSN_FORMAT,  $this->stdObj->db->engine, $this->stdObj->db->host, $this->stdObj->db->database);
    }

    public function getDbUsername()
    {
        return $this->stdObj->db->username;
    }

    public function getDbPassword()
    {
        return $this->stdObj->db->password;
    }


}