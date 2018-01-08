<?php
/**
 * イモクイマクリドラゴン 眠たくなってきた
 */
class SkillImodoraSleep extends SkillBase
{
    public $names = [
        'お腹いっぱい おやすみ',
        'また千年後に会おう',
        'まだ食べ足りない',
        'まだ食べ足りない',
        'まだ食べ足りない',
        'まだ食べ足りない',
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
            // お腹いっぱい おやすみ
            case 1:
                return $this->_suicide(180, $myMonsterObject, $opMonsterObject, $isBase);
            // また千年後に会おう
            case 2:
                return $this->_suicide(180, $myMonsterObject, $opMonsterObject, $isBase);
            // まだ食べ足りない
            case 3:
            case 4:
            case 5:
            case 6:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
