<!-- 22-6-2先建立取得場次的基礎後端程式 api -->
<?php
include_once "db.php";
$movie = $_GET['movie'];
$movieName = $Movie->find($movie)['name'];
$date = $_GET['date'];
// 取得目前的24小時制的小時數
$H = date("G");

$start = ($H >= 14 && $date == date("Y-m-d")) ? 7 - ceil((24 - $H) / 2) : 1;

for ($i = $start; $i <= 5; $i++) {
    $qt = $Order->sum('qt', ['movie' => $movieName, 'date' => $date, 'session' => $sess[$i]]);
    $lave = 20 - $qt;
    echo "<option value='{$sess[$i]}'>{$sess[$i]} 剩餘座位 $lave</option>";
}
