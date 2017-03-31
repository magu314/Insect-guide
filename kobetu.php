
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

form{margin:0;float:left;}

#fig{
	margin: 20px;
	float:left;
	padding:0px 0px 5px 0px;
}

table.hyou,table.hyou2{
 width:200px;
 border:solid 2px #258;
 border-radius: 10px;
 margin: 15px 0px 0px 10px;
 float:left;
 }

table.hyou th{
	color:#fff;
	background:#258;
	border-radius:5px;
	width:50px;
}

table.hyou td {
 border:solid 2px #258;
 background-color:#f1f6fc;
 border-radius: 5px;
 font-size:100%;
 text-align: center;
 } 

 table.hyou2 td {
 background-color:#f1f6fc;
 border-radius:5px;
 font-size:100%;
 text-align: center;
 } 

bunki ul{
	list-style:none;
	display:inline-table;
}
.tag li{
	list-style:none;
	float:left;
	padding: 2px 5px;
	margin:0 2px;
	background:#3c7170;
	color:#fff;
	cursor:pointer;
	border-radius:10px;
}
a{text-decoration: none; color:#fff;}

#cook{ margin:0;}

.ul #change li{
	background-color: #222222;
  	display: inline-block;
  	width: 25%;
}

.btn{
background:#3c7170;
color:#fff;
cursor:pointer;
border-radius:10px;
height:20px;
}
.btn2{
background:#258;
color:#fff;
cursor:pointer;
border-radius:0 20px 20px 0;
height:40px;
}
.btn3{
background:#87ceeb;
color:#fff;
cursor:pointer;
margin:0 5px;
}

input[type=text]{
   border-radius: 5px;
   border:#a9a9a9 1px solid;
   box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2),0 0 2px rgba(0,0,0,0.3);
}
 
