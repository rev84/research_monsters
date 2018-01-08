<?php
/**
 * 魔獣のホームラン王の技
 */
class SkillMajuHomerunKakusei extends SkillBase
{
    public $names = [
        '魔獣覚醒・走',
        '髭がスポーツマンシップに反する',
        'ピッチャー強襲',
        '魔獣覚醒・打',
        'ツーベース',
        'ホームラン',
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
            // 魔獣覚醒・走
            case 1:
                $addDice = Util::dice();
                if ($addDice % 2 == 0) {
                    Util::log($addDice.'なので成功。次のターンまでダメージ無効');
                    $myMonsterObject->specialEffect->add(SpecialEffect::ITEM_INSTANT_NO_DAMAGE);
                    return true;
                }
                else {
                    Util::log($addDice.'なので失敗。');
                    return true;
                }
            // 髭がスポーツマン/シップに反する
            case 2:
                return $this->_suicide(50, $myMonsterObject, $opMonsterObject, $isBase);
            // ピッチャー強襲
            case 3:
                return $this->_attack(50, $myMonsterObject, $opMonsterObject, $isBase);
            // 魔獣覚醒・打
            case 4:
                return $this->_buffAttack(30, $myMonsterObject, $opMonsterObject, $isBase);
            // ツーベース
            case 5:
                return $this->_attack(60, $myMonsterObject, $opMonsterObject, $isBase);
            // ホームラン
            case 6:
                return $this->_attack(110, $myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
