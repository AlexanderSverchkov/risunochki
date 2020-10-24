<?php require_once('config.php');?>
<?$id=(int)$_GET['id'];


$res_article = mysql_query("SELECT title,avatar,keywords,description, date,content,views FROM articles WHERE article_id=$id AND visible='1' LIMIT 1");

$row_article = mysql_fetch_assoc($res_article);
$row_article['title']=htmlspecialchars($row_article['title']);
$row_article['description']=htmlspecialchars($row_article['description']);
$row_article['keywords']=htmlspecialchars($row_article['keywords']);
?>

<!DOCTYPE html>
<head>
<title><?= $row_article['title'];?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta name="description" content="<?=$row_article['description']?>"/>
<meta name="keywords" content="<?=$row_article['keywords']?>"/>
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
<!--LiveInternet counter--><script type="text/javascript"><!--
new Image().src = "//counter.yadro.ru/hit?r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random();//--></script><!--/LiveInternet-->
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
		
<?
if(mysql_num_rows($res_article)>0){
$views=$row_article['views']+1;
$res = mysql_query("UPDATE articles SET views=$views WHERE article_id=$id LIMIT 1") or die(mysql_error());
print "<h2>{$row_article['title']}</h2>";

print $row_article['content'];

echo "<hr>";
echo "<P><b>Дата: {$row_article['date']} | Просмотров: $views</b></P>";
}else{
'Такая статья не существует, извините';
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