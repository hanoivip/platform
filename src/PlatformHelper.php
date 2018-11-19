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
     * @param array $reward Array of type, id, amount
     */
    public function sendReward(IPlatform $platform, $user, $reward, $reason, $role = null)
    {
        Log::debug("Platform request to send reward to platform ..");
        $type = $reward['type'];
        $id = $reward['id'];
        $count = $reward['count'];
        switch ($type)
        {
            case 'Items':
                $platform->sendItem($user, $id, $count, $role);
                break;
            case 'Balance':
                $platform->sendCoin($user, $id, $count, $role);
                break;
            case 'Box':
                $platform->sendBox($user, $id, $count, $role);
                break;
        }
    }
}