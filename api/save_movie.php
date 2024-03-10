<!-- 15-3 建立 /api/save_movie.php 檔案，並撰寫新增院線片的後端程式 -->
<!-- 17-2 編輯共用/api/save_movie.php 檔案，更新的相關程式 -->
<?php
include_once "db.php";
if (!empty($_FILES['trailer']['tmp_name'])) {
    move_uploaded_file($_FILES['trailer']['tmp_name'], "../img/{$_FILES['trailer']['name']}");
    $_POST['trailer'] = $_FILES['trailer']['name'];
}
if (!empty($_FILES['poster']['tmp_name'])) {
    move_uploaded_file($_FILES['poster']['tmp_name'], "../img/{$_FILES['poster']['name']}");
    $_POST['poster'] = $_FILES['poster']['name'];
}

$_POST['ondate'] = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['date'];
unset($_POST['year'], $_POST['month'], $_POST['date']);

if (!isset($_POST['id'])) {
    $_POST['sh'] = 1;
    $_POST['rank'] = $Movie->max('id') + 1;
}

$Movie->save($_POST);
to("../back.php?do=movie");
?>