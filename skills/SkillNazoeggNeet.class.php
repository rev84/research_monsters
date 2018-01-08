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
    public function play($dice, MonsterBase $myMonsterObject, MonsterBase $opMonsterObject)
    {
        parent::play($dice, $myMonsterObject, $opMonsterObject);

        switch ($dice) {
            // 寝りゃ何とかなるやろ
            case 1:
                return $this->_heal(20, $myMonsterObject, $opMonsterObject);
            // んだよこの糞ババア！！！！
            case 2:
                return $this->_attack(40, $myMonsterObject, $opMonsterObject);
            // ｧｧｱｱ゛ｱ゛ア゛ーーー！！！
            case 3:
                return $this->_buffAttack(20, $myMonsterObject, $opMonsterObject);
            // 親戚が来てるから・・
            case 4:
                return $this->_miss($myMonsterObject, $opMonsterObject);
            // 飯出せっっってんの！！！
            case 5:
                return $this->_attack(50, $myMonsterObject, $opMonsterObject);
            // かあちゃん飯旨いよ・・・
            case 6:
                return $this->_heal(50, $myMonsterObject, $opMonsterObject);
        }
        
        return true;
    }

}
