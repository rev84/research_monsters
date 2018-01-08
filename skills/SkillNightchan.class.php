<?php
/**
 * 聖騎士ナイトちゃん
 */
class SkillNightchan extends SkillBase
{
    public $names = [
        'フラッシュ',
        'スピリッツウィズウィン',
        'ライオットソード',
        'シールドバッシュ',
        'さいきょう',
        'からぶりー！',
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
            // フラッシュ
            case 1:
                $opMonsterObject->status = new StatusKurayami();
                return true;
            // スピリッツウィズウィン
            case 2:
                $opMonsterObject->status = new StatusTinmoku();
                return true;
            // ライオットソード
            case 3:
                return $this->_attack(20, $myMonsterObject, $opMonsterObject, $isBase);
            // シールドバッシュ
            case 4:
                return $this->_attack(10, $myMonsterObject, $opMonsterObject, $isBase);
            // さいきょう
            case 5:
                return new SkillNightchanSaikyo();
            // からぶりー！
            case 6:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
