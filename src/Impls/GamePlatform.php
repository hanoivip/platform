<?php

namespace Hanoivip\Platform\Impls;

use Hanoivip\Platform\Contracts\IPlatform;

class GamePlatform implements IPlatform
{
    public function sendBox($boxId, $boxCount = 1, $role = null)
    {}

    public function supportMultiRoles()
    {}

    public function getInfos()
    {}

    public function subCoin($coinType, $coinNum, $role = null)
    {}

    public function sendCoin($coinType, $coinNum, $role = null)
    {}

    public function sendItem($itemId, $itemCount, $role = null)
    {}
    
    public function getName()
    {
        return "game";
    }




    
}