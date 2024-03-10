<!-- 22-6-2先建立取得場次的基礎後端程式 api -->
<?php
include_once "db.php";
$movie = $_GET['movie'];
$movieName = $Movie->find($movie)['name'];
$date = $_GET['date'];
// 取得目前的24小時制的小時數
$H = date("G");
/**
 * 如果訂票觀看的日期不是今天，或是目前的時間在下午兩點前
 * 那麼應該會有五個場次可以選擇；
 * 如果要訂票觀看的日期是今天，而且時間已經超過下午兩點了
 * 那麼只能訂兩點以後還沒上映的場次
 * 我們在這裏計算出可以選擇的起始場次
 */
// 原本的用6-剩餘場次得到目前從哪場開始
// $start = ($H >= 14 && $date == date("Y-m-d")) ? (6 - ceil((24 - $H) / 2) - 1) : 1;
$start = ($H >= 14 && $date == date("Y-m-d")) ? 7 - ceil((24 - $H) / 2) : 1;

for ($i = $start; $i <= 5; $i++) {
    $qt = $Order->sum('qt', ['movie' => $movieName, 'date' => $date, 'session' => $sess[$i]]);
    $lave = 20 - $qt;
    echo "<option value='{$sess[$i]}'>{$sess[$i]} 剩餘座位 $lave</option>";
}
