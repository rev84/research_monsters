<?php
/**
 * 謎の卵
 */
class SkillNazoeggGod extends SkillBase
{
    public $names = [
        'ﾋﾟｰｶﾞｯｶﾞｶﾞｶﾞｯ',
        'ゴッド充電！！',
        'ゴッドパンチ！！',
        'ゴッドタックル！！',
        'オイルチャージ！！！',
        'ゴッドキック！！(スカッ',
    ];
    
    public $_transforms = [
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
            // ﾋﾟｰｶﾞｯｶﾞｶﾞｶﾞｯ
            case 1:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
            // ゴッド充電！！
            case 2:
                return $this->_heal(20, $myMonsterObject, $opMonsterObject, $isBase);
            // ゴッドパンチ！！
            case 3:
                return $this->_attack(30, $myMonsterObject, $opMonsterObject, $isBase);
            // ゴッドタックル！！
            case 4:
                return $this->_attack(70, $myMonsterObject, $opMonsterObject, $isBase);
            // オイルチャージ！！！
            case 5:
                return $this->_heal(30, $myMonsterObject, $opMonsterObject, $isBase);
            // ゴッドキック！！(スカッ
            case 6:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
