# oauth2-php-client
Oauth2 Php Client

See example at Examples/IdentityServer4Example.php

Initialization if .well_known endpoint exists

       import_once('vendor/autoload.php');
       use Solarwinds\Oauth2\Containers\Symfony;
       use Solarwinds\Oauth2\Settings\Oauth2Settings;
       use Solarwinds\Oauth2\Settings\SettingsDto;
       
       $container = Symfony::getInstance();
       $container->compile();
       /** @var Oauth2Settings $oauth2Settings */
       $oauth2Settings = $container->get(Oauth2Settings::class);
       $clientId = 'your client id';
       $clientSecret = 'your client secret';
       $providerUrl = 'https://provider-url.com';
       $redirectUri = 'https://your-app-redirect.com';
       $settingsDto = new SettingsDto($providerUrl, $clientId, $clientSecret, $redirectUri);
       $oauth2Settings->initialize($settingsDto);
 
Otherwise can set explicitly

       import_once('vendor/autoload.php');
       use Solarwinds\Oauth2\Containers\Symfony;
       use Solarwinds\Oauth2\Settings\Oauth2Settings;
       use Solarwinds\Oauth2\Settings\SettingsDto;
       
       $container = Symfony::getInstance();
       $container->compile();
       /** @var Oauth2Settings $oauth2Settings */
       $oauth2Settings = $container->get(Oauth2Settings::class);
       $clientId = 'your client id';
       $clientSecret = 'your client secret';
       $providerUrl = 'https://provider-url.com';
       $redirectUri = 'https://your-app-redirect.com';
       $settingsDto = new SettingsDto($providerUrl, $clientId, $clientSecret, $redirectUri);
       $wellKnownArray = array (
                   'issuer' => 'https://provider-url.com',
                   'jwks_uri' => 'https://provider-url.com/.well-known/openid-configuration/jwks',
                   'authorization_endpoint' => 'https://provider-url.com/connect/authorize',
                   'token_endpoint' => 'https://provider-url.com/connect/token');
       $wellKnownDto = new WellKnownDto((object)$wellKnownArray);
       
       $oauth2Settings->initialize($settingsDto, $wellKnownDto);

Then simply use with the Oauth2Service 
    
    use Solarwinds\Oauth2\Services\Oauth2Service;
    /** var Oauth2Service $oauth2Service */
    $oauth2Service = $container->get(Oauth2Service::class);
    $idToken = $oauth2Service->authenticate($oauth2Settings);
    
The encoded (but verified) jwt is returned.

