<?php

namespace Hanoivip\Platform;

use Hanoivip\Platform\Contracts\IPlatform;

class PlatformHelper
{
    /**
     * web: for web platform
     * s1, s2...: for game platform
     * 
     * @param string $name
     * @return IPlatform
     */
    public function getPlatform($name)
    {
        
    }
    
    /**
     * 
     * @param IPlatform $platform
     * @param array $reward type, id, amount
     */
    public function sendReward(IPlatform $platform, $reward)
    {
        
    }
}