<?php
/**
 * ジャン・ケンの技
 */
class SkillJanken extends SkillBase
{
    public $names = [
        'グー！',
        'あいこ',
        'チョキ！',
        'あいこ',
        'パー！',
        'あいこ',
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
            // グー！
            case 1:
                return $this->_attack(30, $myMonsterObject, $opMonsterObject, $isBase);
            // あいこ
            case 2:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
            // チョキ！
            case 3:
                return $this->_attack(20, $myMonsterObject, $opMonsterObject, $isBase);
            // あいこ
            case 4:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
            // パー！
            case 5:
                return $this->_attack(50, $myMonsterObject, $opMonsterObject, $isBase);
            // あいこ
            case 6:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
