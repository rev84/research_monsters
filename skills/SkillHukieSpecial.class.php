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
    public function play($dice, MonsterBase $myMonsterObject, MonsterBase $opMonsterObject)
    {
        parent::play($dice, $myMonsterObject, $opMonsterObject);

        switch ($dice) {
            // 見つからない
            case 1:
                return $this->_suicide(10, $myMonsterObject, $opMonsterObject);
            // わらび
            case 2:
                return $this->_attack(30, $myMonsterObject, $opMonsterObject);
            // ゼンマイ
            case 3:
                return $this->_attack(30, $myMonsterObject, $opMonsterObject);
            // あけび
            case 4:
                return $this->_attack(60, $myMonsterObject, $opMonsterObject);
            // 見つからない
            case 5:
                return $this->_suicide(10, $myMonsterObject, $opMonsterObject);
            // ふきのとう
            case 6:
                return $this->_attack(80, $myMonsterObject, $opMonsterObject);
        }
        
        return true;
    }

}
