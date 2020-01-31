<?php

namespace Statamic\Addons\OAuthBridge;

use Statamic\Providers\OAuthServiceProvider as ServiceProvider;

class OAuthBridgeServiceProvider extends ServiceProvider
{
    /**
     * An array of OAuth providers and their listeners
     *
     * @var array
     */
    protected $oauth_providers = [
        // Built-in providers can be null.
         'github' => null,

        // SocialiteProviders use the event class documented on their site.
        // 'dropbox' => 'SocialiteProviders\Dropbox\DropboxExtendSocialite'
    ];
}
