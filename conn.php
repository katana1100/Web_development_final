<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<?php
$host = 'localhost:3306';
$dbuser ='root';
$dbpassword = 'Kterlera1508';
$dbname = 'Final_S07352026';
$link = mysqli_connect($host,$dbuser,$dbpassword,$dbname);
if($link){
    mysqli_query($link,'SET NAMES utf8');
    echo"<div class=\"alert alert-success\" role=\"alert\">已成功連接資料庫！</div>";
}
else {
    echo"<div class=\"alert alert-danger\" role=\"alert\">資料庫連接失敗！</div>";
} 
?>
