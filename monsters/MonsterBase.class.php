<?php


class MonsterBase
{
    // 名前
    public $name = null;
    // 属性
    public $attributes = [];

    // 初期HP
    public $hpMax = null;
    // 現在のHP
    public $hp = null;
    // 技セットのクラス
    public $skillClass = null;
    // 技セットのインスタンス
    public $skill = null;
    // 現在の状態異常
    public $status = null;
    // 特殊効果
    public $specialEffect = null;
    
    public function __construct()
    {
        /***********************************
         * HP処理
         ***********************************/
        $this->hp = $this->hpMax;
        
        /***********************************
         * ステータスのデフォルト
         ***********************************/
        $this->status = new StatusNo();
        
        /***********************************
         * 技のデフォルト
         ***********************************/
        $this->skill = new $this->skillClass();
        
        /***********************************
         * 特殊効果
         ***********************************/
        $this->specialEffect = new SpecialEffect();
    }
    
    public function play($opponentObject)
    {
        $baseDice = Util::dice();
        
        // 特殊効果解消
        $this->specialEffect->remove(SpecialEffect::ITEM_INSTANT_NO_DAMAGE);
        
        // ステータス異常実行
        $this->playStatus($baseDice);
        /**********************************
         * 技
         **********************************/
        // 技を実行
        $specialSkill = $this->skill->play($baseDice, $this, $opponentObject);
        // 必殺があればそれも実行
        if ($specialSkill instanceof SkillBase) {
            $specialSkill->play(Util::dice(), $this, $opponentObject);
            // 必殺の結果、バフが積まれればそれを反映
            if ($specialSkill->plusAttack > 0) {
                $this->skill->plusAttack += $specialSkill->plusAttack;
            }
        }
    }
    
    public function playStatus($dice)
    {
        $this->status->play($dice, $this);
    }
    
    /**
     * ダメージを与える汎用関数
     * @param type $amount
     */
    public function damage($amount)
    {
        // 無効系の特殊効果があれば無効にする
        if ($this->specialEffect->has(SpecialEffect::ITEM_INSTANT_NO_DAMAGE)) {
            return false;
        }
        $this->hp -= $amount;
    }
    
    /**
     * 回復する汎用関数
     * @param type $amount
     */
    public function heal($amount)
    {
        $this->hp += $amount;
        $this->hpCap();
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getCapture()
    {
        // 特殊効果の出力
        $specialEffects = $this->specialEffect->dump();
        if (!empty($specialEffects)) $specialEffects = '('.$specialEffects.')';
        
        return $this->name.$specialEffects.' | [HP]'.$this->hp.' / '.$this->hpMax;
    }
    
    public function hpCap($hpMax = null)
    {
        if (!is_null($hpMax)) {
            $this->hpMax = $hpMax;
        }
        
        // HPすりきり
        if ($this->hp > $this->hpMax) $this->hp = $this->hpMax;
    }
}