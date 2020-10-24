<?php require_once('config.php');?>
<?php 

$res_page=mysql_query("SELECT title,description,keywords,content FROM pages WHERE page_id=3") or die(mysql_error());
$row_page = mysql_fetch_assoc($res_page);
$rub=mysql_query("SELECT * from category");

?>
<!DOCTYPE html>
<head>
<title><?=$row['title'];?></title>
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
<meta name="description" content="<?=$row['description'];?>"/>
<meta name="keywords" content="<?=$row['keywords'];?>"/>
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
	print "<h1>{$row_page['title']}</h1>";
	print $row_page['content'];

	}else{
	'Такая статья не существует, извините';
}
?>
<br>
<ul>
<?
while($all=mysql_fetch_assoc($rub)){
print "<li>{$all['name']}</li>";
}
?>		
</ul>		
		</div>
			    
	</div>
<?php require_once('sidebar.php');?>
	</div>
<?php require_once('footer.php');?>
</div>
</body>
</html>