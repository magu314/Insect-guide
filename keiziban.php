<style type="text/css">
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

body {
    font-family: メイリオ;
}
.form{
background:#55a788;
border:#000 1px solid;
border-radius:10px;
float:left;
}
.res{clear:both; padding:10px 0 0 0;}
p{
background:#55a788;
border:#000 1px solid;
border-radius:10px;
margin:-2px 0 0 -2px;
float:left;
}
.oneres{clear:both;}

.come{background:#fff;border-radius:10px;}

.btn{
background:#3c7170;
color:#fff;
cursor:pointer;
border-radius:10px;
}

input[type=text]{
   border-radius: 5px;
   border:#a9a9a9 1px solid;
   box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2),0 0 2px rgba(0,0,0,0.3);
}
 
input[type=text]:focus {
   border:solid 1px #fff;
}


</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">

$(function(){
    var form = document.forms[ document.forms.length - 1 ];
    form.onsubmit = function()
	{
    	document.cookie = this.name.value;
    	
    	this.result.value = document.cookie;
    	return false;
    }
    form.result.value = document.cookie;
    
    form.onbutton = function()
	{
    	document.cookie = 'data=; expires=' + date.toUTCString();
    	
    	this.result.value = document.cookie;
    	return false;
    }
    form.result.value = document.cookie;
})();

</script>

<?php
//var_dump($_POST);
//最初に変数を定義しておかないとエラーになる
$err_msg1 = "";
$err_msg2 = "";
$message ="";
$name = ( isset( $_POST["name"] ) === true ) ?$_POST["name"]: "";
$comment  = ( isset( $_POST["comment"] )  === true ) ?  trim($_POST["comment"])  : "";

//投稿がある場合のみ処理を行う
if (  isset($_POST["send"] ) ===  true ) {
    if ( $name   === "" ) $err_msg1 = "名前を入力してください"; 
    if ( $comment  === "" )  $err_msg2 = "コメントを入力してください";
    if( $err_msg1 === "" && $err_msg2 ==="" ){
        $fp = fopen( "data.txt" ,"a" );
        fwrite( $fp ,  $name."\t".$comment."\n");
        $message ="書き込みに成功しました。";
    }
}
 
$fp = fopen("data.txt","r");
 
$dataArr= array();
while( $res = fgets( $fp)){
    $tmp = explode("\t",$res);
    $arr = array(
        "name"=>$tmp[0],
        "comment"=>$tmp[1]
    );
    $dataArr[]= $arr;
} 
 
 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>掲示板</title>
    </head>
    <body>
    <div class="form">
        <?php echo $message; ?>
        <form method="post">
        名前：<input type="text" name="name" value="<?php echo $name; ?>" >
            <?php echo $err_msg1; ?><input class="btn" type="submit" name="send" value="投稿" ><br>
            コメント：<br><textarea  name="comment" rows="4" cols="40"><?php echo $comment; ?></textarea>
            <?php echo $err_msg2; ?>
        </form>
    </div>
    <div class="res">
         <?php foreach( $dataArr as $data ):?>
         <p><span class="name"><?php echo $data["name"]; ?></span><span class="come">{<?php echo $data["comment"]; ?></span></p><?php endforeach;?>
	</div>
    </body>
</html>