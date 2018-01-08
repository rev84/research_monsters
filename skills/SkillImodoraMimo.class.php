<?php
/**
 * イモクイマクリドラゴン ミモデルノ
 */
class SkillImodoraMimo extends SkillBase
{
    public $names = [
        'ブリュッ',
        'ブリブリッ',
        'ブリュリュブリッ',
        'ブリブリッブリリッ',
        'ブリブリブリュブリュブチッ',
        'でそうででない',
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
            // ブリュッ
            case 1:
                $this->_suicide(20, $myMonsterObject, $opMonsterObject, $isBase);
                return $this->_attack(20, $myMonsterObject, $opMonsterObject, $isBase);
            // ブリブリッ
            case 2:
                $this->_suicide(40, $myMonsterObject, $opMonsterObject, $isBase);
                return $this->_attack(40, $myMonsterObject, $opMonsterObject, $isBase);
            // ブリュリュブリッ
            case 3:
                $this->_suicide(60, $myMonsterObject, $opMonsterObject, $isBase);
                return $this->_attack(60, $myMonsterObject, $opMonsterObject, $isBase);
            // ブリブリッブリリッ
            case 4:
                $this->_suicide(80, $myMonsterObject, $opMonsterObject, $isBase);
                return $this->_attack(80, $myMonsterObject, $opMonsterObject, $isBase);
            // ブリブリブリュブリュブチッ
            case 5:
                $this->_suicide(100, $myMonsterObject, $opMonsterObject, $isBase);
                return $this->_attack(100, $myMonsterObject, $opMonsterObject, $isBase);
            // 引っ込んだ
            case 6:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
