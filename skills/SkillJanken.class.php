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
    public function play($dice, MonsterBase $myMonsterObject, MonsterBase $opMonsterObject)
    {
        parent::play($dice, $myMonsterObject, $opMonsterObject);

        switch ($dice) {
            // グー！
            case 1:
                return $this->_attack(30, $myMonsterObject, $opMonsterObject);
            // あいこ
            case 2:
                return $this->_miss($myMonsterObject, $opMonsterObject);
            // チョキ！
            case 3:
                return $this->_attack(20, $myMonsterObject, $opMonsterObject);
            // あいこ
            case 4:
                return $this->_miss($myMonsterObject, $opMonsterObject);
            // パー！
            case 5:
                return $this->_attack(50, $myMonsterObject, $opMonsterObject);
            // あいこ
            case 6:
                return $this->_miss($myMonsterObject, $opMonsterObject);
        }
        
        return true;
    }

}
