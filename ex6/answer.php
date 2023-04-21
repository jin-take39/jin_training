<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://www.jin-dev-tt.jin-it.co.jp:8010/take/jin_training/css/common.css">
    <title>Just In Next スキルアップ研修</title>
</head>
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

            <?php

                // 時間取得
                $objDateTime = new DateTime();
                $endDateTime = $objDateTime->format('Y-m-d H:i:s');
                $cnt = 0;

                foreach($_POST["data"] as $key=>$val){

                    if($val["correct"] == $val["answer"]){
                        echo($val["ex"] . " = " . $val["correct"] ." は正解です！！<br><br>");
                        $cnt ++;
                    }else{
                        echo($val["ex"] . " = " . $val["answer"] . " は不正解です。正解は「".$val["correct"] ."」です<br><br>");
                    }
                }
                echo("回答までに" . strtotime($endDateTime) - strtotime($_POST["start"]) . "秒かかりました。" ."<br>");
                echo("正解率は" . $cnt . "/".count($_POST["data"]) ."<br>");

            ?>

        </section>
    </section>

</body>
</html>
