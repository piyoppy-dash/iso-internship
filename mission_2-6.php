<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UFT-8">
<title>ダイエット奮闘記</title>
</head>

</html>


<?php

$data=file("kadai22.txt");
$number=count($data)+1;

$password=$_POST['password'];


$comment=$_POST['comment'];
$message=$_POST['message'];

$date=date('m月d日H時i分');

$fp=fopen('kadai22.txt','a');
if(!empty($comment)&&$_POST['edit_sign']!=("編集します")){
fwrite($fp,$number."<>".$comment."<>".$message."<>".$date."<>".$password."<>".PHP_EOL);
}
fclose($fp);

$delete=$_POST['delete'];
if(!empty($delete)){
	$filedata=file("kadai22.txt");
	$fp=fopen('kadai22.txt','w+');
	foreach($filedata as $line){
		$value=explode("<>",$line);
		if($delete!=$value[0]){
	fputs($fp,$line);	
	}
else if($delete==$value[0]){
	if($value[4]==$password){
}
else{echo "パスワードが一致しません";
}
}
}
	fclose($fp);
}

$edit=$_POST['edit'];
if(!empty($edit)){
	$filedata=file("kadai22.txt");
	foreach($filedata as $line){
		$value=explode("<>",$line);
		if($edit==$value[0]){
if($value[4]==$password){
		$edit_number=$value[0];
		$user=$value[1];
		$text=$value[2];
		$edit_sign="編集します";
}
else{echo "パスワードが一致しません";
}
}
}
}
if($_POST['edit_sign']==("編集します")){
	$filedata=file("kadai22.txt");
	$fp=fopen('kadai22.txt','w+');
	foreach($filedata as $line){
		$value=explode("<>",$line);
		if($_POST['edit_number']==$value[0]){
fwrite($fp,$value[0]."<>".$comment."<>".$message."<>".$value[3]."<>".PHP_EOL);
}
else{
fputs($fp,$line);
}
}
fclose($fp);
}
?>

<body>
<h1>ダイエット奮闘記</h1>
<p>必要事項を入力して送信ボタンをクリックしてください</p>

<form method="post" action="mission_2-6.php">
<p>名前:<input type="text" name="comment" value="<?php echo $user;?>" size="30"></p>
<p>コメント:<textarea rows="5" cols="40" textarea name="message"><?php echo $text;?></textarea></p>
<input name="edit_number" type="hidden" value="<?php echo $edit_number;?>"/></br>
<input name="edit_sign" type="hidden" value="<?php echo $edit_sign;?>"/></br>
<p>パスワード：<input type="text" name="password"></p>
<p><input type="submit"value="送信"></p>
</form>

<form method="post" action="mission_2-6.php">
<p>削除対象番号:<input type="text" name="delete" size="5"></p>
<p>パスワード：<input type="text" name="password"></p>
<p><input type="submit"value="削除"></p>
</form>

<form method="post" action="mission_2-6.php">
<p>編集対象番号:<input type="text" name="edit" size="5"></p>
<p>パスワード：<input type="text" name="password"></p>
<p><input type="submit"value="編集"></p>
</form>

</body>

<?php
$filedata=file("kadai22.txt");
foreach($filedata as $line){
$value=explode("<>",$line);
echo'番号:'.$value[0]."<br/>";
echo $value[2]."<br/>";
echo'By:'.$value[1]."<br/>";
echo'投稿日時:'.$value[3]."<br/>";
echo"<hr/>";
}
?>