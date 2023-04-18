<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just In Next スキルアップ研修</title>
</head>
<body>
    <div style="margin:20px">
        <a href="http://www.jin-dev-tt.jin-it.co.jp:8010/index.html">課題</a><br><br>

        <?php
            if($_POST["correct"] == $_POST["answer"]){
                echo("「" . $_POST["correct"] ."」正解です！！");
            }else{
                echo("残念！！正解は「".$_POST["correct"] ."」です");
            }

        ?>

    </div>
</body>
</html>
