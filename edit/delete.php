<link rel="stylesheet" type="text/css" href="css/edit.css">

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

	$step = "<input type=\"submit\" name=\"submit\" value=\"�폜\">";	
}else{
	$step = "<a href=\"#\" onClick=\"history.back(); return false;\">�O�ɖ߂�</a>\n";
}

mysql_free_result($result);

?>

�폜
<form action="delete2.php" method="post">
<input type="hidden" name="id" value="<?=$id?>">
<table>
<tr><td>id</td><td><?=$id?></td></tr>
<tr><td>��</td><td><?=$moku?></td></tr>
<tr><td>��</td><td><?=$family?></td></tr>
<tr><td>�a��</td><td><?=$name?></td></tr>
<tr><td>�ŏ�</td><td><?=$min?></td></tr>
<tr><td>�ő�</td><td><?=$max?></td></tr>
<tr><td>�J�n</td><td><?=$start?></td></tr>
<tr><td>�I��</td><td><?=$finish?></td></tr>
<tr><td>�F��1</td><td><?=$color?></td></tr>
<tr><td>�F��2</td><td><?=$color2?></td></tr>
<tr><td>�����n(��)</td><td><?=$low?></td></tr>
<tr><td>�����n(��)</td><td><?=$high?></td></tr>
</table>
���폜���܂����H
<?=$step?>
</form>