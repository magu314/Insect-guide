<script type="text/javascript" src="jquery/jquery-1.12.3.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<style type="text/css">
body{
font-family:メイリオ;
}
::-webkit-scrollbar {
    width: 7px;
    height: 7px;
}

::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    border-radius: 5px;
}

::-webkit-scrollbar-thumb {
    border-radius: 5px;
    background:#55a788;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.7);
}

.open{
	width:50px;
	background:#4682b4;
	cursor:pointer;
	text-align: center;
	color:#fff;
	border-radius: 10px;
}
input[type=text]{
   border-radius: 5px;
   border:#a9a9a9 1px solid;
   box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2),0 0 2px rgba(0,0,0,0.3);
}
.btn{
background:#368;
color:#fff;
cursor:pointer;
border-radius:10px;
}
.modal{display:none;}
.modal 1{ margin:-100px; }
.modalBody{ position: fixed; z-index:1000; background: #fff; width:250px;
 left:400px; top:400px; height: 300px; border-radius: 10px;border:ridge 2px #fff;}
.modalHead{background:#368; border-radius: 10px 10px 0 0; color:#fff;}
.modalbd{padding:0 0 0 30px;}
.modalBK{position: fixed; z-index:999; height:100%; width:100%;background:#000; opacity: 0.5;
top:0; left:0;}

table.db_sub{
 border:solid 2px #258;
 border-radius: 10px;
 float: right;
 margin: 10px 20px 0px 0px;
}
table.db_sub td{
 background-color:#87ceeb;
 border-radius: 5px;
 font-size:100%;
 text-align: center;
}

table, th, td {
    border:none;
}
</style>
<script type="text/javascript">

$(function(){
	$('.open').click(function(){
		wn = '.' + $(this).data('tgt');
		var mW = $(wn).find('.modalBody').innerWidth() / 2;
		var mH = $(wn).find('.modalBody').innerHeight() / 2;
		$(wn).find('.modalBody').css({'margin-left':-mW,'margin-top':-mH});
		$(wn).fadeIn(500);
	});
	$('.close,.modalBK').click(function(){
		$(wn).fadeOut(500);
	});
});
</script>
<?php
try{
$pdo=new PDO('mysql:host=localhost;dbname=bugdb;charset=sjis','root','kerorok66');
$pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$pdo ->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);


$query="SELECT * FROM bug ";

$data = $pdo ->prepare($query);
$data -> execute();

$logcount = $data->rowCount();

if($logcount == 0)
	$message = "該当するデータはありませんでした";
else 
	$message = $logcount . "件ヒットしました";

$count = 0;

print('<div class="kotei">');
print('<p data-tgt="1" class="open">追加</p>');
print('<div class="modal 1">');
print('<div class="modalBody">');
print('<form action="edit/insert.php" method="post">');
print('<div class="modalHead"><center>登録フォーム</center></div><div class="modalbd"><br>');
print('　ID<input type="text" name="id" style="width:30px;"><br>');
print('　目<input type="text" name="moku" style="width:100px;"><br>');
print('　科<input type="text" name="family" style="width:150px;"><br>');
print('和名<input type="text" name="name" style="width:150px;"><br>');
print('大きさ<input type="text" name="min" style="width:30px;">mm～');
print('<input type="text" name="max" style="width:40px;">mm<br>');
print('時期<input type="text" name="start" style="width:30px;">月～');
print('<input type="text" name="finish" style="width:40px;">月<br>');
print('色彩<input type="text" name="color" style="width:50px;">');
print('/<input type="text" name="color2" style="width:50px;"><br>');
print('生息地(低)<input type="text" name="low" style="width:50px;">');
print('(高)<input type="text" name="high" style="width:50px;"><br><br>');
print('<center><input class="btn" type="submit" value="追加"></center></form>');
print('</div></div>');
print('<div class="modalBK"></div>');
print('</div>');


print('<table border=none class="db"><tr>');

while($row = $data->fetch(PDO::FETCH_ASSOC)){
	print('<td>');
    print('<div class="data'.$count.'">');
    print('<table border=none class="db_sub">');
    print('<tr><td>ID</td><td><a href="kobetu.php?id='.$row['id'].'" target="nakami">'.$row['id'].'</td></tr>');
    print('<tr><td>目</td><td>'.$row['moku'].'</td></tr>');
    print('<tr><td>科</td><td>'.$row['family'].'</td></tr>');
    print('<tr><td>和名</td><td>'.$row['name'].'</td></tr>');
    print('<tr><td>サイズ</td><td>'.$row['min'].'～'.$row['max'].'</td></tr>');
    print('<tr><td>時期</td><td>'.$row['start'].'～'.$row['finish'].'</td></tr>');
    print('<tr><td>色彩</td><td>'.$row['color'].'/'.$row['color2'].'</td></tr>');
    print('<tr><td>生息地</td><td>'.$row['low'].'～'.$row['high'].'</td></tr>');
    print('<tr><td></td><td><a href="edit/update.php?id='.$row["id"].'">更新</a>　
    <a href="edit/delete.php?id='.$row["id"].'">削除</a></td></tr>');
    print('</table>');
    print('</div></td>');
    $count++;
    if($count%4==0){
    print('</tr>');
    }
}
print('</table>');
print('</div>');

}catch(PDOEXCEPTION $Exception){
	die('接続エラー<br>'.$Exception -> getMessage());
}
	$pdo = null;
?>