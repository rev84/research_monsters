<?php
/**
 * 謎の卵
 */
class SkillNazoeggRyosei extends SkillBase
{
    public $names = [
        '雨だー！',
        '頭を抱える',
        '水浴びわーい！',
        'カエル跳び',
        '噛みつく',
        '日光に照らされる',
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
    public function play($dice, MonsterBase $myMonsterObject, MonsterBase $opMonsterObject, $isBase = true)
    {
        parent::play($dice, $myMonsterObject, $opMonsterObject, $isBase);

        switch ($dice) {
            // 雨だー！
            case 1:
                return $this->_heal(30, $myMonsterObject, $opMonsterObject, $isBase);
            // 頭を抱える
            case 2:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
            // 水浴びわーい！
            case 3:
                return $this->_heal(40, $myMonsterObject, $opMonsterObject, $isBase);
            // カエル跳び
            case 4:
                return $this->_attack(50, $myMonsterObject, $opMonsterObject, $isBase);
            // 噛みつく
            case 5:
                return $this->_attack(30, $myMonsterObject, $opMonsterObject, $isBase);
            // 日光に照らされる
            case 6:
                return $this->_suicide(40, $myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
