<?php
/**
 * 謎の卵
 */
class SkillNazoeggHaou extends SkillBase
{
    public $names = [
        '覇王の傲慢',
        '覇王アッパー',
        '覇王の集中',
        '覇王自己暗示',
        '覇王カウンター',
        '覇王ジャブ',
    ];
    
    public $_transforms = [
    ];
    
    /**
     * 
     * @param type $dice
     * @param type $myMonsterObject
     * @param type $opMonsterObject
     * @return boolean
     */
    public function play($dice, MonsterBase $myMonsterObject, MonsterBase $opMonsterObject)
    {
        parent::play($dice, $myMonsterObject, $opMonsterObject);

        switch ($dice) {
            // 覇王の傲慢
            case 1:
                return $this->_miss($myMonsterObject, $opMonsterObject);
            // 覇王アッパー
            case 2:
                return $this->_attack(40, $myMonsterObject, $opMonsterObject);
            // 覇王の集中
            case 3:
                return $this->_buffAttack(10, $myMonsterObject, $opMonsterObject);
            // 覇王自己暗示
            case 4:
                return $this->_heal(50, $myMonsterObject, $opMonsterObject);
            // 覇王カウンター
            case 5:
                return $this->_attack(50, $myMonsterObject, $opMonsterObject);
            // 覇王ジャブ
            case 6:
                return $this->_attack(30, $myMonsterObject, $opMonsterObject);
        }
        
        return true;
    }

}
