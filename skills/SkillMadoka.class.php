<?php
/**
 * 高峯　円（まどか）
 */
class SkillMadoka extends SkillBase
{
    public $names = [
        '体が…熱い！',
        '私が助けないと…',
        'こんなことはやめて！',
        '力が…足りない…',
        '血が止まらない…',
        '争いはやめて…！',
    ];
    
    public $_transforms = [
        ['熾天使・マルティエル', 100, SkillMadokaMal::class],
        ['堕天使・マスティマ', 70, SkillMadokaMasthima::class],
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
            // 体が…熱い！
            case 1:
                return $this->_transform($this->_transforms[0], $myMonsterObject, $opMonsterObject);
            // 私が助けないと…
            case 2:
                return $this->_heal(30, $myMonsterObject, $opMonsterObject);
            // こんなことはやめて！
            case 3:
                return new SkillMadokaTear();
            // 力が…足りない…
            case 4:
                return $this->_heal(20, $myMonsterObject, $opMonsterObject);
            // 血が止まらない…
            case 5:
                return $this->_transform($this->_transforms[1], $myMonsterObject, $opMonsterObject);
            // 争いはやめて…！
            case 6:
                return $this->_miss($myMonsterObject, $opMonsterObject);
        }
        
        return true;
    }

}
