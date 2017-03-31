<?php
header("Content-Type: text/html; charset=sjis");

//DB接続
$link = mysql_connect("localhost","root","kerorok66");
if(!$link){
	die('接続失敗です.'.mysql_error());
}
print ('接続に成功しました');

$db_selected = mysql_select_db('bugdb', $link);
if(!$db_selected){
	die('データベースの選択に失敗しました。'.mysql_error());
}
print('→データベースを選択しました。');

mysql_set_charset('sjis');

$id = $_POST['id'];

$sql="DELETE FROM bug WHERE id=".$id;
print($sql);
$result = mysql_query($sql);

?>

削除<br>
id:<?=$id?>を削除しました！
<a href="..\edit.php">全権表示</a>