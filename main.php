<?php

require_once dirname(__FILE__).'/autoload.php';

// ログを詳細に出すか
define('IS_LOG', true);

Util::logClear();

$monster1 = new MonsterIkirikamakiri();
$monster2 = new MonsterJanken();

new Game($monster1, $monster2);
