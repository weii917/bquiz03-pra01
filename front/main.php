<style>
.lists {
    position: relative;
    width: 200px;
    height: 240px;
    left: 114px;
    overflow: hidden;
}

.item * {
    box-sizing: border-box;
}

.item {
    width: 200px;
    height: 240px;
    box-sizing: border-box;
    position: absolute;
    box-sizing: border-box;
    margin: auto;
    display: none;
}

.item div {
    text-align: center;
}

.item div img {
    width: 100%;
    height: 220px;
}

/* button */
.controls {
    width: 420px;
    height: 100px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 10px;

}

.btns {
    display: flex;
    width: 360px;
    height: 100px;
    overflow: hidden;
}

.btn {
    font-size: 12px;
    width: 90px;
    text-align: center;
    flex-shrink: 0;
    position: relative;
}

.btn img {
    width: 60px;
    height: 80px;
}

.left,
.right {
    width: 0;
    border: 20px solid black;
    border-top-color: transparent;
    border-bottom-color: transparent;
}

.right {
    border-right-width: 0;
}

.left {
    border-left-width: 0;
}
</style>
<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div class="lists">
            <?php
            $posters = $Poster->all(['sh' => 1], " order by rank");
            foreach ($posters as $poster) {
            ?>
            <div class="item" data-ani="<?= $poster['ani']; ?>">
                <div><img src="./img/<?= $poster['img']; ?>" alt=""></div>
                <div><?= $poster['name']; ?></div>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="controls">
            <div class="left"></div>
            <div class="btns">
                <?php
                foreach ($posters as $idx => $poster) {
                ?>
                <div class="btn">
                    <div><img src="./img/<?= $poster['img']; ?>" alt=""></div>
                    <div><?= $poster['name']; ?></div>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="right"></div>
        </div>
    </div>
</div>
<script>
$(".item").eq(0).show();
let total = $(".btn").length;
let now = 0;
let next = 0;
let timer = setInterval(() => {
    slide()
}, 3000)

function slide(n) {

    if (typeof(n) == 'undefined') {
        next = now + 1;
        if (next >= total) {
            next = 0;
        }
    } else {
        next = n;
    }

    $(".item").eq(now).fadeOut(1000, function() {
        $(".item").eq(next).fadeIn(1000);
    })


    now = next;
}
let p = 0;
$(".left,.right").on("click", function() {
    let arrow = $(this).attr('class');
    switch (arrow) {
        case "right":
            if (p + 1 <= (total - 4)) {
                p = p + 1;
            }
            break;
        case "left":
            if (p - 1 >= 0) {
                p = p - 1;
            }
            break;
    }
    $(".btn").animate({
        right: 90 * p
    })
})
$(".btn").on('click', function() {
    let idx = $(this).index()
    slide(idx);
})
$(".btn").hover(
    function() {
        clearInterval(timer)
    },
    function() {
        timer = setInterval(() => {
            slide()
        }, 3000)
    }


)
</script>
<style>
.movies {
    display: flex;
    flex-wrap: wrap;
}

.movie {
    display: flex;
    flex-wrap: wrap;
    box-sizing: border-box;
    width: 49%;
    border: 1px solid #ccc;
    margin: 0.5%;
}
</style>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <div class="movies">
            <?php
            $today = date("Y-m-d");
            $ondate = date("Y-m-d", strtotime("-2 days"));
            $total = $Movie->count(" where `ondate` >= '$ondate' && `ondate` <= '$today' && `sh`=1");
            $div = 4;
            $pages = ceil($total / $div);
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;
            $movies = $Movie->all(" where `ondate` >= '$ondate' && `ondate` <= '$today' && `sh`='1' order by rank limit $start,$div");
            foreach ($movies as $movie) {
            ?>
            <div class="movie">
                <div style="width:35%">
                    <a href="?do=intro&id=<?= $movie['id']; ?>"><img src="./img/<?= $movie['poster']; ?>"
                            style="width:60px;border:3px solid white"></a>
                </div>
                <div style="width:65%">
                    <div><?= $movie['name']; ?></div>
                    <div>分級: <img src="./icon/03C0<?= $movie['level']; ?>.png" style="width:20px"></div>
                    <div>上映日期:<?= $movie['ondate']; ?></div>
                </div>
                <div style="width:100%">
                    <button onclick="location.href='?do=intro&id=<?= $movie['id']; ?>'">劇情簡介</button>
                    <button onclick="location.href='?do=order&id=<?= $movie['id']; ?>'">線上訂票</button>
                </div>
            </div>
            <?php
            }

            ?>
        </div>

        <div class="ct">
            <?php
            if ($now - 1 > 0) {
                $prev = $now - 1;
                echo "<a href='?p=$prev'> < </a>";
            }
            for ($i = 1; $i <= $pages; $i++) {
                echo "<a href='?p=$i'> $i </a>";
            }
            if ($now + 1 <= $pages) {
                $next = $now + 1;
                echo "<a href='?p=$next'> > </a>";
            }
            ?>
        </div>
    </div>
</div>