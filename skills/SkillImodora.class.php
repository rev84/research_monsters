<?php
/**
 * イモクイマクリドラゴン
 */
class SkillImodora extends SkillBase
{
    public $names = [
        'ヘガデルノ',
        'ヘガデルノ',
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
            // ヘガデルノ
            case 1:
            case 2:
                return new SkillImodoraHega();
            // イモ発見
            case 3:
            case 4:
                return new SkillImodoraDiscover();
            // 眠たくなってきた
            case 5:
                return new SkillImodoraSleep();
            // お尻がかゆい
            case 6:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
