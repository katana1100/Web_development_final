<!DOCTYPE html>
<html>

<head>
    <?php
// 載入conn.php來連結資料庫
require_once 'conn.php';
?>
    <meta charset="utf-8" />
    <title>銀行資料庫查詢系統</title>
</head>

<body>
    <center>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">查詢系統首頁</a></li>
            </ol>
        </nav>
        <ul>
            <li><a href="select_1A.php">分行資訊查詢</a></li>
            <li><a href="select_1B.php">特定分行專屬之貸款計畫查詢</a></li>
            <li><a href="select_1C.php">特定貸款計畫之客戶資訊查詢</a></li>
            <li><a href="select_1D.php">特定貸款計畫之總金額查詢</a></li>
            <li><a href="select_2A.php">客戶於特定分行之貸款資訊查詢</a></li>
            <li><a href="select_2B.php">客戶之貸款總金額查詢</a></li>
        </ul>
    </center>
</body>

</html>
