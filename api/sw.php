<?php
include_once "db.php";
$table = $_POST['table'];
$DB = new DB($table);
$row = $DB->find($_POST['id']);
$sw = $DB->find($_POST['sw']);
$tmp = $row['rank'];
$row['rank'] = $sw['rank'];
$sw['rank'] = $tmp;
$DB->save($row);
$DB->save($sw);
