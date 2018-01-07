<?php

/**
 * Description of MonsterJanken
 *
 * @author revin
 */
class MonsterJanken extends MonsterBase
{
    // 名前
    public $name = 'ジャン・ケン';
    // 初期HP
    public $hpMax = 100;
    // 技セット
    public $skillClass = SkillJanken::class;
}
