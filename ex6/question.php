<?php

    require_once dirname(__FILE__).'/../class/QuestionsClass.php';

    // 時間取得
    $objDateTime = new DateTime();

    $questionObj = new QuestionsClass();

    // 出題数
    $questionObj->setMaxQuestion(4);

    // 最小乱数値
    $questionObj->setMinVal(1);

    // 最大乱数値
    $questionObj->setMaxVal(50);

    // 出題作成
    $data = $questionObj->index();

?>

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

            <p>
                <form action="http://www.jin-dev-tt.jin-it.co.jp:8010/take/jin_training/ex6/answer.php"method="POST">

                <?php 

                    foreach($data as $key=>$val){

                        echo($val["question"] . '= <input type="text" name="data['.$key.'][answer]"></input>');
                        echo('<input type="hidden" name="data['.$key.'][correct]" value= ' . $val["correct"] . '><br><br>');
                        echo('<input type="hidden" name="data['.$key.'][ex]" value= "' . $val["question"] . '"><br><br>');
                    }


                    echo('<input type="hidden" name="start" value= "' . $objDateTime->format('Y-m-d H:i:s') . '">');
                ?>
                    
                    <button>答え合わせ</button>
                </form>
            </p>

        </section>
    </section>

</body>
</html>
