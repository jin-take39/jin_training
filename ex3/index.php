<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just In Next スキルアップ研修</title>
</head>

<?php

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

        if($listWrk3[$i] == "+"){
            $ansList[$i] = $listWrk1[$i] + $listWrk2[$i];
        }else if($listWrk3[$i] == "-"){
            $ansList[$i] = $listWrk1[$i] - $listWrk2[$i];
        }else if($listWrk3[$i] == "*"){
            $ansList[$i] = $listWrk1[$i] * $listWrk2[$i];
        }else if($listWrk3[$i] == "/"){

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
            $ansList[$i] = round($listWrk1[$i] / $listWrk2[$i],2);

        }else{
            $msgList[$i] = "四則演算エラー";
        }

    }
    


?>

<body>
    <div style="margin:20px">
        <a href="http://www.jin-dev-tt.jin-it.co.jp:8010/take/jin_training/index.html">課題</a><br>
        <p> 
        問1）
            問1の応用として、下記例外処理を実装してください。</br>
            <ul>
                <li>数字以外が入力された場合、エラー表示してください。</li>
                <li>0で割ったときは、エラー表示してください。例）3 / 0 ⇒　エラー</li>
                <li>割り算で小数点が発生した場合、小数第三位を四捨五入して正誤判定を行ってください。</li>
            </ul>
        </p>
        <p>
            <form action="http://www.jin-dev-tt.jin-it.co.jp:8010/take/jin_training/ex3/answer.php"method="POST">

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
            ?>
                
                <button>答え合わせ</button>
            </form>
        </p>
    </div>
</body>
</html>
