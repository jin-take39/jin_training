<?php

class QuestionsClass{

    private $__max = 0;     // 最大出題数

    private $__maxVal = 100;   // 乱数最大値

    private $__minVal = 0;   // 乱数最小値

    private $__calType = 0; // 四則演算タイプ

    public function index(){

        $listWrk1 = array();
        $listWrk2 = array();
        $listWrk3 = array();
        $wrk = array("+","-","*","/");
        $msgList = array();
    
        // 問題10問作成
        for($i = 0 ; $i < $this->__max; $i++){
    
            $listWrk1[] = rand($this->__minVal,$this->__maxVal);
            $listWrk2[] = rand($this->__minVal,$this->__maxVal);
            $listWrk3[] = $wrk[array_rand($wrk,1)];
    
            // 「-」大小比較
            if($listWrk3[$i] == "-"){
    
                // 右辺が左辺よりも小さくなるまでループ
                while(1 == 1){
                    $listWrk2[$i] = rand($this->__minVal,$this->__maxVal);
                    if($listWrk1[$i] >= $listWrk2[$i]){
                        break;
                    }
                }
            }
    
            // 割り算の小数点なし計算式
            if($listWrk3[$i] == "/"){
    
                // 分母が0の時は再取得
                if($listWrk2[$i] == 0){
    
                    // 0で亡くなるまでループ
                    while(1==1){
                        $wrkBunbo = rand($this->__minVal,$this->__max);
                        if($wrkBunbo != 0){
    
                            // 分母格納
                            $listWrk2[$i] = $wrkBunbo;
                            break;
                        }
                    }
                }
    
                // あまりがでない式
                if($listWrk1[$i] % $listWrk2[$i] != 0){
                    $listWrk1[$i] = $listWrk1[$i]-($listWrk1[$i] % $listWrk2[$i]);
                }
            }
    
            if($listWrk3[$i] == "+"){
                $data[$i]["correct"] = $listWrk1[$i] + $listWrk2[$i];
            }else if($listWrk3[$i] == "-"){
                $data[$i]["correct"] = $listWrk1[$i] - $listWrk2[$i];
            }else if($listWrk3[$i] == "*"){
                $data[$i]["correct"] = $listWrk1[$i] * $listWrk2[$i];
            }else if($listWrk3[$i] == "/"){
                $data[$i]["correct"] = $listWrk1[$i] / $listWrk2[$i];
            }else{
                $data[$i]["correct"] =  "四則演算エラー";
            }

            // 問題格納
            $data[$i]["question"] = $listWrk1[$i] . " " . $listWrk3[$i] . " " . $listWrk2[$i];

        }

        return $data;

    }

    /**
     * 出題数
     */
    public function setMaxQuestion($val){

        $this->__max = $val;
    }

    /**
     * 乱数最大値
     */
    public function setMaxVal($val){

        $this->__maxVal = $val;
    }

    /**
     * 乱数最小値
     */
    public function setMinVal($val){

        $this->__minVal = $val;
    }

    /**
     * 四則演算タイプ
     */
    public function setCalType($val){
        $this->__calType = $val;
    }
}