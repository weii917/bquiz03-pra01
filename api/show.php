<?php
// 16.2-2 顯示/隱藏按鈕
include_once "db.php";
$row = $Movie->find($_POST['id']);
//$row['sh']=($row['sh']==1)?0:1;
$row['sh'] = ($row['sh'] + 1) % 2;
$Movie->save($row);
