<?php
/**
 * 普通くん
 */
class SkillNormal extends SkillBase
{
    public $names = [
        'ふつうのこうげき(弱)',
        'ふつうのこうげき',
        'ふつうのこうげき',
        'ふつうのこうげき',
        'ふつうのこうげき',
        'ミス',
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
            // ふつうのこうげき
            case 1:
                return $this->_attack(10, $myMonsterObject, $opMonsterObject, $isBase);
            case 2:
            case 3:
            case 4:
            case 5:
                return $this->_attack(20, $myMonsterObject, $opMonsterObject, $isBase);
            // ミス
            case 6:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
