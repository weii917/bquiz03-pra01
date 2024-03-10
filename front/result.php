<?php
// <!-- 23-8透過ajax取得訂單編號，同時將頁面導向訂單結果頁面，再利用訂單編號取得訂單資料，來產生訂單結果頁面。**./front/result.php** -->
$order = $Order->find(['no' => $_GET['no']]);
?>
<table>
    <tr>
        <td colspan='2'>感謝您的訂購，您的訂單編號是:<?= $_GET['no']; ?></td>
    </tr>
    <tr>
        <td>電影名稱：</td>
        <td><?= $order['movie']; ?></td>
    </tr>
    <tr>
        <td>日期：</td>
        <td><?= $order['date']; ?></td>
    </tr>
    <tr>
        <td>場次時間：</td>
        <td><?= $order['session']; ?></td>
    </tr>
    <tr>
        <td colspan='2'>
            座位：<br>
            <?php
            $seats = unserialize($order['seats']);
            foreach ($seats as $seat) {
                echo (floor($seat / 5) + 1) . "排";
                echo (($seat % 5) + 1) . "號";
                echo "<br>";
            }
            echo "共{$order['qt']}張電影票"
            ?>
        </td>
    </tr>
</table>
<div class="ct"><button onclick="location.href='index.php'">確認</button></div>