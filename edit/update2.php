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
$family=$_POST["family"];
$name=$_POST["name"];
$min=$_POST["min"];
$max=$_POST["max"];
$start=$_POST["start"];
$finish=$_POST["finish"];
$color=$_POST["color"];
$color2=$_POST["color2"];
$low=$_POST["low"];
$high=$_POST["high"];

print($id);
$sql="UPDATE bug SET moku='".$moku."', family='".$family."', name='".$name."', min='".$min."'
, max='".$max."', start='".$start."', finish='".$finish."', color='".$color."', color2='".$color2."'
, low='".$low."', high='".$high."' WHERE id=".$id;
print($sql);
$result = mysql_query($sql);

?>

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
に変更しました！
<a href="..\edit.php">全権表示</a>