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
    public function play($dice, MonsterBase $myMonsterObject, MonsterBase $opMonsterObject)
    {
        parent::play($dice, $myMonsterObject, $opMonsterObject);

        switch ($dice) {
            // ﾋﾟｰｶﾞｯｶﾞｶﾞｶﾞｯ
            case 1:
                return $this->_miss($myMonsterObject, $opMonsterObject);
            // ゴッド充電！！
            case 2:
                return $this->_heal(20, $myMonsterObject, $opMonsterObject);
            // ゴッドパンチ！！
            case 3:
                return $this->_attack(30, $myMonsterObject, $opMonsterObject);
            // ゴッドタックル！！
            case 4:
                return $this->_attack(70, $myMonsterObject, $opMonsterObject);
            // オイルチャージ！！！
            case 5:
                return $this->_heal(30, $myMonsterObject, $opMonsterObject);
            // ゴッドキック！！(スカッ
            case 6:
                return $this->_miss($myMonsterObject, $opMonsterObject);
        }
        
        return true;
    }

}
