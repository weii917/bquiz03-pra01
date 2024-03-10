<?php
//24 快速刪除，將POST的電影或日期他的值，當條件做到資料表刪除
include_once "db.php";
$data[$_POST['type']] = $_POST['val'];
$Order->del($data);
