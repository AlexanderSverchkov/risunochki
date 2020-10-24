<?php require_once('config.php');
session_start();
if($_SESSION['admin']){
header("Location:admin.php");
exit;
}
if($_POST['submit']){
$login = mysql_real_escape_string($_POST['login']);
$res= mysql_query("SELECT pass FROM auth WHERE login='$login'");
$row = mysql_fetch_assoc($res);
if ($row['pass'] === md5($_POST['pass'])){
$_SESSION['admin']=$login;
header("Location:admin.php");
exit;
}else{
$_SESSION['res']='<p>Логин или пароль не верны</p>';
header("Location:index.php");
exit;
	}
}
?>
<!DOCTYPE html>
<head>
<title>Страница авторизации</title>
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
		
		<P>Введите логин и пароль администратора для входа</P>
		<form method="post">
		<table><tr>
			<td>Имя пользователя:</td><td> <input type="text" name="login"/></td>
			</tr><tr>
			<td>Пароль: </td><td><input type="password" name="pass"/><br/></td>
			</tr>
			<tr><td colspan=2>
			<input type="submit" name="submit" value="Войти"/>
			</td></tr>
			</table>
			<?
			echo $_SESSION['res'];
			session_unset();
			session_destroy();
			?>
		</form>
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