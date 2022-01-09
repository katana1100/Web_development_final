<!DOCTYPE html>
<html>

<head>
    <?php
    // 載入conn.php來連結資料庫
    require_once 'conn.php';
    ?>
    <meta charset="utf-8" />
    <title>特定貸款計畫之客戶資訊查詢</title>
</head>

<body>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://localhost:8888">查詢系統首頁</a></li>
            <li class="breadcrumb-item active" aria-current="page">特定分行專屬之貸款計畫查詢</li>
        </ol>
    </nav>
    <center>
        <h2>特定貸款計畫之客戶資訊查詢</h2>

        <form method="post">
            <br>請輸入貸款計畫名稱：
            <br><input type="text" name="name">
            <input class="btn btn-primary" type="submit" value="開始查詢">
            <input class="btn btn-warning" type="reset" value="清除輸入內容">
        </form>

        <?php
        // 設置一個空陣列來放資料
        $datas = array();

        // 名稱
        $name = $_POST['name'];

        // sql語法存在變數中
        $sql = "SELECT LP_C_name AS 客戶名稱, LP_total AS 貸款總額, LP_repay_per_year AS 每年還款 FROM Final_S07352026.LOAN_CLIENT WHERE LP_P_name='$name'";

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
                貸款計畫名稱：<?php echo $name;
?> </div>
            <ul class="list-group list-group-flush">
                <!-- 資料 as key( 下標 ) => row( 資料的row ) -->
                <?php foreach ( $datas as $key => $row ) :?>
                <li class="list-group-item">
                    客戶姓名：<?php echo $row['客戶名稱'];
                    ?></li>
                <li class="list-group-item">
                    已貸款總額：<?php echo $row['貸款總額'];
                    ?> 元 </li>
                <li class="list-group-item">每年還款： <?php echo $row['每年還款'];
?> 元</li>
                <?php endforeach;
?>
                <?php endif;
?>
        </div>
        
        <script src="calc.js"></script>
        <table border=1>
            <tr>
                <td align="center" colspan="6">
                    <input align="right" type="text" value="0" id="box" />
                </td>
            </tr>
            <tr>
                <td> <input id="mAdd" type="button" value="M+" onClick="buttonM('M+')"> </td>
                <td> <input id="mMinus" type="button" value="M-" onClick="buttonM('M-')"> </td>
                <td> <input id="mC" type="button" value="MC" onClick="buttonM('MC')"> </td>
                <td> <input id="mR" type="button" value="MR" onClick="buttonM('MR')"> </td>
            </tr>


            <tr align="center">
                <td> <input type="button" value="7" onClick="numBtn('7')"> </td>
                <td> <input type="button" value="8" onClick="numBtn('8')"> </td>
                <td> <input type="button" value="9" onClick="numBtn('9')"> </td>
                <td> <input type="button" value="+" onClick="operBtn('+')"> </td>
            </tr>

            <tr align="center">
                <td> <input type="button" value="4" onClick="numBtn('4')"> </td>
                <td> <input type="button" value="5" onClick="numBtn('5')"> </td>
                <td> <input type="button" value="6" onClick="numBtn('6')"> </td>
                <td> <input type="button" value="-" onClick="operBtn('-')"> </td>
            </tr>

            <tr align="center">
                <td> <input type="button" value="1" onClick="numBtn('1')"> </td>
                <td> <input type="button" value="2" onClick="numBtn('2')"> </td>
                <td> <input type="button" value="3" onClick="numBtn('3')"> </td>
                <td> <input type="button" value="*" onClick="operBtn('*')"> </td>
            </tr>

            <tr align="center">
                <td> <input type="button" value="0" onClick="numBtn('0')"> </td>
                <td> <input type="button" value="." onClick="numBtn('.')"> </td>
                <td> <input type="button" value="=" onClick="equal()"> </td>
                <td> <input type="button" value="/" onClick="operBtn('/')"> </td>
            </tr>
        </table>

        <a href="http://localhost:8888"><br>回查詢系統首頁</a>
        <!-- 代表結束連線 -->
        <?php mysqli_close($link); ?>

    </center>
</body>

</html>
