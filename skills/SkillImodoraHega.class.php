<?php
/**
 * イモクイマクリドラゴン ヘガデルノ
 */
class SkillImodoraHega extends SkillBase
{
    public $names = [
        'プスーッ',
        'ブウッ',
        'ブボボボッ',
        'ブブブボブボボボブボッ',
        'ミモデルノ',
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
            // プスーッ
            case 1:
                return $this->_attack(10, $myMonsterObject, $opMonsterObject, $isBase);
            // ブウッ
            case 2:
                return $this->_attack(30, $myMonsterObject, $opMonsterObject, $isBase);
            // ブボボボッ
            case 3:
                return $this->_attack(50, $myMonsterObject, $opMonsterObject, $isBase);
            // ブブブボブボボボブボッ
            case 4:
                return $this->_attack(90, $myMonsterObject, $opMonsterObject, $isBase);
            // ミモデルノ
            case 5:
                return new SkillImodoraMimo();
            // でそうででない
            case 6:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
