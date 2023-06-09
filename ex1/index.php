<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://www.jin-dev-tt.jin-it.co.jp:8010/take/jin_training/css/common.css">
    <title>Just In Next スキルアップ研修</title>
</head>

<?php

    $wrk1 = rand(0,100);
    $wrk2 = rand(0,100);
    $wrk3 = array("+","-","*","/");
    $wrk3 = $wrk3[array_rand($wrk3,1)];
    $msg = "";
    $ans = "";

    if($wrk3 == "+"){
        $ans = $wrk1 + $wrk2;
    }else if($wrk3 == "-"){
        $ans = $wrk1 - $wrk2;
    }else if($wrk3 == "*"){
        $ans = $wrk1 * $wrk2;
    }else if($wrk3 == "/"){
        $ans = $wrk1 / $wrk2;
    }else{
        $msg = "四則演算エラー";
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
            問1）
                四則演算の出題を自動生成し画面に表示させます。</br>
                ユーザが回答を入力し、回答ボタン押下して正誤判定を行ってください。</br>
                ※非同期はなしとする。
            </p>
            <p>
                <form action="http://www.jin-dev-tt.jin-it.co.jp:8010/take/jin_training/ex1/answer.php"method="POST">

                <?php 
                    if($msg != ""){
                        echo($msg);
                    }else{
                        echo($wrk1 . " " . $wrk3 . " " . $wrk2 . '= <input type="text" name="answer"></input>');
                    }
                    
                ?>
                    <input type="hidden" name="correct" value=<?php echo($ans);?>><br><br>
                    <button>答え合わせ</button>
                </form>
            </p>

        </section>
    </section>

</body>
</html>
