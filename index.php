<?php require_once('config.php');?>
<?php 


$all = mysql_query("SELECT c.category_id,c.name,a.title,a.category,a.avatar,a.article_id FROM category c,articles a WHERE a.visible='1' AND c.category_id=a.category ORDER BY c.category_id ") or die(mysql_error());

?>
<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Уроки рисования карандашом для начинающих</title>
<link href="style.css" rel="stylesheet" type="text/css">
<meta name="description" content="На сайте собранные обучающие уроки для любителей рисования карандашом"/>
<meta name="keywords" content="рисования карандашом, рисования для начинающих, как рисовать карандашом, уроки рисования"/>
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
<P>
Добрый день! Вы находитесь на сайте посвященном изучению техники карандашного рисунка! На страницах проекта Вы найдете материалы на совершенно различные тематики:уроки рисования кранадшом человека, животных, 
цветов, деревьев и т.д.,а также буду рад Вашим предложениям!</P>

<P>Прежде всего сайт ориентирован, конечно, на начинающих осваивать карандашный рисунок! Надеюсь, что уроки представленные здесь будут Вам полезны и станут подспорьем в изучении техники рисунка карандашом!</P>

<P>По следующей ссылке находится урок, с которым рекомендую ознакомиться прежде чем приступать к последующим <a href="<?=$site_url;?>view_article.php?id=31">О материалах и технике рисунка карандашом</a></P>

		
		
		
<?
$cat='';
$i=0;
while($all_a=mysql_fetch_assoc($all)){
	  if($all_a['category_id'] == $cat){
		print "<div class='all_posts'><img src='{$all_a['avatar']}' height='150px' alt='{$all_a['title']}'><span><a href='{$site_url}view_article.php?id={$all_a['article_id']}'>{$all_a['title']}</a></span></div>\n\r";
	 }else{
	 
		 if($i==0){
		 print "<div class='all_posts_wrapper'><h2>{$all_a['name']}</h2>\n\r";
		 print "<div class='all_posts'><img src='{$all_a['avatar']}' height='150px' alt='{$all_a['title']}'><span><a href='{$site_url}view_article.php?id={$all_a['article_id']}'>{$all_a['title']}</a></span></div>\n\r";
		 }
		 else{
		 print "</div><div class='all_posts_wrapper'><h2>{$all_a['name']}</h2>\n\r";
		 print "<div class='all_posts'><img src='{$all_a['avatar']}' height='150px' alt='{$all_a['title']}'><span><a href='{$site_url}view_article.php?id={$all_a['article_id']}'>{$all_a['title']}</a></span></div>\n\r";
		 }
		 $i=1;
	 }
	
	 $cat=$all_a['category_id'];
	
	
}
print "</div>";

?>
		
		
		</div>
			    
	</div>
<?php require_once('sidebar.php');?>
	</div>
<?php require_once('footer.php');?>
</div>
<!--LiveInternet counter--><script type="text/javascript"><!--
new Image().src = "//counter.yadro.ru/hit?r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random();//--></script><!--/LiveInternet-->
</body>
</html>