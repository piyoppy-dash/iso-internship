<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UFT-8">
<title>�_�C�G�b�g�����L</title>
</head>

</html>


<?php

$data=file("kadai22.txt");
$number=count($data)+1;

$password=$_POST['password'];


$comment=$_POST['comment'];
$message=$_POST['message'];

$date=date('m��d��H��i��');

$fp=fopen('kadai22.txt','a');
if(!empty($comment)&&$_POST['edit_sign']!=("�ҏW���܂�")){
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
else{echo "�p�X���[�h����v���܂���";
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
		$edit_sign="�ҏW���܂�";
}
else{echo "�p�X���[�h����v���܂���";
}
}
}
}
if($_POST['edit_sign']==("�ҏW���܂�")){
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
<h1>�_�C�G�b�g�����L</h1>
<p>�K�v��������͂��đ��M�{�^�����N���b�N���Ă�������</p>

<form method="post" action="mission_2-6.php">
<p>���O:<input type="text" name="comment" value="<?php echo $user;?>" size="30"></p>
<p>�R�����g:<textarea rows="5" cols="40" textarea name="message"><?php echo $text;?></textarea></p>
<input name="edit_number" type="hidden" value="<?php echo $edit_number;?>"/></br>
<input name="edit_sign" type="hidden" value="<?php echo $edit_sign;?>"/></br>
<p>�p�X���[�h�F<input type="text" name="password"></p>
<p><input type="submit"value="���M"></p>
</form>

<form method="post" action="mission_2-6.php">
<p>�폜�Ώ۔ԍ�:<input type="text" name="delete" size="5"></p>
<p>�p�X���[�h�F<input type="text" name="password"></p>
<p><input type="submit"value="�폜"></p>
</form>

<form method="post" action="mission_2-6.php">
<p>�ҏW�Ώ۔ԍ�:<input type="text" name="edit" size="5"></p>
<p>�p�X���[�h�F<input type="text" name="password"></p>
<p><input type="submit"value="�ҏW"></p>
</form>

</body>

<?php
$filedata=file("kadai22.txt");
foreach($filedata as $line){
$value=explode("<>",$line);
echo'�ԍ�:'.$value[0]."<br/>";
echo $value[2]."<br/>";
echo'By:'.$value[1]."<br/>";
echo'���e����:'.$value[3]."<br/>";
echo"<hr/>";
}
?>