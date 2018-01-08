<?php
/**
 * ふきゑの本気
 */
class SkillHukieSmallSpecial extends SkillBase
{
    public $names = [
        '必殺！トラバサミ',
        'かかれ！くくり罠',
        '必殺！トラバサミ',
        'この男の人わるい人',
        '必殺！トラバサミ',
        '神技！土砂崩れ',
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
            // 必殺！トラバサミ
            case 1:
                return $this->_attack(80, $myMonsterObject, $opMonsterObject, $isBase);
            // かかれ！くくり罠
            case 2:
                return $this->_attack(20, $myMonsterObject, $opMonsterObject, $isBase);
            // 必殺！トラバサミ
            case 3:
                return $this->_attack(80, $myMonsterObject, $opMonsterObject, $isBase);
            // この男の人わるい人
            case 4:
                return $this->_suicide(140, $myMonsterObject, $opMonsterObject, $isBase);
            // 必殺！トラバサミ
            case 5:
                return $this->_attack(80, $myMonsterObject, $opMonsterObject, $isBase);
            // 神技！土砂崩れ
            case 6:
                return $this->_attack(120, $myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
