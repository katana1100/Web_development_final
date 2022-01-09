<!DOCTYPE html>
<html>

<head>
    <?php
    // 載入conn.php來連結資料庫
    require_once 'conn.php';
    ?>
    <meta charset="utf-8" />
    <title>特定分行專屬之貸款計畫查詢</title>
</head>

<body>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://localhost:8888">查詢系統首頁</a></li>
            <li class="breadcrumb-item active" aria-current="page">特定分行專屬之貸款計畫查詢</li>
        </ol>
    </nav>
    <center>
        <h2>特定分行專屬之貸款計畫查詢</h2>

        <form method="post">
            <br>分行名稱：
            <select class="form-control" name="name">
                <option>東海分行</option>
                <option>永康分行</option>
                <option>虎尾寮分行</option>
            </select>
            <br><input class="btn btn-primary" type="submit" value="開始查詢">
        </form>

        <?php
        // 設置一個空陣列來放資料
        $datas = array();

        // 分行名稱
        $name = $_POST['name'];

        // sql語法存在變數中
        $sql = "SELECT LP_name,LP_code FROM Final_S07352026.LOAN_PROJECT WHERE LP_Bank='$name'";

        // 用mysqli_query方法執行(sql語法)將結果存在變數中
        $result = mysqli_query($link,$sql);

        // 如果有資料
        if ($result) {
            // mysqli_num_rows方法可以回傳我們結果總共有幾筆資料
            if (mysqli_num_rows($result)>0) {
                // 取得大於0代表有資料
                // while迴圈會根據資料數量，決定跑的次數
                // mysqli_fetch_assoc方法可取得一筆值
                while ($row = mysqli_fetch_assoc($result)) {
                    // 每跑一次迴圈就抓一筆值，最後放進data陣列中
                    $datas[] = $row;
                }
            }
            // 釋放資料庫查到的記憶體
            mysqli_free_result($result);
        }
        else {
            echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
        }
        ?>

        <br>
        <h3>查詢結果</h3>

        <div class="card" style="width :18rem;">
            <div class="card-header">
                <?php if ( !empty( $datas ) ): ?>
                分行名稱：<?php echo $name;
?> </div>
            <ul class="list-group list-group-flush">
                <!-- 資料 as key( 下標 ) => row( 資料的row ) -->
                <?php foreach ( $datas as $key => $row ) :?>
                <li class="list-group-item">
                    貸款計畫名稱：<?php echo $row['LP_name'];
                    ?>  </li>
                <li class="list-group-item">貸款計畫編號： <?php echo $row['LP_code'];
?></li>
                <?php endforeach;
?>
                <?php endif;
?>
        </div>

        <!-- 代表結束連線 -->
        <?php mysqli_close($link); ?>
    </center>
</body>

</html>
