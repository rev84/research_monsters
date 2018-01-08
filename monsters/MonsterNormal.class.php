<?php

class MonsterNormal extends MonsterBase
{
    // 名前
    public $name = '普通くん';
    // 初期HP
    public $hpMax = 1;
    // 技セット
    public $skillClass = SkillNormal::class;
}
