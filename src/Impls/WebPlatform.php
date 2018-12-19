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
    
    public function sendBox($user, $boxId, $boxCount = 1, $role = null)
    {
        $user = Auth::user();
        $this->bag = $this->bagUtil->getUserBag($user->getAuthIdentifier());
        $this->bag->addItem($boxId, $boxCount);
    }

    public function supportMultiRoles()
    {
        return false;
    }

    public function getInfos($user)
    {
        //return [$user->getAuthIdentifier() => $user->getAuthIdentifierName()];
    }

    public function sendCoin($user, $coinType, $coinNum, $role = null)
    {
        $user = Auth::user();
        return $this->balance->add($user->getAuthIdentifier(), $coinNum, "WebPlatform", 0);
    }

    public function sendItem($user, $itemId, $itemCount, $role = null)
    {
        $user = Auth::user();
        $this->bag = $this->bagUtil->getUserBag($user->getAuthIdentifier());
        return $this->bag->addItem($itemId, $itemCount);
    }
    
    public function getName()
    {
        return $this->name;
    }
}