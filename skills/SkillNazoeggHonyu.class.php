<?php
/**
 * 謎の卵
 */
class SkillNazoeggHonyu extends SkillBase
{
    public $names = [
        '意識が朦朧としている',
        'ニート',
        '寝る子は育つ！',
        'いっぱいご飯食べるね！！',
        '課長',
        '社畜',
    ];
    
    public $_transforms = [
        ['ニート', 80, SkillNazoeggNeet::class],
        ['課長', 140, SkillNazoeggKacho::class],
        ['社畜', 130, SkillNazoeggShatiku::class],
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
            // 意識が朦朧としている
            case 1:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
            // ニート
            case 2:
                return $this->_transform($this->_transforms[0], $myMonsterObject, $opMonsterObject);
            // 寝る子は育つ！
            case 3:
                return $this->_heal(40, $myMonsterObject, $opMonsterObject, $isBase);
            // いっぱいご飯食べるね！！
            case 4:
                return $this->_heal(40, $myMonsterObject, $opMonsterObject, $isBase);
            // 課長
            case 5:
                return $this->_transform($this->_transforms[1], $myMonsterObject, $opMonsterObject);
            // 社畜
            case 6:
                return $this->_transform($this->_transforms[2], $myMonsterObject, $opMonsterObject);
        }
        
        return true;
    }

}
