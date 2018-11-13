<?php

namespace Hanoivip\Platform\Impls;

use Hanoivip\Platform\Contracts\IPlatform;

class GamePlatform implements IPlatform
{

    public function sendCoin($coinType, $coinNum, $params = null)
    {}

    public function sendItem($itemId, $itemCount, $params = null)
    {}
    public function getInfos()
    {}
    public function sendBox($boxId, $boxCount = 1, $params = null)
    {}



    
}