<?
if($_POST['submit']){
$t=$_FILES['new_image']['tmp_name'];
$d=opendir("../avatar");
while(false !=($file=readdir($d))){
if (($file==".") || ($file=="..")){
continue;
}else{
list($start,$end)=explode(".",$file);
	$arr[]=$start;
	
}}
$new=max($arr)+1;
list($s,$e)=explode(".",$_FILES['new_image']['name']);
$new_file=$new.".".$e;

move_uploaded_file($t,"../avatar/".$new_file);
}
?>

<form method="post" enctype="multipart/form-data">
<table>
		<tr>
		<td>Аватар</td>
		<td><input type="file" name="new_image" maxlength="255" size="50"/></td>
		</tr>
		<tr>
		<td>Аватар</td>
		<td><input type="submit" name="submit" maxlength="255" size="50"/></td>
		</tr>
</table>