<?php

namespace Hanoivip\Platform\Contracts;

interface IPlatform
{
    public function getName();
    
    public function sendCoin($user, $coinType, $coinNum, $role = null);
    
    public function sendBox($user, $boxId, $boxCount = 1, $role = null);
    /**
     * 
     * @param unknown $user
     * @param unknown $itemId
     * @param unknown $itemCount
     * @param unknown $role
     * @return boolean
     */
    public function sendItem($user, $itemId, $itemCount, $role = null);
    
    public function getInfos($user);
    
    public function supportMultiRoles();
}