<?php
/**
 * Description of MonsterMajuHomerun
 *
 * @author revin
 */
class MonsterNazoegg extends MonsterBase
{
    // 名前
    public $name = '謎の卵';
    // 初期HP
    public $hpMax = 140;
    // 技セット
    public $skillClass = SkillNazoegg::class;
}
