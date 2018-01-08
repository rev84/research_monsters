<?php
/**
 * 新春ガチャガチャマシーンVer1.0
 */
class SkillGacya extends SkillBase
{
    public $names = [
        'ガチャを回す',
        'ガチャを回す',
        'ガチャを回す',
        'ガチャを回す',
        '緊急メンテナンス',
        '課金',
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
            // ガチャを回す
            case 1:
            case 2:
            case 3:
            case 4:
                // 自傷する
                $this->_suicide(30, $myMonsterObject, $opMonsterObject);
                
                $exDices = [Util::dice(),Util::dice(),Util::dice()];
                Util::log('ガチャ結果：'.join(',', $exDices));
                // 6の目が3個出たらSSR!
                if ($exDices[0] == 6 && $exDices[1] == 6 && $exDices[2] == 6) {
                    Util::log('[SSR]');
                    return $this->_attack(300, $myMonsterObject, $opMonsterObject);
                }
                // 同じ数字が2個以上出たらSR！
                elseif (count(array_unique($exDices)) != 3) {
                    Util::log('[SR]');
                    return $this->_attack(60, $myMonsterObject, $opMonsterObject);
                }
                // 1の目が1個以上出たらR！
                elseif (array_search(1, $exDices) !== false) {
                    Util::log('[R]');
                    return $this->_attack(30, $myMonsterObject, $opMonsterObject);
                }
                else {
                    Util::log('[スカ]');
                    return $this->_miss($myMonsterObject, $opMonsterObject);
                }
            // 緊急メンテナンス
            case 5:
                return $this->_miss($myMonsterObject, $opMonsterObject);
            // 課金
            case 6:
                return $this->_heal(30, $myMonsterObject, $opMonsterObject);
        }
        
        return true;
    }

}
