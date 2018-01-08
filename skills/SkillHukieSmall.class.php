<?php
/**
 * 小さな山の神だったふきゑ
 */
class SkillHukieSmall extends SkillBase
{
    public $names = [
        '目的を果たしたふきゑ',
        'やめて、いじめないで',
        'ふきゑの本気',
        '焦って転ぶ',
        '恨みのトラバサミ',
        '焦って沼にはまる',
    ];
    public $_transforms = [
        ['目的を果たしたふきゑ', 170, SkillHukiePurpose::class],
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
            // 目的を果たしたふきゑ
            case 1:
                return $this->_transform($this->_transforms[0], $myMonsterObject, $opMonsterObject);
            // やめて、いじめないで
            case 2:
                return $this->_miss($myMonsterObject, $opMonsterObject);
            // ふきゑの本気
            case 3:
                return new SkillHukieSmallSpecial();
            // 焦って転ぶ
            case 4:
                return $this->_suicide(20, $myMonsterObject, $opMonsterObject);
            // 恨みのトラバサミ
            case 5:
                return $this->_attack(40, $myMonsterObject, $opMonsterObject);
            // 焦って沼にはまる
            case 6:
                return $this->_suicide(20, $myMonsterObject, $opMonsterObject);
        }
        
        return true;
    }

}
