<!-- 17-3刪除電影api/del.php -->
<?php
include_once "db.php";
$DB = new DB($_POST['table']);
$DB->del($_POST['id']);
