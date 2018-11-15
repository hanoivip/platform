<?php

namespace Hanoivip\Platform;

use Hanoivip\Platform\Contracts\IPlatform;
use Hanoivip\Platform\Impls\WebPlatform;
use Hanoivip\Platform\Impls\GamePlatform;
use Illuminate\Support\Facades\Log;
use Exception;

class PlatformHelper
{
    /**
     * web: for web platform
     * game:s1, game:s2...: for game platform
     * 
     * @param string $name
     * @return IPlatform
     */
    public function getPlatform($name)
    {
        if ($name == 'web')
            return new WebPlatform();
        if (strpos('game', $name))
            return new GamePlatform();
        throw new Exception("Platform {$name} is unknown");
    }
    
    /**
     * 
     * @param IPlatform $platform
     * @param array $reward type, id, amount
     */
    public function sendReward(IPlatform $platform, $reward)
    {
        Log::debug("Platform request to send reward to platform ..");
        Log::debug("Platform name:" . $platform->getName());
        Log::debug("Platform reward:" . print_r($reward, true));
    }
}