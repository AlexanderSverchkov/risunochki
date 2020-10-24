<?php require_once('config.php');?>
<?php require_once('functions.php');?>
<?
$category_id = (int)$_GET['category_id'];
//получаем название категории
$res_cat = mysql_query("SELECT name FROM category WHERE category_id=$category_id ")or die(mysql_error());
$row_category=mysql_fetch_assoc($res_cat);
//выбираем статьи катгории
$all_articles = mysql_query("SELECT * FROM articles WHERE category=$category_id AND visible='1'")or die(mysql_error());

?>
<!DOCTYPE html>
<head>
<title><?= $row_category['name'];?></title>
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
<link href="<?=$site_url;?>style.css" type="text/css" rel="stylesheet"/>

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
		<div class="head-logo"><a href="/"><img src="<?=$site_url;?>logo2.jpg" alt="логотип"/></a></div>
		<div class="head-name"><img src="<?=$site_url;?>title.jpg" alt="О сайте"/></div>
	</div>
</div>

<?php require_once('menu.php');?>

<div class="content-wrapper">
	<div class="content-main">
	<div class="content">
		
    <?
		
		
		if(mysql_num_rows($all_articles)>0){
			while($row_articles = mysql_fetch_assoc($all_articles)){
			print "<div class='articles'><h8><a href='".$site_url."view_article.php?id={$row_articles['article_id']}'>".htmlspecialchars($row_articles['title'])."</a></h8><br/>";
			if($row_articles['avatar'])
			print "<img src={$row_articles['avatar']} class='mini'>";
			print $row_articles['short_text']."<br/>";
			print "<P><b>".$row_articles['date'].' | Просмотров: '. $row_articles['views']."</b></P></div>" ;
			}
		}else{
		print '<div class="articles"> в этом разделе нет</div>';
		}
		
		?>



		
		
		
			  
	</div>
<?php require_once('sidebar.php');?>
	</div>
<?php require_once('footer.php');?>
</div>
</body>
</html>