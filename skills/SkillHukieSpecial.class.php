<?php
/**
 * 山菜採りの主婦ふきゑの必殺
 */
class SkillHukieSpecial extends SkillBase
{
    public $names = [
        '見つからない',
        'わらび',
        'ゼンマイ',
        'あけび',
        '見つからない',
        'ふきのとう',
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
            // 見つからない
            case 1:
                return $this->_suicide(10, $myMonsterObject, $opMonsterObject, $isBase);
            // わらび
            case 2:
                return $this->_attack(30, $myMonsterObject, $opMonsterObject, $isBase);
            // ゼンマイ
            case 3:
                return $this->_attack(30, $myMonsterObject, $opMonsterObject, $isBase);
            // あけび
            case 4:
                return $this->_attack(60, $myMonsterObject, $opMonsterObject, $isBase);
            // 見つからない
            case 5:
                return $this->_suicide(10, $myMonsterObject, $opMonsterObject, $isBase);
            // ふきのとう
            case 6:
                return $this->_attack(80, $myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
