<?php
/**
 * 高峯　円（まどか）ヘブンズライト
 */
class SkillMadokaHeaven extends SkillBase
{
    public $names = [
        '熾天使の慈悲',
        '神の鉄槌',
        '熾天使の慈悲',
        '神の鉄槌',
        '熾天使の慈悲',
        '神の鉄槌',
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
            // 熾天使の慈悲
            case 1:
            case 3:
            case 5:
                return $this->_miss($myMonsterObject, $opMonsterObject);
            // 神の鉄槌
            case 2:
            case 4:
            case 6:
                return $this->_attack(80, $myMonsterObject, $opMonsterObject);
        }
        
        return true;
    }

}
