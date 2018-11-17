<?php

namespace Hanoivip\Platform;

use Hanoivip\Platform\Contracts\IPlatform;
use Hanoivip\Platform\Impls\WebPlatform;
use Hanoivip\Platform\Impls\GamePlatform;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Auth\Authenticatable;

class PlatformHelper
{
    protected $game;
    
    protected $web;
    
    public function __construct(
        GamePlatform $game,
        WebPlatform $web)
    {
        // TODO: use app()->make
        $this->game = $game;
        $this->web = $web;
    }
    
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
            return $this->web;
        else
        {
            $this->game->setTarget($name);
            return $this->game;
        }
    }
    
    /**
     * 
     * @param IPlatform $platform
     * @param Authenticatable $user
     * @param array $reward type, id, amount
     */
    public function sendReward(IPlatform $platform, $user, $reward)
    {
        Log::debug("Platform request to send reward to platform ..");
        Log::debug("Platform name:" . $platform->getName());
        Log::debug("Platform reward:" . print_r($reward, true));
    }
}