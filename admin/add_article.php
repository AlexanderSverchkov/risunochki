<?php require_once('config.php');?>
<?php require_once('auth.php');
if($_POST['submit']){
if ($_FILES['new_image']['tmp_name']){
$t=$_FILES['new_image']['tmp_name'];
$d=opendir("../avatar");
while(false !=($file=readdir($d))){
if (($file==".") || ($file=="..")){
continue;
}else{
list($start,$end)=explode(".",$file);
	$arr[]=$start;	
	}
}
$new=max($arr)+1;
list($s,$e)=explode(".",$_FILES['new_image']['name']);
$new_file=$new.".".$e;
move_uploaded_file($t,"../avatar/".$new_file);
$avatar = $site_url."avatar/".$new_file;
}
$title=mysql_real_escape_string($_POST['title']);
$keywords=mysql_real_escape_string($_POST['keywords']);
$description=mysql_real_escape_string($_POST['description']);
$short_text=mysql_real_escape_string($_POST['short_text']);
$content=mysql_real_escape_string($_POST['content']);
$date=date("Y-m-d");
$category=(int)$_POST['category'];
	if ($_POST['visible']=="on"){
	$visible=1;
	}else{
	$visible=0;
	}
$result=mysql_query("INSERT INTO articles SET title='$title',keywords='$keywords',description='$description',short_text='$short_text',avatar='$avatar',content='$content',date='$date',category='$category',visible='$visible'") or die(mysql_error());
	if(mysql_affected_rows()>0){
	$_SESSION['res'] .= '<strong>Статья добавлена</strong><hr>';
	header("Location:add_article.php");
	exit;
	}else{
	$_SESSION['res'] .= '<strong>Ошибка</strong><hr>';
	header("Location:add_article.php");
	exit;
	}
}
?>


<!DOCTYPE html>
<head>
<title>Администраторская часть</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type ="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type ="text/javascript" src="AjexFileManager/ajex.js"></script>
<script>
		$(function() {
			var pull = $('#pull');
				menu = $('.menu ul');
				menuHeight= menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});

			$(window).resize(function(){
        		var w = $(window).width();
        		if(w > 320 && menu.is(':hidden')) {
        			menu.removeAttr('style');
        		}
    		});
		});
	
</script>
<link href="style.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="head-wrapper">
	<div class="head">
		<div class="head-logo"><a href="/"><img src="logo2.jpg" alt="логотип"/></a></div>
		<div class="head-name"><img src="title.jpg" alt="О сайте"/></div>
	</div>
</div>

<?php require_once('menu.php');?>

<div class="content-wrapper">
	<div class="content-main">
	<div class="content">
		<div class="articles">
<? echo "Добро пожаловать, {$_SESSION['admin']} | <a href='?do=logout'>Выход</a></br>";?>

<P>Для добавления статьи заполните необходимые поля</P>
<? echo "<h1>{$_SESSION['res']} </h1>";
unset($_SESSION['res']);
?>

<form method="post" enctype="multipart/form-data">
	<table>
		<tr>
		<td>Название статье</td>
		<td><input type="text" name="title" maxlength="255" size="50"/></td>
		</tr>
		<tr>
		<td>Ключевые слова</td>
		<td><input type="text" name="keywords" maxlength="255" size="50"/></td>
		</tr>
		<tr>
		<td>Описание</td>
		<td><input type="text" name="description" maxlength="255" size="50"/></td>
		</tr>
			<tr>
		<td>Аватар</td>
		<td><input type="file" name="new_image" maxlength="255" size="50"/></td>
		</tr>
		<tr>
		<td>Короткий текст</td>
		<td><textarea id="editor1" name="short_text" cols="50" rows="5" ></textarea>
			<script type="text/javascript">
			
			var ckeditor1= CKEDITOR.replace('editor1');
			AjexFileManager.init({returnTo:'ckeditor', editor:ckeditor1});
			
			</script>
		</td>
		</tr>
		
		<tr>
		<td>Полный текст</td>
		<td><textarea id="editor2" name="content" cols="50" rows="10" ></textarea>
			<script type="text/javascript">
			
			var ckeditor2= CKEDITOR.replace('editor2');
			AjexFileManager.init({returnTo:'ckeditor', editor:ckeditor2});
			
			</script>
		</td>
		</tr>
		<tr>
		<td>Категория</td>
		<td><select name="category">
		<?php 
		$res=mysql_query("SELECT * FROM category");
		while($row=mysql_fetch_assoc($res)){
			echo "<option value='{$row['category_id']}'>{$row['name']}\r\n</option>";
		}
		?>
		</td>
		</tr>
		<tr>
		<td>Показывать статью </td>
		<td><input type="checkbox" name="visible" checked/></td>
		</tr>
		<tr>
		<td colspan="2"><input type="submit" name="submit" value="Внести статью"/></td>
		</tr>
	</table>
</form>


		</div>
			    
	</div>
<?php require_once('sidebar.php');?>
	</div>
<?php require_once('footer.php');?>
</div>
</body>
</html>