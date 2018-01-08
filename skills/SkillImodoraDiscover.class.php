<?php
/**
 * イモクイマクリドラゴン イモ発見
 */
class SkillImodoraDiscover extends SkillBase
{
    public $names = [
        'イモが腐ってた',
        'おいしい',
        'イモ発見',
        'イモ発見',
        '眠たくなってきた',
        'お尻がかゆい',
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
            // イモが腐ってた
            case 1:
                return $this->_heal(10, $myMonsterObject, $opMonsterObject, $isBase);
            // おいしい
            case 2:
                return $this->_heal(20, $myMonsterObject, $opMonsterObject, $isBase);
            // うまい！
            case 3:
                return $this->_heal(30, $myMonsterObject, $opMonsterObject, $isBase);
            // 大量のイモだ！！
            case 4:
                return $this->_heal(50, $myMonsterObject, $opMonsterObject, $isBase);
            // 玉ねぎだった
            case 5:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
            // 玉ねぎを食べちゃった
            case 6:
                return $this->_suicide(50, $myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
