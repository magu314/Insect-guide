<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=shift_jis">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" >
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<style type="text/css">
body{
font-family:メイリオ;
}
::-webkit-scrollbar {
    width: 7px;
    height:7px;
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
table.db{
	text-align:center;
	vertical-align:middle;
}

table.db_sub{
 border:solid 2px #258;
 border-radius: 10px;
 float: left;
 margin: 10px 20px 0px 0px;
}
table.db_sub td{
 background-color:#bbddd0;
 border-radius: 5px;
 font-size:100%;
 text-align: center;
}
.btn, .motto, .rl{
background:#3c7170;
color:#fff;
cursor:pointer;
border-radius:5px;
text-decoration:none;
padding:2px 8px;
}
</style>
<script type="text/javascript" src="js/windowsize.js"></script>
<script type="text/javascript">
function loadmore(n){
	document.getElementById("db"+n).style.display="block";
	document.getElementById("more"+n).style.display="none";
	return 0;
	$(function(){
		$("html,body").animate({scrollTop:2000*n.offset().top});
		
	});
}

</script>

</head>

<body>
<?php
try{
$pdo=new PDO('mysql:host=localhost;dbname=bugdb;charset=sjis','root','kerorok66');
$pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$pdo ->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

$tag1 = "";
$ao = "or";

$tag = $_POST["tag"];
print($tag);

$query="SELECT * FROM bug WHERE id in (SELECT no FROM tag where concat(tag1, tag2, tag3, tag4, tag5, tag6, tag7, tag8, tag9, tag10) like '%$tag%')";

print($query);

$data = $pdo ->prepare($query);
$data -> execute();

$logcount = $data->rowCount();
print('ヒット数:');
print($logcount);


print('<div id="db">');
	
print('<table class="db"><tr>');
$count=0;
$table=0;


while($row = $data->fetch(PDO::FETCH_ASSOC)){



	print('<td>');
    print('<div class="data'.$count.'">');
    print('<table border=none class="db_sub">');
    print('<tr><td>ID</td><td><a href="kobetu.php?id='.$row["id"].'" target="nakami">'.$row['id'].'</td></tr>');
    //print('<tr><td colspan="2"><img src="img/zukan/'.$row["id"].'.png" width="150px"></tr>');
    print('<tr><td>目</td><td>'.$row['moku'].'</td></tr>');
    print('<tr><td>科</td><td>'.$row['family'].'</td></tr>');
    print('<tr><td>和名</td><td>'.$row['name'].'</td></tr>');
    print('<tr><td>サイズ</td><td>'.$row['min'].'～'.$row['max'].'</td></tr>');
    print('<tr><td>時期</td><td>'.$row['start'].'～'.$row['finish'].'</td></tr>');
    print('<tr><td>色彩</td><td>'.$row['color'].'/'.$row['color2'].'</td></tr>');
    print('<tr><td>生息地</td><td>'.$row['low'].'～'.$row['high'].'</td></tr>');
    print('<tr><td></td><td><a class="rl" href="kobetu.php?id='.$row["id"].'" target="left">←</a>　
    <a class="rl"href="kobetu.php?id='.$row["id"].'" target="right">→</a></td></tr>');
    print('</table>');
    print('</div></td>');
    $count++;
    if($count%4==0){
    	print('<tr>');
    	if($count%5==0){
    		$table++;
    		print('</table><div id="more'.$table.'"><br><a class="motto" href="#" onclick="loadmore('.$table.')">もっと！</a></div></div>');
    		print('<div id="db'.$table.'" style="display:none;"><table class="db'.$table.'">');
    	}
    }
}
print('</table>');
print('</div>');

}catch(PDOEXCEPTION $Exception){
	die('接続エラー<br>'.$Exception -> getMessage());
}
	$pdo = null;

?>
</body>
</html>