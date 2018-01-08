<?php
/**
 * Description of StatusNo
 *
 * @author revin
 */
class StatusKurayami extends StatusBase
{
    /**
     * ステータスのインスタンスを返せば状態異常変更
     * @param type $dice
     * @param type $monsterObject
     * @return boolean
     */
    protected function _playMe($dice, MonsterBase $monsterObject)
    {
        switch ($dice) {
            case 1:
            case 2:
            case 3:
                Util::log('1,2,3のため暗闇は継続');
                $monsterObject->specialEffect->add(SpecialEffect::ITEM_INSTANT_CANNOT_ATTACK);
                return true;
            case 4:
            case 5:
            case 6:
                Util::log('4,5,6のため暗闇解除');
                $monsterObject->specialEffect->remove(SpecialEffect::ITEM_INSTANT_CANNOT_ATTACK);
                return new StatusNo();
        }
    }
}
