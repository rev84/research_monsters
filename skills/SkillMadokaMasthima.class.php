<?php
/**
 * 堕天使・マスティマ
 */
class SkillMadokaMasthima extends SkillBase
{
    public $names = [
        'フォーリン・デス',
        'ブラックソード',
        'ダークネスフォール',
        'シャドウスピア',
        'ダークアロー',
        '鋭い眼光を放っている',
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
            // フォーリン・デス
            case 1:
                return $this->_attack(30, $myMonsterObject, $opMonsterObject, $isBase);
            // ブラックソード
            case 2:
                return $this->_attack(30, $myMonsterObject, $opMonsterObject, $isBase);
            // ダークネスフォール
            case 3:
                return new SkillMadokaDark();
            // シャドウスピア
            case 4:
                return $this->_attack(30, $myMonsterObject, $opMonsterObject, $isBase);
            // ダークアロー
            case 5:
                return $this->_attack(30, $myMonsterObject, $opMonsterObject, $isBase);
            // 鋭い眼光を放っている
            case 6:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
