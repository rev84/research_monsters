<?php
/**
 * 魔獣のホームラン王の技
 */
class SkillMajuHomerun extends SkillBase
{
    public $names = [
        'バント',
        '捻挫',
        '魔獣覚醒',
        '子供たちの声援',
        '内野安打',
        '三振',
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
            // バント
            case 1:
                return $this->_attack(10, $myMonsterObject, $opMonsterObject, $isBase);
            // 捻挫
            case 2:
                return $this->_suicide(50, $myMonsterObject, $opMonsterObject, $isBase);
            // 魔獣覚醒
            case 3:
                return new SkillMajuHomerunKakusei();
            // 子供たちの声援
            case 4:
                return $this->_buffAttack(10, $myMonsterObject, $opMonsterObject, $isBase);
            // 内野安打
            case 5:
                return $this->_attack(20, $myMonsterObject, $opMonsterObject, $isBase);
            // 三振
            case 6:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
