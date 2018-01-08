<?php
/**
 * 山菜採りの主婦ふきゑ
 */
class SkillHukie extends SkillBase
{
    public $names = [
        '雨が強い',
        '風が強い',
        '雪がひどい',
        '山の幸を見つけよう',
        'ミス',
        '小さな山の神だったふきゑ',
    ];
    public $_transforms = [
        ['小さな山の神だったふきゑ', 200, SkillHukieSmall::class],
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
            // 雨が強い
            case 1:
                return $this->_suicide(10, $myMonsterObject, $opMonsterObject);
            // 風が強い
            case 2:
                return $this->_suicide(10, $myMonsterObject, $opMonsterObject);
            // 雪がひどい
            case 3:
                return $this->_suicide(10, $myMonsterObject, $opMonsterObject);
            // 山の幸を見つけよう
            case 4:
                return new SkillHukieSpecial();
            // ミス
            case 5:
                return $this->_miss($myMonsterObject, $opMonsterObject);
            // 小さな山の神だったふきゑ
            case 6:
                return $this->_transform($this->_transforms[0], $myMonsterObject, $opMonsterObject);
        }
        
        return true;
    }

}
