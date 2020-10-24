<?php require_once('config.php');?>
<?php require_once('auth.php');
if($_POST['submit']){
$name=mysql_real_escape_string($_POST['name']);
$category_id=(int)($_POST['hidden']);
$res=mysql_query("UPDATE category SET name='$name' WHERE category_id=$category_id") or die(mysql_error());
if(mysql_affected_rows()>0){
$_SESSION['res'] = "<b>Раздел Изменен</b>";
header("Location: {$_SERVER['PHP_SELF']}");
exit;
}
else{
$_SESSION['res'] = "<b>Ошибка</b>";
header("Location: {$_SERVER['PHP_SELF']}");
exit;
}
}
?>
<!DOCTYPE html>
<head>
<title>Редактирование раздела</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
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
		<? echo "Добро пожаловать, {$_SESSION['admin']} | <a href='?do=logout'>Выход</a>";
		echo "<P>{$_SESSION['res']}</p>";
		unset($_SESSION['res']);
		$result = mysql_query("SELECT * from category") or die(mysql_error());
		while($row= mysql_fetch_assoc($result)){
		print "<P><a href='?category_id={$row['category_id']}'>{$row['name']}</a></P>";
		}
		if($_GET['category_id']){
		$category_id=(int)$_GET['category_id'];
		$result=mysql_query("SELECT * FROM category WHERE category_id=$category_id");
		if(mysql_num_rows($result)==1){
			$row=mysql_fetch_assoc($result);
			echo '<form method="post">
		<table><tr><td>
			Название раздела:
			</td>
			<td>
			<input type="text" name="name" maxlength="255" value="'.htmlspecialchars($row['name']).'">
			</td>
			</tr>
			<tr>
			<td colspan="2">
			<input type="hidden" name="hidden" value="'.$row['category_id'].'">
			<input type="submit" name="submit" value="Изменить">
			</td>
			</tr>
		</table>
		</form>';
			}
		}
		?>
		<!--
		<p>Введите название добавляемого раздела:</P>
		<form method="post">
		<table><tr><td>
			Название раздела:
			</td>
			<td>
			<input type="text" name="name" maxlength="255">
			</td>
			</tr>
			<tr>
			<td colspan="2">
			<input type="submit" name="submit" value="Добавить">
			</td>
			</tr>
		</table>
		</form>
		-->
		</div>
			    <div class="pager">
            	<a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <span>of</span>
                <a href="#">75</a>
                <a href="#" class="prev-next">Next</a>
            </div>
	</div>
<?php require_once('sidebar.php');?>
	</div>
<?php require_once('footer.php');?>
</div>
</body>
</html>