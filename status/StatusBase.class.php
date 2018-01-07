<?php

class StatusBase
{
    public $name = null;
    
    public function __construct()
    {
        ;
    }
    
    /**
     * 状態異常を処理
     * @param type $dice
     * @param type $monsterObject
     */
    public function play($dice, $monsterObject)
    {
        $res = $this->_playMe($dice, $monsterObject);
        if ($res instanceof StatusBase) {
            $monsterObject->status = $res;
        }
    }
    
    /**
     * ステータスのインスタンスを返せば状態異常変更
     * @param type $dice
     * @param type $monsterObject
     * @return boolean
     */
    protected function _playMe($dice, $monsterObject)
    {
        switch ($dice) {
            case 1:
                break;
            case 2:
                break;
            case 3:
                break;
            case 4:
                break;
            case 5:
                break;
            case 6:
                break;
        }
        
        return true;
    }
}
