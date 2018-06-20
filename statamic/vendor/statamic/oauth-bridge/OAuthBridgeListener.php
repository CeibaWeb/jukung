<?php

namespace Statamic\Addons\OAuthBridge;

use Statamic\Extend\Listener;
use Statamic\Events\OAuth\FindingUser;
use Illuminate\Support\Facades\Log;

class OAuthBridgeListener extends Listener
{
    /**
     * The events to be listened for, and the methods to call.
     *
     * @var array
     */
    public $events = [
        'Statamic\Events\OAuth\FindingUser' => 'findUser'
    ];

    public function findUser(FindingUser $event)
    {
        Log::info($event);

        return false;
    }
}
