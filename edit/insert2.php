<style type="text/css">
body{
font-family:���C���I;
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

//DB�ڑ�
$link = mysql_connect("localhost","root","kerorok66");
if(!$link){
	die('�ڑ����s�ł�.'.mysql_error());
}
print ('�ڑ��ɐ������܂���');

$db_selected = mysql_select_db('bugdb', $link);
if(!$db_selected){
	die('�f�[�^�x�[�X�̑I���Ɏ��s���܂����B'.mysql_error());
}
print('���f�[�^�x�[�X��I�����܂����B');

mysql_set_charset('sjis');

$id = $_POST['id'];
$moku = $_POST['moku'];
$family=$_POST["family"];
$name=$_POST["name"];
$min=$_POST["min"];
$max=$_POST["max"];
$start=$_POST["start"];
$finish=$_POST["finish"];
$color = $_POST["color"];
$color2 = $_POST["color2"];
$low = $_POST["low"];
$high = $_POST["high"];
/*
(".$id.",'".$moku."')
*/
$a="id";
$b="$id ";

if(!empty($moku)){
	$a .=", moku";
	$b .=",'$moku' ";
}
if(!empty($family)){
	$a .=", family";
	$b .=",'$family' ";
}
if(!empty($name)){
	$a .=", name";
	$b .=",'$name' ";
}
if(!empty($min)){
	$a .=", min";
	$b .=",$min ";
}
if(!empty($max)){
	$a .=", max";
	$b .=",$max ";
}
if(!empty($start)){
	$a .=", start";
	$b .=",$start ";
}
if(!empty($finish)){
	$a .=", finish";
	$b .=",$finish ";
}
if(!empty($color)){
	$a .=", color";
	$b .=",'$color' ";
}
if(!empty($color2)){
	$a .=", color2";
	$b .=",'$color2' ";
}
if(!empty($low)){
	$a .=", low";
	$b .=",$low ";
}
if(!empty($high)){
	$a .=", high";
	$b .=",$high ";
}
print($a);
print($b);

$sql ="INSERT INTO bug ($a) VALUES($b)";

print($sql);
$result = mysql_query($sql);

?>
�ǉ�<br>
<table>
<tr><td>id</td><td><?=$id?></td></tr>
<tr><td>��</td><td><?=$moku?></td></tr>
<tr><td>��</td><td><?=$family?></td></tr>
<tr><td>�a��</td><td><?=$name?></td></tr>
<tr><td>�ŏ�</td><td><?=$min?></td></tr>
<tr><td>�ő�</td><td><?=$max?></td></tr>
<tr><td>�J�n</td><td><?=$start?></td></tr>
<tr><td>�I��</td><td><?=$finish?></td></tr>
<tr><td>�F��1</td><td><?=$color?></td><td></tr>
<tr><td>�F��2</td><td><?=$color2?></td><td></tr>
<tr><td>�����n(��)</td><td><?=$low?></td><td></tr>
<tr><td>�����n(��)</td><td><?=$high?></td><td></tr>
</table>
��ǉ����܂����I
<a href="..\edit.php">�S���\��</a>