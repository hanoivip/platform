<?php

namespace Hanoivip\Platform\Impls;

use Hanoivip\Platform\Contracts\IPlatform;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Hanoivip\PaymentClient\BalanceUtil;
use Hanoivip\UserBag\Services\IBag;
use Hanoivip\UserBag\Services\UserBagService;

class WebPlatform implements IPlatform
{

    protected $balance;

    protected $bagUtil;
    
    public function __construct(
        BalanceUtil $balance,
        UserBagService $bagUtil)
    {
        $this->name = "web";
        $this->balance = $balance;
        $this->bagUtil = $bagUtil;
    }
    
    public function sendBox($boxId, $boxCount = 1, $role = null)
    {}

    public function supportMultiRoles()
    {
        return false;
    }

    public function getInfos()
    {}

    public function subCoin($coinType, $coinNum, $role = null)
    {
        Log::error("WebPlatform not support substract coin from character");
    }

    public function sendCoin($coinType, $coinNum, $role = null)
    {
        $user = Auth::user();
        $this->balance->add($user->getAuthIdentifier(), $coinNum, "WebPlatform", $coinType);
    }

    public function sendItem($itemId, $itemCount, $role = null)
    {
        $user = Auth::user();
        $this->bag = $this->bagUtil->getUserBag($user->getAuthIdentifier());
        $this->bag->addItem($itemId, $itemCount);
    }
    
    public function getName()
    {
        return $this->name;
    }
}