input[type=text]:focus {
   border:solid 1px #fff;
}
.left{float:left}
.modal{display:none;}
.modalBody{position: fixed; z-index:1000; background: #fff; width:400px; left:50%; top:50%; height: 300px; border-radius: 30px;}
.modalBody p{padding:0 0 0 30px;font-size:20px;}
.modalBK{margin:-200px 0 0 0px;position: fixed; z-index:999; height:700px; width:100%;background:#000; opacity: 0.5;}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script type="text/javascript">
<!--
$(function(){
	$('.btns').click(function(){
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

//スライドイン
function slide(n){
  if (n == 0){
    document.getElementById("tagEdit").style.display="none";
    document.getElementById("exEdit").style.display="none";
  }else{
    document.getElementById("tagEdit").style.display="block";
    document.getElementById("exEdit").style.display="block";
  }
}

$(document).ready(function(){
    $.cookie.json = true;
    var cookParam = $.cookie("push");
    if(cookParam == null){
        var cookParam =[]
    }
        $("#cook").click(function(){
    		var flag    = $('#input1').val(),
        	flagReg = new RegExp(flag);
        if(cookParam == null){
            cookParam = $.cookie("push");
        }
        if(cookParam.length > 20){
            cookParam.splice( 0, 1);
        }
        if(cookParam.indexOf(flag)!= -1){
            alert('既に登録されています')
        }else{
            cookParam.push($("#input").val());
            
            $.cookie('push', cookParam);
            $('body').append('<p>cookieに追記しました。</p>')
        }
    });
});
-->
</script>

<?php

try{
$pdo=new PDO('mysql:host=localhost;dbname=bugdb;charset=sjis','root','kerorok66');
$pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$pdo ->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

$id = $_GET['id'];

$query="SELECT * FROM bug WHERE id=".$id;
$data = $pdo ->prepare($query);
$data -> execute();

while($row = $data->fetch(PDO::FETCH_ASSOC)){
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
}

$query2="SELECT * FROM tag WHERE no=".$id;
$data = $pdo ->prepare($query2);
$data -> execute();

while($row = $data->fetch(PDO::FETCH_ASSOC)){
	$no = $row['no'];
	$tag1 = $row["tag1"];
	$tag2 = $row["tag2"];
	$tag3 = $row["tag3"];
	$tag4 = $row["tag4"];
	$tag5 = $row["tag5"];
	$tag6 = $row["tag6"];
	$tag7 = $row["tag7"];
	$tag8 = $row["tag8"];
	$tag9 = $row["tag9"];
	$tag10 = $row["tag10"];
	$ex = $row["ex"];
}


}catch(PDOEXCEPTION $Exception){
	die('接続エラー<br>'.$Exception -> getMessage());
}
	$pdo = null;
;
?>

<div id="nakami">
		<div id="bunki">
			
			<form action="search2.php" method="post">
 			<input type="hidden" name="moku" value="<?=$moku?>">
 			<input type="hidden" name="family" value="">
 			<input type="hidden" name="name" value="">
 			<input type="hidden" name="min" value="">
 			<input type="hidden" name="max" value="">
 			<input type="hidden" name="start" value="">
 			<input type="hidden" name="finish" value="">
 			<input type="hidden" name="color" value="">
 			<input type="hidden" name="habitat" value="">
 			<input type="hidden" name="sort" value="id">
		 	<input type="submit" class="btn2" value="<?=$moku?>">
		 	</form>
		 	
		 	<form action="search2.php" method="post">
		 	<input type="hidden" name="family" value="<?=$family?>">
		 	<input type="hidden" name="moku" value="">
 			<input type="hidden" name="name" value="">
 			<input type="hidden" name="min" value="">
 			<input type="hidden" name="max" value="">
 			<input type="hidden" name="start" value="">
 			<input type="hidden" name="finish" value="">
 			<input type="hidden" name="color" value="">
 			<input type="hidden" name="habitat" value="">
 			<input type="hidden" name="sort" value="id">
		 	<input type="submit" class="btn2" value="<?=$family?>">
		 	</form>
		 	<br><br>

		 	<input type="hidden" id="input" name="id" value="<?=$id?>">
		 	<input id="cook" class="btn" type="submit" name="submit" value="リスト登録">
		 	
		 	<input type="button" class="btn" value="open" onclick="slide(1)">
		 	
		 	<form action="search.php" method="post">
		 	<input type="hidden" name="tag" value="<?=$tag1?>">
		 	<input type="submit" class="btn3" value="<?=$tag1?>">
		 	</form>
		 	<form action="search.php" method="post">
		 	<input type="hidden" name="tag" value="<?=$tag2?>">
		 	<input type="submit" class="btn3" value="<?=$tag2?>">
		 	</form>
		 	<form action="search.php" method="post">
		 	<input type="hidden" name="tag" value="<?=$tag3?>">
		 	<input type="submit" class="btn3" value="<?=$tag3?>">
		 	</form>
		 	<form action="search.php" method="post">
		 	<input type="hidden" name="tag" value="<?=$tag4?>">
		 	<input type="submit" class="btn3" value="<?=$tag4?>">
		 	</form>
		 	<form action="search.php" method="post">
		 	<input type="hidden" name="tag" value="<?=$tag5?>">
		 	<input type="submit" class="btn3" value="<?=$tag5?>">
		 	</form>
		 	<form action="search.php" method="post">
		 	<input type="hidden" name="tag" value="<?=$tag6?>">
		 	<input type="submit" class="btn3" value="<?=$tag6?>">
		 	</form>
		 	<form action="search.php" method="post">
		 	<input type="hidden" name="tag" value="<?=$tag7?>">
		 	<input type="submit" class="btn3" value="<?=$tag7?>">
		 	</form>
		 	<form action="search.php" method="post">
		 	<input type="hidden" name="tag" value="<?=$tag8?>">
		 	<input type="submit" class="btn3" value="<?=$tag8?>">
		 	</form>
		 	<form action="search.php" method="post">
		 	<input type="hidden" name="tag" value="<?=$tag9?>">
		 	<input type="submit" class="btn3" value="<?=$tag9?>">
		 	</form>
		 	<form action="search.php" method="post">
		 	<input type="hidden" name="tag" value="<?=$tag10?>">
		 	<input type="submit" class="btn3" value="<?=$tag10?>">
		 	</form>
 		</div>
 		<div id="tagEdit" style="display: none;">
 		<form action="tagEdit.php" target="_blank" method="post">
 		<input type="hidden" id="input" name="id" value="<?=$id?>" size="10">
 		<input name="tag1" type="text" value="<?=$tag1?>" size="12">
 		<input name="tag2" type="text" value="<?=$tag2?>" size="12">
 		<input name="tag3" type="text" value="<?=$tag3?>" size="12">
 		<input name="tag4" type="text" value="<?=$tag4?>" size="12">
 		<input name="tag5" type="text" value="<?=$tag5?>" size="12">
 		<input name="tag6" type="text" value="<?=$tag6?>" size="12">
 		<input name="tag7" type="text" value="<?=$tag7?>" size="12">
 		<input name="tag8" type="text" value="<?=$tag8?>" size="12">
 		<input name="tag9" type="text" value="<?=$tag9?>" size="12">
 		<input name="tag10" type="text" value="<?=$tag10?>" size="12">
 		<center><input type="submit" class="btn" value="OK"><input type="button" class="btn" value="close" onclick="slide(0)"></center>
 		</form>
 		</div>
		
		<div id="fig">
			<img src="img/zukan/<?=$id?>.png" width="400">
		</div>
		<div class="left">
		<table class="hyou">
		
 		<tr><th>和名</th><td colspan="2" style="font-size:120%; width:150px"><?=$name?></td></tr>
 		<tr><th>サイズ</th><td><?=$min?>～<?=$max?></td><td>mm</td></tr>
 		<tr><th>時期</th><td><?=$start?>～<?=$finish?></td><td>月</td></tr>
 		<tr><th>色彩</th><td colspan="2"><?=$color?>/<?=$color2?></td></tr>
 		<tr><th>生息地</th><td colspan="2"><?=$low?>～<?=$high?></td></tr>
 		</table>
 		<div class="fc"></div>
 		<table class="hyou2">
 		<tr><td style="width:420px;">
 		<?=$ex?>
 		</td></tr>
 		</table>
 		<div id="exEdit" style="display: none;">
 		<form action="tagEdit.php" target="_blank" method="post" style="margin: 10px 0 0 10px;">
 		<input type="hidden" id="input" name="id" value="<?=$id?>" size="10">
 		<textarea name="ex" rows="4" cols="25"></textarea><br>
		<center><input type="submit" class="btn" value="OK">
		<input type="button" class="btn" value="close" onclick="slide(0)"></center>
		</form>
		</div>
		</div>
</div>