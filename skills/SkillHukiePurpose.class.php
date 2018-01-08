<?php
/**
 * 目的を果たしたふきゑ
 */
class SkillHukiePurpose extends SkillBase
{
    public $names = [
        '山菜をかばって動けない',
        '焦りの体当たり',
        'ふきゑの本気',
        'ふきゑの本気',
        '感激で泣いている',
        'ふきゑの本気',
    ];
    
    /**
     * 
     * @param type $dice
     * @param type $myMonsterObject
     * @param type $opMonsterObject
     * @return boolean
     */
    public function play($dice, MonsterBase $myMonsterObject, MonsterBase $opMonsterObject, $isBase = true)
    {
        parent::play($dice, $myMonsterObject, $opMonsterObject, $isBase);

        switch ($dice) {
            // 山菜をかばって動けない
            case 1:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
            // 焦りの体当たり
            case 2:
                return $this->_suicide(10, $myMonsterObject, $opMonsterObject, $isBase);
            // ふきゑの本気
            case 3:
                return new SkillHukieSmallSpecial();
            // ふきゑの本気
            case 4:
                return new SkillHukieSmallSpecial();
            // 感激で泣いている
            case 5:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
            // ふきゑの本気
            case 6:
                return new SkillHukieSmallSpecial();
        }
        
        return true;
    }

}
