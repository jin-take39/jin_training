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

                for($i=0; $i<10; $i++){

                    if($_POST["correct".$i] == $_POST["answer".$i]){
                        echo($_POST["ex".$i] . " = " . $_POST["correct".$i] ." は正解です！！<br><br>");
                    }else{
                        echo($_POST["ex".$i] . " = " . $_POST["answer".$i] . " は不正解です。正解は「".$_POST["correct".$i] ."」です<br><br>");
                    }
        

                }


            ?>

        </section>
    </section>
</body>
</html>
