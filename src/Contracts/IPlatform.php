<?php

namespace Hanoivip\Platform\Contracts;

interface IPlatform
{
    public function getName();
    
    public function sendCoin($coinType, $coinNum, $role = null);
    
    public function sendBox($boxId, $boxCount = 1, $role = null);
    
    public function sendItem($itemId, $itemCount, $role = null);
    
    public function getInfos();
    
    public function supportMultiRoles();
    
    public function subCoin($coinType, $coinNum, $role = null);
}