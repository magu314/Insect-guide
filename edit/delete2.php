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

$sql="DELETE FROM bug WHERE id=".$id;
print($sql);
$result = mysql_query($sql);

?>

�폜<br>
id:<?=$id?>���폜���܂����I
<a href="..\edit.php">�S���\��</a>