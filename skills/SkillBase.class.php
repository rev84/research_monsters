<?php

class SkillBase
{
    // 技の名前
    public $names = [
        
    ];
    // ダメージ加算
    public $plusAttack = 0;
    
    public function __construct($plusAttack = 0)
    {
        $this->plusAttack = $plusAttack;
    }

    /**
     * クラスを返せばその技セットに変更
     * @param type $dice
     * @param type $monsterObject
     * @return boolean
     */
    public function play($dice, MonsterBase $myMonsterObject, MonsterBase $opMonsterObject)
    {
        $this->log($dice);
        
        switch ($dice) {
            case 1:
                break;
            case 2:
                break;
            case 3:
                break;
            case 4:
                break;
            case 5:
                break;
            case 6:
                break;
        }
        
        return true;
    }
    
    /**
     * 単純攻撃
     * @param type $amount
     * @param type $myMonsterObject
     * @param type $opMonsterObject
     */
    protected function _attack($amount, MonsterBase $myMonsterObject, MonsterBase $opMonsterObject)
    {
        Util::log('ダメージ：'.$amount.($this->plusAttack > 0 ? '[+'.$this->plusAttack.']' : ''));
        $opMonsterObject->damage($amount + $this->plusAttack);
        return true;
    }
    
    /**
     * 単純回復
     * @param type $amount
     * @param type $myMonsterObject
     * @param type $opMonsterObject
     */
    protected function _heal($amount, MonsterBase $myMonsterObject, MonsterBase $opMonsterObject)
    {
        Util::log('回復：'.$amount);
        $myMonsterObject->hp += $amount;
        return true;
    }
    
    /**
     * 自傷
     * @param type $amount
     * @param type $myMonsterObject
     * @param type $opMonsterObject
     */
    protected function _suicide($amount, MonsterBase $myMonsterObject, MonsterBase $opMonsterObject)
    {
        Util::log('自傷：'.$amount.($this->plusAttack > 0 ? '[+'.$this->plusAttack.']' : ''));
        $myMonsterObject->hp -= $amount + $this->plusAttack;
        return true;
    }
    
    /**
     * ミス
     * @param type $myMonsterObject
     * @param type $opMonsterObject
     */
    protected function _miss(MonsterBase $myMonsterObject, MonsterBase $opMonsterObject)
    {
        Util::log('ミス');
        return true;
    }
    
    /**
     * 攻撃力バフ
     * @param type $amount
     * @param type $myMonsterObject
     * @param type $opMonsterObject
     * @return boolean
     */
    protected function _buffAttack($amount, MonsterBase $myMonsterObject, MonsterBase $opMonsterObject)
    {
        Util::log('攻撃力上昇：'.$amount);
        $this->plusAttack += $amount;
        return true;
    }
    
    /**
     * 技名を返す
     * @param type $dice
     * @return type
     */
    public function getName($dice)
    {
        $index = $dice-1;
        if (array_key_exists($index, $this->names)) {
            return $this->names[$index];
        }
        return null;
    }
    
    protected function log($dice)
    {
        Util::log('「'.$this->names[$dice-1].'」');
    }
}
