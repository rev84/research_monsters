<?php
/**
 * 謎の卵
 */
class SkillNazoeggShatiku extends SkillBase
{
    public $names = [
        '定時退社',
        '何かいい感じで',
        'インフルで一週間休み',
        '今日も残業',
        '退職届',
        '仕様変更',
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
            // 定時退社
            case 1:
                return $this->_miss($myMonsterObject, $opMonsterObject);
            // 何かいい感じで
            case 2:
                return $this->_suicide(10, $myMonsterObject, $opMonsterObject);
            // インフルで一週間休み
            case 3:
                return $this->_heal(60, $myMonsterObject, $opMonsterObject);
            // 今日も残業
            case 4:
                return $this->_suicide(20, $myMonsterObject, $opMonsterObject);
            // 退職届
            case 5:
                return $this->_attack(130, $myMonsterObject, $opMonsterObject);
            // 仕様変更
            case 6:
                return $this->_suicide(10, $myMonsterObject, $opMonsterObject);
        }
        
        return true;
    }

}
