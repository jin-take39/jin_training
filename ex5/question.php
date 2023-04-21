<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just In Next スキルアップ研修</title>
</head>

<?php

    // 時間取得
    $objDateTime = new DateTime();

    $listWrk1 = array();
    $listWrk2 = array();
    $listWrk3 = array();
    $ansList = array();
    $wrk = array("+","-","*","/");
    $msgList = array();

    // 問題10問作成
    for($i = 0 ; $i < 10 ; $i++){

        $listWrk1[] = rand(0,100);
        $listWrk2[] = rand(0,100);
        $listWrk3[] = $wrk[array_rand($wrk,1)];

        // 「-」大小比較
        if($listWrk3[$i] == "-"){

            // 右辺が左辺よりも小さくなるまでループ
            while(1 == 1){
                $listWrk2[$i] = rand(0,100);
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
                    $wrkBunbo = rand(0,100);
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
            $ansList[$i] = $listWrk1[$i] + $listWrk2[$i];
        }else if($listWrk3[$i] == "-"){
            $ansList[$i] = $listWrk1[$i] - $listWrk2[$i];
        }else if($listWrk3[$i] == "*"){
            $ansList[$i] = $listWrk1[$i] * $listWrk2[$i];
        }else if($listWrk3[$i] == "/"){
            $ansList[$i] = $listWrk1[$i] / $listWrk2[$i];
        }else{
            $msgList[$i] = "四則演算エラー";
        }

    }
    


?>

<body>
    <div style="margin:20px">

        <p>
            <form action="http://www.jin-dev-tt.jin-it.co.jp:8010/take/jin_training/ex5/answer.php"method="POST">

            <?php 

                foreach($ansList as $key=>$val){

                    if( array_key_exists($key,$msgList)){
                        echo($msgList[$key]);
                    }else{
                        echo($listWrk1[$key] . " " . $listWrk3[$key] . " " . $listWrk2[$key] . '= <input type="text" name="answer'.$key.'"></input>');
                    }

                    echo('<input type="hidden" name="correct'.$key.'" value= ' . $ansList[$key] . '><br><br>');
                    echo('<input type="hidden" name="ex'.$key.'" value= "' . $listWrk1[$key] . " " . $listWrk3[$key] . " " . $listWrk2[$key] . '"><br><br>');
                }
                echo('<input type="hidden" name="start" value= "' . $objDateTime->format('Y-m-d H:i:s') . '">');
            ?>
                
                <button>答え合わせ</button>
            </form>
        </p>
    </div>
</body>
</html>
