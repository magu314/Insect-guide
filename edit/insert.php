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
	$mes = "id���w�肵�Ă��������B";
}
?>
�ǉ�
<form action="insert2.php" method="post">
<table>
<tr><td>id</td><td><?=$id?><input type="hidden" name="id" value="<?=$id?>"></td></tr>
<tr><td>��</td><td><?=$moku?><input type="hidden" name="moku" value="<?=$moku?>"></td></tr>
<tr><td>��</td><td><?=$family?><input type="hidden" name="family" value="<?=$family?>"></td></tr>
<tr><td>�a��</td><td><?=$name?><input type="hidden" name="name" value="<?=$name?>"></td></tr>
<tr><td>�ŏ�</td><td><?=$min?><input type="hidden" name="min" value="<?=$min?>"></td></tr>
<tr><td>�ő�</td><td><?=$max?><input type="hidden" name="max" value="<?=$max?>"></td></tr>
<tr><td>�J�n</td><td><?=$start?><input type="hidden" name="start" value="<?=$start?>"></td></tr>
<tr><td>�I��</td><td><?=$finish?><input type="hidden" name="finish" value="<?=$finish?>"></td></tr>
<tr><td>�F��1</td><td><?=$color?><input type="hidden" name="color" value="<?=$color?>"></td></tr>
<tr><td>�F��2</td><td><?=$color2?><input type="hidden" name="color2" value="<?=$color2?>"></td></tr>
<tr><td>�����n(��)</td><td><?=$low?><input type="hidden" name="low" value="<?=$low?>"></td></tr>
<tr><td>�����n(��)</td><td><?=$high?><input type="hidden" name="high" value="<?=$high?>"></td></tr>
</table>
<input class="btn"type="submit" name="submit" value="�ǉ�">
<a href="#" onClick="history.back(); return false;">�O�ɖ߂�</a>
</form>