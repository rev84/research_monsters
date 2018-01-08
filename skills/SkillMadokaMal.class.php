<?php
/**
 * 熾天使・マルティエル
 */
class SkillMadokaMal extends SkillBase
{
    public $names = [
        'ホーリーソード',
        'エンジェルアロー',
        'あたりが眩しい…',
        'スターダスト',
        'レインボーフォース',
        '熾天使の慈悲',
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
            // ホーリーソード
            case 1:
                return $this->_attack(20, $myMonsterObject, $opMonsterObject);
            // エンジェルアロー
            case 2:
                return $this->_attack(10, $myMonsterObject, $opMonsterObject);
            // あたりが眩しい…
            case 3:
                return new SkillMadokaHeaven();
            // スターダスト
            case 4:
                return $this->_attack(40, $myMonsterObject, $opMonsterObject);
            // レインボーフォース
            case 5:
                return $this->_attack(30, $myMonsterObject, $opMonsterObject);
            // 熾天使の慈悲
            case 6:
                return $this->_miss($myMonsterObject, $opMonsterObject);
        }
        
        return true;
    }

}
