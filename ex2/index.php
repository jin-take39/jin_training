<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://www.jin-dev-tt.jin-it.co.jp:8010/take/jin_training/css/common.css">
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
            $ansList[$i] = $listWrk1[$i] / $listWrk2[$i];
        }else{
            $msgList[$i] = "四則演算エラー";
        }

    }
    


?>

<body>

    <section class="container">

        <header class="header" id="header">
            <div class="header__inner">
                <a href="http://www.jin-dev-tt.jin-it.co.jp:8010/take/jin_training/index.html"><div class="header__logo"></div></a>
            </div>
        </header>

        <section class="title">
            <h1>Just In Next PHP 言語研修</h1>
        </section>
        <section class="contents">

            <p> 
            問2）
                四則演算の出題を自動生成し画面に表示させます。</br>
                ユーザが回答を入力し、回答ボタン押下して正誤判定を行ってください。</br>
                ※非同期はなしとする。
            </p>
            <p>
                <form action="http://www.jin-dev-tt.jin-it.co.jp:8010/take/jin_training/ex2/answer.php"method="POST">

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

        </section>
    </section>

</body>
</html>
