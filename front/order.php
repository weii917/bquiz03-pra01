<!-- 22-1.建立使用ajax取得上映中的電影選單資料 -->
<div id="select">
    <div class="ct">線上訂票</div>
    <div class="order">
        <div>
            <label for="">電影:</label>
            <select name="movie" id="movie"></select>
        </div>
        <div>
            <label for="">日期:</label>
            <select name="date" id="date"></select>
        </div>
        <div>
            <label for="">場次:</label>
            <select name="session" id="session"></select>
        </div>
        <div>
            <!-- 23-1.設定點確定會執行booking -->
            <button onclick="booking()">確定</button>
            <button>重置</button>
        </div>
    </div>
</div>
<div id="booking" style="display:none"></div>
<script>
    // 22-7增加判斷網址參數來選中電影的功能
    let url = new URL(window.location.href)
    // 22-4完成ajax取得日期的功能
    getMovies()
    $("#movie").on("change", function() {
        getDates($("#movie").val())
    })
    // 22-6-1 先建立取得場次的基礎後端程式
    $("#date").on("change", function() {
        getSessions($("#movie").val(), $("#date").val())
    })

    // 22-3 建構前端連動選單的三個函式架構
    function getMovies() {
        $.get("./api/get_movies.php", (movies) => {
            $("#movie").html(movies);
            // 22-7增加判斷網址參數來選中電影的功能
            if (url.searchParams.has('id')) {
                // 如果網址中帶有id， 則將選單定位到該部電影的選項中
                $(`#movie option[value='${url.searchParams.get('id')}']`).prop('selected', true);
            }
            //將電影選單中的值帶入到getDate()函式中，去執行可上映日期選單的內容
            getDates($("#movie").val())
        })
    }
    // 22-4完成ajax取得日期的功能
    //取得選中的院線片可訂票日期
    function getDates(id) {
        $.get("./api/get_dates.php", {
            id
        }, (dates) => {
            console.log(dates)
            $("#date").html(dates);
            //分別取得目前選中的電影與日期
            let movie = $("#movie").val();
            let date = $('#date').val();
            //執行一次可訂場次的函式，參數中帶入電影id及所選的日期
            getSessions(movie, date)
        })
    }
    //取得選中的院線片及指定日期的可訂票場次剩餘座位
    function getSessions(movie, date) {
        $.get("./api/get_sessions.php", {
            movie,
            date
        }, (sessions) => {

            $("#session").html(sessions);
        })
    }

    //23-2將訂票資訊傳至後端./api/booking.php，並取回劃位頁面html內容 
    function booking() {
        let order = {
            movie_id: $("#movie").val(),
            date: $("#date").val(),
            session: $("#session").val()
        }
        $.get("./api/booking.php", order, (booking) => {
            $("#booking").html(booking)
            $("#select").hide()
            $("#booking").show()
        })
    }
</script>