<?php
// <!-- 撰寫後端儲存訂單資料的程式./api/checkout.php -->
include_once "db.php";
sort($_POST['seats']);
$_POST['seats'] = serialize($_POST['seats']);
$id = $Order->max('id') + 1;
$_POST['no'] = date("Ymd") . sprintf("%04d", $id);
$Order->save($_POST);
echo $_POST['no'];
