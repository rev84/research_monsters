<?php

/**
 * Description of SpecialEffect
 *
 * @author revin
 */
class SpecialEffect
{
    const ITEM_INSTANT_NO_DAMAGE = '1ターン攻撃無効';
    const ITEM_INSTANT_CANNOT_ATTACK = 'ダメージ系不発';
    
    protected $_ary = [];
    
    public function __construct()
    {
        $this->clear();
    }
    
    public function clear()
    {
        $this->_ary = [];
    }
    
    public function has($effectConst)
    {
        return in_array($effectConst, $this->_ary);
    }
    
    public function add($effectConst)
    {
        if (!$this->has($effectConst)) {
            $this->_ary[] = $effectConst;
        }
    }
    
    public function remove($effectConst)
    {
        $new = [];
        foreach ($this->_ary as $ef) {
            if ($ef != $effectConst) {
                $new[] = $ef;
            }
        }
        
        $this->_ary = $new;
    }
    
    public function dump()
    {
        return join(',', $this->_ary);
    }
}
