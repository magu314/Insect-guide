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
	
	$step = "<input type=\"submit\" name=\"submit\" value=\"�X�V\">";	
}else{
	$step = "<a href=\"#\" onClick=\"history.back(); return false;\">�O�ɖ߂�</a>\n";
}

mysql_free_result($result);
?>
<form action="update2.php" method="post">
�X�V<br>
<table>
<tr><td>id[<?=$id?>]</td><td><input type="hidden" name="id" value="<?=$id?>"></td></tr>
<tr><td>��[<?=$moku?>]</td><td><input type="text" name="moku" value="<?=$moku?>"></td></tr>
<tr><td>��[<?=$family?>]</td><td><input type="text" name="family" value="<?=$family?>"></td></tr>
<tr><td>�a��[<?=$name?>]</td><td><input type="text" name="name" value="<?=$name?>"></td></tr>
<tr><td>�ŏ�[<?=$min?>]</td><td><input type="text" name="min" value="<?=$min?>"></td></tr>
<tr><td>�ő�[<?=$max?>]</td><td><input type="text" name="max" value="<?=$max?>"></td></tr>
<tr><td>�J�n[<?=$start?>]</td><td><input type="text" name="start" value="<?=$start?>"></td></tr>
<tr><td>�I��[<?=$finish?>]</td><td><input type="text" name="finish" value="<?=$finish?>"></td></tr>
<tr><td>�F��1[<?=$color?>]</td><td><input type="text" name="color" value="<?=$color?>"></td></tr>
<tr><td>�F��2[<?=$color2?>]</td><td><input type="text" name="color2" value="<?=$color2?>"></td></tr>
<tr><td>�����n(��)[<?=$low?>]</td><td><input type="text" name="low" value="<?=$low?>"></td></tr>
<tr><td>�����n(��)[<?=$high?>]</td><td><input type="text" name="high" value="<?=$high?>"></td></tr>
</table>
�ɕύX���܂����H
<?=$step?>
</form>