<?php
/**
 * 謎の卵
 */
class SkillNazoeggKacho extends SkillBase
{
    public $names = [
        'プロジェクトが頓挫',
        '覇王',
        'ご飯おいしー！',
        'うふふ',
        'プロジェクト成功だー！',
        'ねむーい',
    ];
    
    public $_transforms = [
        ['覇王', 130, SkillNazoeggHaou::class],
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
            // プロジェクトが頓挫
            case 1:
                return $this->_suicide(10, $myMonsterObject, $opMonsterObject, $isBase);
            // 覇王
            case 2:
                return $this->_transform($this->_transforms[0], $myMonsterObject, $opMonsterObject);
            // ご飯おいしー！
            case 3:
                return $this->_heal(50, $myMonsterObject, $opMonsterObject, $isBase);
            // うふふ
            case 4:
                return $this->_heal(60, $myMonsterObject, $opMonsterObject, $isBase);
            // プロジェクト成功だー！
            case 5:
                return $this->_heal(40, $myMonsterObject, $opMonsterObject, $isBase);
            // ねむーい
            case 6:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
