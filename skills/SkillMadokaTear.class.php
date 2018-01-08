<?php
/**
 * 高峯　円（まどか）天使の涙
 */
class SkillMadokaTear extends SkillBase
{
    public $names = [
        '涙が止まらない…',
        '癒やしの涙',
        '涙が止まらない…',
        '癒やしの涙',
        '涙が止まらない…',
        '癒やしの涙',
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
            // 涙が止まらない…
            case 1:
            case 3:
            case 5:
                return $this->_miss($myMonsterObject, $opMonsterObject);
            // 癒やしの涙
            case 2:
            case 4:
            case 6:
                return $this->_heal(60, $myMonsterObject, $opMonsterObject);
        }
        
        return true;
    }

}
