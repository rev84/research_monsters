<?php
/**
 * 高峯　円（まどか）ダークネスフォール
 */
class SkillMadokaDark extends SkillBase
{
    public $names = [
        'フォーリン・エンジェル',
        'スティール・ソウル',
        'スティール・ぜーレ',
        'スティール・アームアム',
        'スティール・アニマ',
        'スティール・スピーリト',
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
            // フォーリン・エンジェル
            case 1:
                return $this->_attack(60, $myMonsterObject, $opMonsterObject, $isBase);
            // スティール
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
                return $this->_attack(40, $myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
