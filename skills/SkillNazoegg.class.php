<?php
/**
 * 謎の卵
 */
class SkillNazoegg extends SkillBase
{
    public $names = [
        '両生類',
        '哺乳類',
        '魚類',
        'ぽよんぽよん',
        '相手の変身先に進化/なければミス',
        'もぞもぞ',
    ];
    
    public $_transforms = [
        ['両生類', 130, SkillNazoeggRyosei::class],
        ['哺乳類', 160, SkillNazoeggHonyu::class],
        ['魚類', 140, SkillNazoeggGyo::class],
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
        parent::play($dice, $myMonsterObject, $opMonsterObject);

        switch ($dice) {
            // 両生類
            case 1:
                return $this->_transform($this->_transforms[0], $myMonsterObject, $opMonsterObject);
            // 哺乳類
            case 2:
                return $this->_transform($this->_transforms[1], $myMonsterObject, $opMonsterObject);
            // 魚類
            case 3:
                return $this->_transform($this->_transforms[2], $myMonsterObject, $opMonsterObject);
            // ぽよんぽよん
            case 4:
                return $this->_heal(60, $myMonsterObject, $opMonsterObject, $isBase);
            // 相手の変身先に進化/なければミス
            case 5:
                $transform = $opMonsterObject->skill->getRandomTransform();
                if (is_null($transform)) {
                    return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
                }
                else {
                    $this->_transform($transform, $myMonsterObject, $opMonsterObject);
                }
                
            // もぞもぞ
            case 6:
                return $this->_miss($myMonsterObject, $opMonsterObject, $isBase);
        }
        
        return true;
    }

}
