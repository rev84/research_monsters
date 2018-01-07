<?php
/**
 * Description of Game
 *
 * @author revin
 */
class Game
{
    public $monsters = [];
    public $now0 = null;
    public $turn = 0;
    
    public function __construct(MonsterBase $monster0, MonsterBase $monster1, $first = null)
    {
        // モンスターをセット
        $this->monsters = [$monster0, $monster1];
        // どっちの先攻かを決める
        $this->setFirst($first);
        
        // ぐるぐる回していく
        $this->runLoop();
    }
    
    /**
     * 先攻を決める
     * @param type $first
     */
    protected function setFirst($first)
    {
        if (is_null($first)) {
            $seed = mt_rand(0, 1);
        }
        else {
            $seed = $first;
        }
        $this->now0 = $seed == 0;
        Util::log('先攻は'.$this->monsters[$seed]->getName());
    }
    
    protected function changeFirst()
    {
        $this->now0 = !$this->now0;
    }
    
    /**
     * 決着がつくまでやる
     * @return type
     */
    public function runLoop()
    {
        // 現状を書き込み
        $this->logCapture();
        
        while (is_null($isEnd = $this->run())) {
            ;
        }
        
        // 勝敗報告
        Util::log($this->monsters[$isEnd]->getName().'の勝ち');
    }
    
    /**
     * 1ターンすすめる
     */
    public function run()
    {
        $monster = $this->now0 ? $this->monsters[0] : $this->monsters[1];
        Util::log($monster->getName().'のターン');
        
        // 行動
        $monster->play();
        
        // 現状を書き込み
        $this->logCapture();
        
        // 勝敗判定
        $isEnd = $this->checkEnd();
        
        // ターン入れ替え
        $this->changeFirst();
        $this->turn++;
        
        // 結果を返す
        return $isEnd;
    }
    
    /**
     * 勝敗判定
     * @return int
     */
    public function checkEnd()
    {
        // 死亡判定
        $monster0isDead = $this->monsters[0]->hp <= 0;
        $monster1isDead = $this->monsters[1]->hp <= 0;
        
        // 数値はどちらかの勝ち、-1は引き分け、nullは継続
        
        // 両方生きている
        if (!$monster0isDead && !$monster1isDead) {
            return null;
        }
        // 0が死んでいて1が生きている
        if ($monster0isDead && !$monster1isDead) {
            return 0;
        }
        // 1が死んでいて0が生きている
        elseif (!$monster0isDead && $monster1isDead) {
            return 1;
        }
        // どっちも死んでいる
        else {
            // 現在のターンのやつの負け
            if ($this->now0) {
                return 1;
            }
            else {
                return 0;
            }
        }
        
        // 継続
        return null;
    }
    
    public function logCapture()
    {
        Util::log('ターン終了：'.$this->turn);
        foreach ($this->monsters as $m) {
            Util::log($m->getCapture());
        }
    }
}
