<?php

require_once dirname(__FILE__).'/autoload.php';

doLeague();
//doTest(MonsterImodora::class);

function doLeague()
{
    // ログを詳細に出すか
    define('IS_LOG', false);

    generateLeague([
        MonsterIkirikamakiri::class,
        MonsterJanken::class,
        MonsterMajuHomerun::class,
        MonsterHukie::class,
        MonsterGacya::class,
        MonsterMadoka::class,
        MonsterNazoegg::class,
        MonsterNightchan::class,
        MonsterImodora::class,
        //MonsterNormal::class,
    ]);
    outputLeague();
}

function doTest($testClass)
{
    // ログを詳細に出すか
    define('IS_LOG', true);
    
    Util::logClear();

    $monster0Win = 0;

    for ($index = 0; $index < 50; $index++) {
        $monster0 = new $testClass();
        $monster1 = new MonsterJanken();
        $game = new Game($monster0, $monster1);
        $res = $game->fight();
        if ($res === 0) {
            $monster0Win++;
        }

        if ($index % 100 == 0) {
            Util::pl($monster0->getName().' wins '.$monster0Win.'/'.$index.' times');
        }
    }

    Util::pl($monster0->getName().' wins '.$monster0Win.'/'.$index.' times');
}

function generateLeague($classes)
{
    $battleCount = 10000;
    
    // 既存の計算結果を読み込む
    $res = [];
    if (file_exists(dirname(__FILE__).'/league.txt')) {
        $buf = explode("\n", file_get_contents(dirname(__FILE__).'/league.txt'));
        foreach ($buf as $r) {
            list($m0, $m1, $win, $lose) = explode("\t", $r);

            if (!array_key_exists($m0, $res)) $res[$m0] = [];
            $res[$m0][$m1] = [$win, $lose];
        }
    }
    
    
    for ($m0 = 0; $m0 < count($classes)-1; $m0++) {
        $m0name = $classes[$m0];
        for ($m1 = $m0+1; $m1 < count($classes); $m1++) {
            $m1name = $classes[$m1];
            if (array_key_exists($m0name, $res) && array_key_exists($m1name, $res[$m0name])) continue;
            if (array_key_exists($m1name, $res) && array_key_exists($m0name, $res[$m1name])) continue;
            
            $monster0Win = 0;
            for ($index = 0; $index < $battleCount; $index++) {
                $monster0 = new $classes[$m0]();
                $monster1 = new $classes[$m1]();
                $game = new Game($monster0, $monster1);
                $rtn = $game->fight();
                if ($rtn === 0) {
                    $monster0Win++;
                }

                if ($index % 1000 == 0) {
                    Util::pl($monster0->getName().' wins '.$monster0Win.'/'.$index.' times');
                }
            }
            
            if (!array_key_exists($m0name, $res)) $res[$m0name] = [];
            $res[$m0name][$m1name] = [$monster0Win, $battleCount - $monster0Win];
        }
    }
    
    $output = [];
    foreach ($res as $m0name => $b) {
        foreach ($b as $m1name => $c) {
            list($win, $lose) = $c;
            
            $output[] = $m0name."\t".$m1name."\t".$win."\t".$lose;
        }
    }
    
    file_put_contents(dirname(__FILE__).'/league.txt', join("\n", $output));
}

function outputLeague()
{
    // 既存の計算結果を読み込む
    $res = [];
    $monsters = [];
    $buf = explode("\n", file_get_contents(dirname(__FILE__).'/league.txt'));
    foreach ($buf as $r) {
        list($m0, $m1, $win, $lose) = explode("\t", $r);
        
        if (!array_key_exists($m0, $res)) $res[$m0] = [];
        $res[$m0][$m1] = [$win, $lose];
        
        if (!array_key_exists($m0, $monsters)) $monsters[$m0] = 0;
        if (!array_key_exists($m1, $monsters)) $monsters[$m1] = 0;
        if ($win > $lose) $monsters[$m0] += 3;
        else $monsters[$m1] += 3;
    }
    
    // 点数計算
    arsort($monsters);
    $monstersKeys = array_keys($monsters);
    var_dump($monstersKeys);
    
    $html = <<<EOM
<style>
td {
    font-size: 150%;
    font-weight: bold;
    text-align: center;
    vertical-align: middle;
}
.win {
    background-color: #ffffff;
    color: #000000;
}
.lose {
    background-color: #000000;
    color: #ffffff;
}
</style>
<table border="1">
    <tr>
        <th></th>
EOM;
    foreach ($monstersKeys as $name) {
        $japName = (new $name())->getName();
        $html .= '<th>'.$japName.'</th>';
    }
    $html .= '</tr>';
    
    for ($m0 = 0; $m0 < count($monstersKeys); $m0++) {
        $m0name = $monstersKeys[$m0];
        $m0japName = (new $m0name())->getName();
        $html .= '<tr>';
        $html .= '<th>'.$m0japName.'</th>';
        for ($m1 = 0; $m1 < count($monstersKeys); $m1++) {
            $m1name = $monstersKeys[$m1];
            if ($m0 == $m1) {
                $html .= '<td>-</td>';
                continue;
            }
            
            if (array_key_exists($m0name, $res) && array_key_exists($m1name, $res[$m0name])) {
                list($win, $lose) = $res[$m0name][$m1name];
            }
            else {
                list($lose, $win) = $res[$m1name][$m0name];
            }
            
            if ($win > $lose) {
                $html .= '<td class="win">'.sprintf('%.1f', $win / ($win+$lose) * 100).'%</td>';
            }
            elseif ($win < $lose) {
                $html .= '<td class="lose">'.sprintf('%.1f', $win / ($win+$lose) * 100).'%</td>';
            }
            else {
                $html .= '<td>△</td>';
            }
        }
    }
    $html .= '</table>';
    
    file_put_contents(dirname(__FILE__).'/league.html', $html);
}