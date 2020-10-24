<?php require_once('config.php');?>
<?php require_once('auth.php');


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

<P>Выберите статью для редактиования</P>
<? echo "<h1>{$_SESSION['res']} </h1>";
unset($_SESSION['res']);
$res=mysql_query("SELECT article_id,title FROM articles ORDER BY article_id DESC") or die(mysql_error());
while($row=mysql_fetch_assoc($res)){
echo "<p><a href='edit_article2.php?article_id={$row['article_id']}'>{$row['title']}</a></P>";
}
?>



		</div>
			  
	</div>
<?php require_once('sidebar.php');?>
	</div>
<?php require_once('footer.php');?>
</div>
</body>
</html>