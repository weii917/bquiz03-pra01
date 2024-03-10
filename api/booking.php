<!-- 23-2根據前端ajax傳來的資料取得劃位頁面需要的內容 -->
<?php
include_once "db.php";
$movie = $Movie->find($_GET['movie_id']);
$date = $_GET['date'];
$session = $_GET['session'];

$ords = $Order->all([
    'movie' => $movie['name'],
    'date' => $date,
    'session' => $session
]);

$seats = [];
foreach ($ords as $ord) {
    $tmp = unserialize($ord['seats']);
    $seats = array_merge($seats, $tmp);
}
?>
<!-- 23-3著我們建立劃位頁面的架構，並建立必要的class name ./api/booking.php -->
<style>
    #room {
        background-image: url('./icon/03D04.png');
        background-position: center;
        background-repeat: none;
        width: 540px;
        height: 370px;
        margin: auto;
        box-sizing: border-box;
        padding: 19px 112px 0 112px;
    }

    /* 固定seat帶大小 ， 讓chkbox可以相對此區塊*/
    .seat {
        width: 63px;
        height: 85px;
        position: relative;
    }

    /* 讓裡面的seat填滿後換行 */
    .seats {
        display: flex;
        flex-wrap: wrap;
    }

    /* checkbox絕對定位相對於seat的位置距離右邊底部2px */
    .chk {
        position: absolute;
        right: 2px;
        bottom: 2px;
    }
</style>

<div id="room">
    <div class="seats">
        <?php
        for ($i = 0; $i < 20; $i++) {
            echo "<div class='seat'>";
            echo "<div class='ct'>";
            echo (floor($i / 5) + 1) . "排";
            echo (($i % 5) + 1) . "號";
            echo "</div>";
            echo "<div class='ct'>";
            if (in_array($i, $seats)) {
                echo "<img src='./icon/03D03.png'>";
            } else {
                echo "<img src='./icon/03D02.png'>";
            }
            echo "</div>";
            if (!in_array($i, $seats)) {
                echo "<input type='checkbox' name='chk' value='$i' class='chk'>";
            }
            echo "</div>";
        }
        ?>
    </div>
</div>
<!-- 23-4根據ajax傳來的資訊，將訂位資訊顯示在下方訂票資訊區 -->
<div id="info">
    <div>您選擇的電影是:<?= $movie['name']; ?></div>
    <div>您選擇的時刻是:<?= $date; ?><?= $session; ?></div>
    <div>您已經勾選 <span id='tickets'>0</span>張票，最多可以購買四張票</div>
    <div>
        <button onclick="$('#select').show();$('#booking').hide()">上一步</button>
        <button onclick="checkout()">訂購</button>
    </div>
</div>
<!-- 23-5撰寫訂位行為的js程式碼 -->
<script>
    let seats = new Array();
    $(".chk").on("change", function() {
        if ($(this).prop('checked')) {
            if (seats.length + 1 <= 4) {
                seats.push($(this).val())
            } else {
                $(this).prop('checked', false)
                alert("每個人只能勾選四張票")

            }
        } else {
            seats.splice(seats.indexOf($(this).val()), 1)
        }
        $("#tickets").text(seats.length)
    })

    // 23 - 6 撰寫送出訂單函式

    function checkout() {
        $.post("./api/checkout.php", {
                movie: '<?= $movie['name']; ?>',
                date: '<?= $date; ?>',
                session: '<?= $session; ?>',
                qt: seats.length,
                seats
            },
            (no) => {
                console.log(`?do=result&no=${no}`);
                location.href = `?do=result&no=${no}`;
            })
    }
</script>