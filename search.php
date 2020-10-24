<?php require_once('config.php');?>
<?php 
session_start();
if($_POST['search']){
	$search = mysql_real_escape_string($_POST['search']);
	
	if(mb_strlen($search,'UTF-8')<4){
	$_SESSION['res'] ='<P>Поисковый запрос должен содержать не менее 4 символов</P>';
	header("Location:{$_SERVER['PHP_SELF']}");
	exit();
	}else{
	$res=mysql_query("SELECT article_id,title,date,short_text,views FROM articles WHERE MATCH(title,short_text,content) AGAINST ('$search') AND visible='1' ORDER BY title") or die(mysql_error());
	if(mysql_num_rows($res)>0){
		while($row_search=mysql_fetch_assoc($res)){
			$result[]=$row_search;
		}
	}else{
		$_SESSION['res'] ='<P>Ничего не найдено</P>';
		header("Location:{$_SERVER['PHP_SELF']}");
		exit();
		}
	
	}
}

?>

<!DOCTYPE html>
<head>
<title>Результаты поиска</title>
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
			<span class="view_articles"><h1>Результаты поиска</h1></span>
			<?
			echo $_SESSION['res'];
			unset($_SESSION['res']);
			if(count($result)>0){
				foreach($result as $item){
				print "<a href='view_article.php?id={$item['article_id']}'>{$item['title']}</a><br>\r\n";
				print $item['short_text']."<br><hr>\r\n\r\n";
				}
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