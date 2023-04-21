<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just In Next スキルアップ研修</title>
</head>
<body>
    <div style="margin:20px">
        <a href="http://www.jin-dev-tt.jin-it.co.jp:8010/take/jin_training/index.html">課題</a><br><br>

        <?php

            // 時間取得
            $objDateTime = new DateTime();
            $endDateTime = $objDateTime->format('Y-m-d H:i:s');
            $cnt = 0;
        
            for($i=0; $i<10; $i++){

                if($_POST["correct".$i] == $_POST["answer".$i]){
                    echo($_POST["ex".$i] . " = " . $_POST["correct".$i] ." は正解です！！<br><br>");
                    $cnt ++;
                }else{
                    echo($_POST["ex".$i] . " = " . $_POST["answer".$i] . " は不正解です。正解は「".$_POST["correct".$i] ."」です<br><br>");
                }
            }
            echo("回答までに" . strtotime($endDateTime) - strtotime($_POST["start"]) . "秒かかりました。" ."<br>");
            echo("正解率は" . $cnt . "/10" ."<br>");
        ?>

    </div>
</body>
</html>
