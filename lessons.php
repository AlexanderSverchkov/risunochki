<?php require_once('config.php');?>
<?php 

$res_page=mysql_query("SELECT article_id,title,category FROM articles WHERE visible='1' ORDER BY category DESC") or die(mysql_error());
$row_page = mysql_fetch_assoc($res_page);?>
<!DOCTYPE html>
<head>
<title>Все уроки рисования на одной странице</title>
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
<meta name="description" content="Все уроки сайта на одной старнице. Рисование карандашом для начинающих"/>
<meta name="keywords" content="Уроки рисования каранадшом для начинающих"/>
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
		<div class="articles"><?
		if(mysql_num_rows($res_page)>0){
	print "<h2>Все уроки сайта:</h2>";
	print "<ul>";
	
	while($row_page = mysql_fetch_assoc($res_page)){
	print "<li><a href='{$site_url}view_article.php?id={$row_page['article_id']}'>{$row_page['title']}</a></li>\n\r";
	}
	print "</ul>";
	}else{
	'Нет статей';
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