<!-- 22-5 完成ajax取得日期的功能api -->
<!-- 上映日期跟今天比 就知道還有幾天，上映日期加兩天是最後上映時間
結束日期減今天會知道還有幾天可以上映，用迴圈判斷小於等於剩餘天數，
0是今天、1是明天、2是後天，從0開始算因為0包含是今天，所以小於等於$diff-->
<?php
include_once "db.php";
$movie = $_GET['id'];
$ondate = strtotime($Movie->find($movie)['ondate']);
$today = strtotime(date("Y-m-d"));
$end = strtotime("+2 days", $ondate);
$diff = ($end - $today) / (60 * 60 * 24);
for ($i = 0; $i <= $diff; $i++) {
    $date = date("Y-m-d", strtotime("+$i days"));
    echo "<option value='$date'>$date</option>";
}
