<style type="text/css">
body{
font-family:メイリオ;
}
table{
 border:solid 2px #258;
 border-radius: 10px;
 margin: 10px 20px 0px 0px;
}
table td{
 background-color:#87ceeb;
 border-radius: 5px;
 font-size:100%;
 text-align: center;
}

table, th, td {
    border:none;
}
</style>
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
	$moku = $_POST['moku'];
	$family = $_POST['family'];
	$name = $_POST['name'];
	$min = $_POST['min'];
	$max = $_POST['max'];
	$start = $_POST['start'];
	$finish = $_POST['finish'];
	$color = $_POST["color"];
	$color2 = $_POST["color2"];
	$low = $_POST["low"];
	$high = $_POST["high"];

if(!empty($id)){
	$query="SELECT * FROM bug id=".$id;
	print($query);
	$mes = "";
	$result = mysql_query($query);
}else{
	$mes = "idを指定してください。";
}
?>
追加
<form action="insert2.php" method="post">
<table>
<tr><td>id</td><td><?=$id?><input type="hidden" name="id" value="<?=$id?>"></td></tr>
<tr><td>目</td><td><?=$moku?><input type="hidden" name="moku" value="<?=$moku?>"></td></tr>
<tr><td>科</td><td><?=$family?><input type="hidden" name="family" value="<?=$family?>"></td></tr>
<tr><td>和名</td><td><?=$name?><input type="hidden" name="name" value="<?=$name?>"></td></tr>
<tr><td>最小</td><td><?=$min?><input type="hidden" name="min" value="<?=$min?>"></td></tr>
<tr><td>最大</td><td><?=$max?><input type="hidden" name="max" value="<?=$max?>"></td></tr>
<tr><td>開始</td><td><?=$start?><input type="hidden" name="start" value="<?=$start?>"></td></tr>
<tr><td>終了</td><td><?=$finish?><input type="hidden" name="finish" value="<?=$finish?>"></td></tr>
<tr><td>色彩1</td><td><?=$color?><input type="hidden" name="color" value="<?=$color?>"></td></tr>
<tr><td>色彩2</td><td><?=$color2?><input type="hidden" name="color2" value="<?=$color2?>"></td></tr>
<tr><td>生息地(低)</td><td><?=$low?><input type="hidden" name="low" value="<?=$low?>"></td></tr>
<tr><td>生息地(高)</td><td><?=$high?><input type="hidden" name="high" value="<?=$high?>"></td></tr>
</table>
<input class="btn"type="submit" name="submit" value="追加">
<a href="#" onClick="history.back(); return false;">前に戻る</a>
</form>