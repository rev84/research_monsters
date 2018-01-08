<?php
/**
 * 謎の卵
 */
class SkillNazoeggNeet extends SkillBase
{
    public $names = [
        '寝りゃ何とかなるやろ',
        'んだよこの糞ババア！！！！',
        'ｧｧｱｱ゛ｱ゛ア゛ーーー！！！',
        '親戚が来てるから・・',
        '飯出せっっってんの！！！',
        'かあちゃん飯旨いよ・・・',
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
            // 寝りゃ何とかなるやろ
            case 1:
                return $this->_heal(20, $myMonsterObject, $opMonsterObject, $isBase);
            // んだよこの糞ババア！！！！
            case 2:
                return $this->_attack(40, $myMonsterObject, $opMonsterObject, $isBase);
            // ｧｧｱｱ゛ｱ゛ア゛ーーー！！！
            case 3:
                return $this->_buffAttack(20, $myMonsterObject, $opMonsterObject, $isBase);
            // 親戚が来てるから・・
            case 4:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
            // 飯出せっっってんの！！！
            case 5:
                return $this->_attack(50, $myMonsterObject, $opMonsterObject, $isBase);
            // かあちゃん飯旨いよ・・・
            case 6:
                return $this->_heal(50, $myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
