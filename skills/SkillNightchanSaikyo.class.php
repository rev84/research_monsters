<?php
/**
 * 聖騎士ナイトちゃん必殺
 */
class SkillNightchanSaikyo extends SkillBase
{
    public $names = [
        '重くて持てない',
        '装備　ミスリルソード',
        '装備　アイスブランド',
        '装備　エンハンスソード',
        '装備　エクスカリバー',
        '重くて持てない',
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
            // 重くて持てない
            case 1:
            case 6:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
            // 装備　ミスリルソード
            case 2:
                return $this->_buffAttack(10, $myMonsterObject, $opMonsterObject, $isBase);
            // 装備　アイスブランド
            case 3:
                return $this->_buffAttack(20, $myMonsterObject, $opMonsterObject, $isBase);
            // 装備　エンハンスソード
            case 4:
                return $this->_buffAttack(30, $myMonsterObject, $opMonsterObject, $isBase);
            // 装備　エクスカリバー
            case 5:
                return $this->_buffAttack(60, $myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
