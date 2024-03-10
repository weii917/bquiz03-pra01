<!-- 10-2.接著將db.php檔案引入到 index.php 及 back.php 中： -->
<?php
include_once "./api/db.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0047)? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>影城</title>
  <!-- 6.更改路徑 -->
  <link rel="stylesheet" href="css/css.css">
  <!-- 6.刪除s2路徑 -->
  <!-- <link href="home_files/s2.css" rel="stylesheet" type="text/css"> -->
  <script src="js/jquery-1.9.1.min.js"></script>
</head>

<body>
  <div id="main">
    <div id="top" class="ct" style=" background:#999 center; background-size:cover; " title="替代文字">
      <h1>ABC影城</h1>
    </div>
    <div id="top2">
      <!-- 7-4修改 index.php及back.php中的主選單連結及後台功能連結。 --> <!-- 7-4修改 index.php及back.php中的主選單連結及後台功能連結。 -->
      <a href="index.php">首頁</a>
      <a href="index.php?do=order">線上訂票</a>
      <a href="#">會員系統</a>
      <a href="back.php">管理系統</a>
    </div>
    <div id="text"> <span class="ct">最新活動</span>
      <marquee direction="right">
        ABC影城票價全面八折優惠1個月
      </marquee>
    </div>
    <!-- 7-1. 在 index.php 中找到中間主要內容區的區塊，切出去成為 main.php 放在 /front/ 目錄中。-->
    <div id="mm">
      <!-- 8-1.使用 include 指令來重新組合 index.php 及 back.php 頁面，並加上判斷式來確保要組合的檔案是存在的。 -->
      <?php
      $do = $_GET['do'] ?? 'main';
      $file = "./front/{$do}.php";
      if (file_exists($file)) {
        include $file;
      } else {
        include "./front/main.php";
      }
      ?>
    </div>
    <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
  </div>
</body>

</html>