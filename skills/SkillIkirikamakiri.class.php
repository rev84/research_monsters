<?php
/**
 * イキリカマキリの技
 */
class SkillIkirikamakiri extends SkillBase
{
    public $names = [
        'かまでボコるわ',
        'ガチギレですわ',
        'はりがね先輩チッス！',
        'はりがね先輩チッス！',
        'カマキリ殺法',
        'かまでボコるわ',
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
            // かまでボコるわ
            case 1:
                return $this->_attack(10, $myMonsterObject, $opMonsterObject, $isBase);
            // ガチギレですわ
            case 2:
                return $this->_buffAttack(20, $myMonsterObject, $opMonsterObject, $isBase);
            // はりがね先輩チッス！
            case 3:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
            // はりがね先輩チッス！
            case 4:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
            // カマキリ殺法
            case 5:
                return $this->_attack(30, $myMonsterObject, $opMonsterObject, $isBase);
            // かまでボコるわ
            case 6:
                return $this->_attack(10, $myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
