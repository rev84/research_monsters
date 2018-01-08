<?php
/**
 * 謎の卵
 */
class SkillNazoeggGyo extends SkillBase
{
    public $names = [
        '水が欲しいよー！！',
        '跳ねる',
        '雨だああああああ',
        '死にたくないよ・・',
        '†革命進化ゴッドタイタン†',
        '苦しいよぉ・・・・・',
    ];
    
    public $_transforms = [
        ['†革命進化ゴッドタイタン†', 130, SkillNazoeggGod::class],
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
            // 水が欲しいよー！！
            case 1:
                return $this->_suicide(10, $myMonsterObject, $opMonsterObject);
            // 跳ねる
            case 2:
                return $this->_miss($myMonsterObject, $opMonsterObject);
            // 雨だああああああ
            case 3:
                return $this->_heal(40, $myMonsterObject, $opMonsterObject);
            // 死にたくないよ・・
            case 4:
                return $this->_heal(80, $myMonsterObject, $opMonsterObject);
            // †革命進化ゴッドタイタン†
            case 5:
                return $this->_transform($this->_transforms[0], $myMonsterObject, $opMonsterObject);
            // 苦しいよぉ・・・・・
            case 6:
                return $this->_suicide(40, $myMonsterObject, $opMonsterObject);
        }
        
        return true;
    }

}
