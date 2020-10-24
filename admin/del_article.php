<?php require_once('config.php');?>
<?php require_once('auth.php');
if($_GET['article_id']){
$article_id=(int)$_GET['article_id'];
$result=mysql_query("DELETE FROM articles WHERE article_id=$article_id") or die(mysql_error());
if (mysql_affected_rows()>0){
$_SESSION['res'] = "Статья удалена";
header ("Location:del_article.php");
exit;
}else{
$_SESSION['res'] = "Ошибка";
header ("Location:{$_SERVER['PHP_SELF']}");
exit;
}
}

?>


<!DOCTYPE html>
<head>
<title>Черновики</title>
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

<P>Кликните по статье, которую хотите удалить</P>
<? echo "<h1>{$_SESSION['res']} </h1>";
unset($_SESSION['res']);
$res=mysql_query("SELECT article_id,title FROM articles  ORDER BY title") or die(mysql_error());
if(mysql_num_rows($res)>0){
	while($row=mysql_fetch_assoc($res)){
	echo "<p><a href='?article_id={$row['article_id']}' onclick=\"return confirm('Удалить статью?')\">{$row['title']}</a></P>\r\n";
	}
}else{
	print "Статей нет!";
	}
?>



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