<link rel="stylesheet" type="text/css" href="css/edit.css">

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

	$step = "<input type=\"submit\" name=\"submit\" value=\"削除\">";	
}else{
	$step = "<a href=\"#\" onClick=\"history.back(); return false;\">前に戻る</a>\n";
}

mysql_free_result($result);

?>

削除
<form action="delete2.php" method="post">
<input type="hidden" name="id" value="<?=$id?>">
<table>
<tr><td>id</td><td><?=$id?></td></tr>
<tr><td>目</td><td><?=$moku?></td></tr>
<tr><td>科</td><td><?=$family?></td></tr>
<tr><td>和名</td><td><?=$name?></td></tr>
<tr><td>最小</td><td><?=$min?></td></tr>
<tr><td>最大</td><td><?=$max?></td></tr>
<tr><td>開始</td><td><?=$start?></td></tr>
<tr><td>終了</td><td><?=$finish?></td></tr>
<tr><td>色彩1</td><td><?=$color?></td></tr>
<tr><td>色彩2</td><td><?=$color2?></td></tr>
<tr><td>生息地(低)</td><td><?=$low?></td></tr>
<tr><td>生息地(高)</td><td><?=$high?></td></tr>
</table>
を削除しますか？
<?=$step?>
</form>