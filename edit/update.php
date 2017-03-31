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

$id = $_GET['id'];

$sql="SELECT * FROM bug WHERE id=".$id;
print($sql);
$result = mysql_query($sql);

$rows = mysql_num_rows($result);

if($rows){
	$row = mysql_fetch_array($result);
	
	$moku = $row['moku'];
	$family=$row["family"];
	$name=$row["name"];
	$min=$row["min"];
	$max=$row["max"];
	$start=$row["start"];
	$finish=$row["finish"];
	$color = $row["color"];
	$color2 = $row["color2"];
	$low = $row["low"];
	$high = $row["high"];
	
	$step = "<input type=\"submit\" name=\"submit\" value=\"更新\">";	
}else{
	$step = "<a href=\"#\" onClick=\"history.back(); return false;\">前に戻る</a>\n";
}

mysql_free_result($result);
?>
<form action="update2.php" method="post">
更新<br>
<table>
<tr><td>id[<?=$id?>]</td><td><input type="hidden" name="id" value="<?=$id?>"></td></tr>
<tr><td>目[<?=$moku?>]</td><td><input type="text" name="moku" value="<?=$moku?>"></td></tr>
<tr><td>科[<?=$family?>]</td><td><input type="text" name="family" value="<?=$family?>"></td></tr>
<tr><td>和名[<?=$name?>]</td><td><input type="text" name="name" value="<?=$name?>"></td></tr>
<tr><td>最小[<?=$min?>]</td><td><input type="text" name="min" value="<?=$min?>"></td></tr>
<tr><td>最大[<?=$max?>]</td><td><input type="text" name="max" value="<?=$max?>"></td></tr>
<tr><td>開始[<?=$start?>]</td><td><input type="text" name="start" value="<?=$start?>"></td></tr>
<tr><td>終了[<?=$finish?>]</td><td><input type="text" name="finish" value="<?=$finish?>"></td></tr>
<tr><td>色彩1[<?=$color?>]</td><td><input type="text" name="color" value="<?=$color?>"></td></tr>
<tr><td>色彩2[<?=$color2?>]</td><td><input type="text" name="color2" value="<?=$color2?>"></td></tr>
<tr><td>生息地(低)[<?=$low?>]</td><td><input type="text" name="low" value="<?=$low?>"></td></tr>
<tr><td>生息地(高)[<?=$high?>]</td><td><input type="text" name="high" value="<?=$high?>"></td></tr>
</table>
に変更しますか？
<?=$step?>
</form>