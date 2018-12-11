<?php

namespace Hanoivip\Platform\Impls;

use Hanoivip\Platform\Contracts\IPlatform;
use Hanoivip\Game\Services\GameService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Hanoivip\Game\Services\ServerService;
use Exception;

class GamePlatform implements IPlatform
{
    protected $name;
    
    protected $game;
    
    protected $servers;
    
    protected $target;
    
    public function __construct(
        GameService $game,
        ServerService $servers)
    {
        $name = "game";
        $this->name = $name;
        $this->game = $game;
        $this->servers = $servers;
    }
    
    public function setTarget($svname)
    {
        $this->target = $this->servers->getServerByName($svname);
        if (empty($this->target))
            throw new Exception("GamePlatform target {$svname} not exists");
    }
    
    public function sendBox($user, $boxId, $boxCount = 1, $role = null)
    {
        $user = Auth::user();
        $params = [];
        if (!empty($role))
            $params = ['roleid' => $role];
        return $this->game->sendItem($this->target, $user, $boxId, $boxCount, $params);
    }

    public function supportMultiRoles()
    {
        return $this->game->accountHasManyChars();
    }

    public function getInfos($user)
    {
        return $this->game->queryRoles($user, $this->target);
    }

    public function sendCoin($user, $coinType, $coinNum, $role = null)
    {
        $user = Auth::user();
        $params = [];
        if (!empty($role))
            $params = ['roleid' => $role];
        return $this->game->rechargeWithValue($this->target, $user, $coinType, $coinNum, $params);
    }

    public function sendItem($user, $itemId, $itemCount, $role = null)
    {
        $user = Auth::user();
        $params = [];
        if (!empty($role))
            $params = ['roleid' => $role];
        return $this->game->sendItem($this->target, $user, $itemId, $itemCount, $params);
    }
    
    public function getName()
    {
        return $this->name;
    }
    
}